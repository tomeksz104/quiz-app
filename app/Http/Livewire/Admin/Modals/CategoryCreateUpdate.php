<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\Category;
use App\Models\CategoryThumbnail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rule;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryCreateUpdate extends ModalComponent
{
    use WithFileUploads;

    public $title, $slug, $description, $color, $upload_category_thumbnail;
    public $i = 0;
    public $updateMode = false;

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'nullable',
        'slug' => 'required',
        'color' => [
            'required',
            'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'
        ],
        'upload_category_thumbnail' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $messages = [
        'title.required' => 'Nazwa kategorii nie może być pusta',
        'title.min' => 'Nazwa kategorii musi zawierać minimum :min litery',
        'slug.required' => 'Slug nie może być pusty',
        'color.required' => 'Kolor nie może być pusty',
        'color.regex' => 'Kolor musi być w formacie HEX',
        'upload_category_thumbnail.image' => 'Przesłana miniaturka musi być obrazem',
        'upload_category_thumbnail.max' => 'Obraz nie może być większy niż 2048 kilobajtów',
    ];

    public function mount($updateMode, Category $category)
    {
        $this->category = $category;
        $this->updateMode = $updateMode;

        if($this->category->id) {
            $this->title = $this->category->title;
            $this->slug = $this->category->slug;
            $this->color = $this->category->color;
            $this->thumbnail = $this->category->image->path ?? null;
        }
    }

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Category::class, 'slug', $this->title);
    }

    public function updatedUploadCategoryThumbnail()
    {
        $this->thumbnail = null;
    }

    public function deleteThumbnail()
    {
        $this->thumbnail = null;
        $this->upload_category_thumbnail = null;
    }

    public function submit()
    {
        $validated = $this->validate();

        $category = Category::updateOrCreate([
            'id' => $this->category->id
        ], [
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'color' => $validated['color']
        ]);

        if( !empty($this->category->image->path) && empty($this->thumbnail) )
        {
            Storage::disk('uploads')->delete($this->category->image->path);  // delete file if exists
            $category->image()->delete();
        }

        if( $validated['upload_category_thumbnail'] )
        {
            $thumbnail_path = $validated['upload_category_thumbnail']->storePublicly('images', 'uploads');;  // upload file
            $category->image()->create([
                'path' => 'uploads/'.$thumbnail_path
            ]);
        }

        $this->closeModal();

        $this->dispatchBrowserEvent('toast', [
            'title' =>  ($category->wasRecentlyCreated) ? 'Dodano kateorię' : 'Kategoria zaaktualizowane',
            'icon'=> 'success',
        ]);

        $this->emit('refresh'); // refreshing table
    }
    public function render()
    {
        return view('livewire.admin.modals.category-create-update');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
