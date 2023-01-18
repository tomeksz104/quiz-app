<?php

namespace App\Http\Livewire\Admin;

use App\Models\ResultMessage;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class WebsiteSettings extends Component
{
    use WithFileUploads;

    protected $listeners = ['refresh' => 'render', 'delete'];

    public $page_title, $about_footer, $copyright,
        $youtube, $facebook, $twitter, $instagram, $twitch,
        $logo, $uploaded_logo, $favicon, $uploaded_favicon;

    public function rules()
    {
        return [
            'page_title' => ['nullable', 'string', 'max:255'],
            'about_footer' => ['nullable', 'string', 'max:255'],
            'copyright' => ['nullable', 'string', 'max:255'],
            'youtube' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitch' => 'nullable|url',
            'uploaded_logo' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'uploaded_favicon' => ['nullable', 'sometimes', 'image', 'mimes:ico', 'max:2048'],
        ];
    }
    protected $messages = [

    ];

    public function mount()
    {
        $this->settings = Settings::first();

        $this->page_title = $this->settings->page_title;
        $this->about_footer = $this->settings->about_footer;
        $this->copyright = $this->settings->copyright;
        $this->youtube = $this->settings->youtube;
        $this->facebook = $this->settings->facebook;
        $this->twitter = $this->settings->twitter;
        $this->instagram = $this->settings->instagram;
        $this->twitch = $this->settings->twitch;
        $this->logo = $this->settings->logo ?? null;
        $this->favicon = $this->settings->favicon ?? null;

        $this->result_messages = ResultMessage::where('default', true)->get();
    }

    public function submit()
    {
        $validated = $this->validate();

        $settings = Settings::first();

        $settings->page_title = $validated['page_title'] ?? null;
        $settings->about_footer = $validated['about_footer'];
        $settings->copyright = $validated['copyright'];
        $settings->youtube = $validated['youtube'];
        $settings->facebook = $validated['facebook'];
        $settings->twitter = $validated['twitter'];
        $settings->instagram = $validated['instagram'];
        $settings->twitch = $validated['twitch'];

        if(!empty($this->settings->logo) && empty($this->logo))
        {
            Storage::disk('uploads')->delete($this->settings->logo);  // delete file if exists
            $settings->logo = null;
        }
        if( $validated['uploaded_logo'] )
        {
            $logo_path = $validated['uploaded_logo']->store('', 'images');  // upload file
            $settings->logo = 'img/'.$logo_path;
        }

        if(!empty($this->settings->favicon) && empty($this->favicon))
        {
            Storage::disk('uploads')->delete($this->settings->favicon);  // delete file if exists
            $settings->favicon = null;
        }
        if( $validated['uploaded_favicon'] )
        {
            $favicon_path = $validated['uploaded_favicon']->storePublicly('', 'images');;  // upload file
            $settings->favicon = 'img/'.$favicon_path;
        }

        $settings->save();

        $this->dispatchBrowserEvent('toast', [
            'title' =>  'Konfiguracja zaaktualizowana',
            'icon'=> 'success',
        ]);
    }


    public function render()
    {
        return view('livewire.admin.website-settings')
            ->extends('layout/main')
            ->section('content');
    }

    public function updatedUploadedLogo()
    {
        $this->logo = null;
    }

    public function deleteLogo()
    {
        $this->logo = null;
        $this->uploaded_logo = null;
    }

    public function updatedUploadedFavicon()
    {
        $this->favicon = null;
    }

    public function delete($id)
    {
        ResultMessage::where('id', $id)->delete();

        $this->emit('refresh');
    }

    public function deleteConfrim($result_message_id) {
        $this->dispatchBrowserEvent('swal:delete', [
            'title' => 'Usuwanie rekordu',
            'text' => 'Usuwasz rekord/y z bazy danych. Nie będziesz w stanie tego cofnąć!',
            'type' => 'warning',
            'ids' => $result_message_id,
        ]);
    }

    public function deleteFavicon()
    {
        $this->favicon = null;
        $this->uploaded_favicon = null;
    }

}
