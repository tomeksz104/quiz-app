<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\ResultMessage;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class ResultMessageCreateUpdate extends ModalComponent
{
    use WithFileUploads;

    public $title, $description, $rating_from, $image, $uploaded_image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'rating_from' => 'required|numeric|between:1,100',
        'uploaded_image' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $messages = [
        'title.title' => 'Podaj tytuł wyniku',
        'description.required' => 'Pole opis jest wymagane',
        'rating_from' => 'Klasyfikacja wyniku musi być liczbą (1-100)',
        'uploaded_image.image' => 'Przesłana miniaturka musi być obrazem',
        'uploaded_image.max' => 'Obraz nie może być większy niż 2048 kilobajtów',
    ];

    public function mount(ResultMessage $result_message)
    {
        $this->result_message = $result_message;

        if($result_message->id)
        {
            $this->title = $result_message->title;
            $this->description = $result_message->description;
            $this->rating_from = $result_message->rating_from;
            $this->image = $result_message->image->path ?? null;
        }
    }

    public function updatedUploadedImage()
    {
        $this->image = null;
    }

    public function deleteImage()
    {
        $this->image = null;
        $this->uploaded_image = null;
    }

    public function submit()
    {
        $validated = $this->validate();

        $result_message = ResultMessage::updateOrCreate([
            'id' => $this->result_message->id
        ], [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'rating_from' => $validated['rating_from'],
            'default' => true,
        ]);

        if(!empty($this->result_message->image) && empty($this->image))
        {
            Storage::disk('uploads')->delete($this->result_message->image->path);  // delete file if exists
            $result_message->image->delete();
        }
        if( $validated['uploaded_image'] )
        {
            $image_path = $validated['uploaded_image']->store('default-results', 'images');  // upload file
            $result_message->image()->create([
                'path' => 'img/'.$image_path
            ]);
        }

        $this->closeModal();

        $this->dispatchBrowserEvent('toast', [
            'title' =>  ($result_message->wasRecentlyCreated) ? 'Dodano wiadomość końcową' : 'Zaaktualizowano wiadomość końcową',
            'icon'=> 'success',
        ]);

        $this->emit('refresh');
    }
    public function render()
    {
        return view('livewire.admin.modals.result-message-create-update');
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }
}
