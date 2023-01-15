<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\WithFileUploads;
use function view;

class AccountSettings extends Component
{
    use WithFileUploads;

    public $email, $display_username, $first_name, $last_name, $bio,
        $youtube, $facebook, $twitter, $instagram, $twitch,
        $old_password, $password, $password_confirmation,
        $avatar, $uploaded_avatar;

    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'display_username' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:255'],
            'youtube' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitch' => 'nullable|url',
            'uploaded_avatar' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

            'old_password' => ['nullable'],
            'password' => Rule::when(
                isset($this->old_password),
                ['required', 'confirmed', Password::defaults()],
                ['nullable']
            ),
        ];
    }

    protected $messages = [

    ];

    public function mount(User $user)
    {
        $this->user = Auth::user();

        $this->email = $this->user->email;
        $this->display_username = $this->user->display_username;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->bio = $this->user->bio;
        $this->youtube = $this->user->youtube;
        $this->facebook = $this->user->facebook;
        $this->twitter = $this->user->twitter;
        $this->instagram = $this->user->instagram;
        $this->twitch = $this->user->twitch;

        $this->avatar = $this->user->avatar ?? null;
    }

    public function submit()
    {
        $validated = $this->validate();

        $user = User::find(Auth::user()->id);

        $user->email = $validated['email'];
        $user->display_username = $validated['display_username'];
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->bio = $validated['bio'];
        $user->youtube = $validated['youtube'];
        $user->facebook = $validated['facebook'];
        $user->twitter = $validated['twitter'];
        $user->instagram = $validated['instagram'];
        $user->twitch = $validated['twitch'];

        if(!empty($this->user->avatar) && empty($this->avatar))
        {
            Storage::disk('uploads')->delete($this->user->avatar);  // delete file if exists
            $user->avatar = null;
        }
        if( $validated['uploaded_avatar'] )
        {
            $thumbnail_path = $validated['uploaded_avatar']->storePublicly('images', 'uploads');  // upload file
            $user->avatar = 'uploads/'.$thumbnail_path;
        }

        $user->save();

        $this->dispatchBrowserEvent('toast', [
            'title' =>  'Profil zaaktualizowany',
            'icon'=> 'success',
        ]);
    }
    public function submit_password()
    {
        $validated = $this->validateMultiple(['old_password', 'password']);

        $user = User::find(Auth::user()->id);

        if (Hash::check($validated['old_password'], $user->password)) {
            $user->password = Hash::make($validated['password']);
            $user->save();

            $this->dispatchBrowserEvent('toast', [
                'title' =>  'Nowe hasło zostało zapisane',
                'icon'=> 'success',
            ]);
        } else {
            $this->addError('old_password', 'Podane hasło jest nieprawidłowe');
        }
    }

    private function validateMultiple($fields ){
        $validated = [];
        foreach($fields as $field){
            $validatedData = $this->validateOnly( $field);
            $validated[ key($validatedData) ] = current($validatedData);
        }
        return $validated;
    }

    public function updatedUploadedAvatar()
    {
        $this->avatar = null;
    }

    public function deleteAvatar()
    {
        $this->avatar = null;
        $this->uploaded_avatar = null;
    }

    public function render()
    {
        return view('livewire.user.account-settings')
            ->extends('layout/main')
            ->section('content');
    }
}
