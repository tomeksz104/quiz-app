<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rule;

class UserCreateUpdate extends ModalComponent
{
    use WithFileUploads;

    public $username, $name, $email, $password, $password_confirmation, $role, $image, $user_image;
    public $updateMode = false;

    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'password' => Rule::when(
                empty($this->user->id),
                ['required', 'confirmed', Password::defaults()],
                ['nullable']
            ),
            'user_image' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'role' =>  ['required', Rule::in(UserRole::TYPES)]
        ];
    }

    protected $messages = [
        'user_image.image' => 'Przesłana miniaturka musi być obrazem',
        'user_image.max' => 'Obraz nie może być większy niż 2048 kilobajtów',
    ];

    public function mount($updateMode, User $user)
    {
        $this->user = $user;
        $this->updateMode = $updateMode;

        if($this->user->id) {
            $this->username = $this->user->username;
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->image = $this->user->avatar ?? null;
            $this->role = $this->user->role;
        }
    }

    public function updatedUserImage()
    {
        $this->image = null;
    }

    public function deleteImage()
    {
        $this->image = null;
        $this->user_image = null;
    }

    public function submit()
    {
        $validated = $this->validate();

        $user= User::updateOrCreate([
            'id' => $this->user->id
        ], [
            'username' => $validated['username'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => ($this->user->id) ? $this->user->password : Hash::make($validated['password']), // set password for new user only
            'role' => $validated['role'],
        ]);

        if( !empty($this->user->avatar) && empty($this->image) )
        {
            Storage::disk('uploads')->delete($this->user->avatar);  // delete file if exists
            $user= User::updateOrCreate([
                'id' => $this->user->id
            ], [
                'avatar' => null,
            ]);
        }

        if( $validated['user_image'] )
        {
            $thumbnail_path = $validated['user_image']->storePublicly('images', 'uploads');;  // upload file
            $user= User::updateOrCreate([
                'id' => $this->user->id
            ], [
                'avatar' => 'uploads/'.$thumbnail_path,
            ]);
        }

        $this->closeModal();

        $this->dispatchBrowserEvent('toast', [
            'title' =>  ($user->wasRecentlyCreated) ? 'Dodano użytkownika' : 'Użytkownik zaaktualizowany',
            'icon'=> 'success',
        ]);

        $this->emit('refresh'); // refreshing table
    }
    public function render()
    {
        return view('livewire.admin.modals.user-create-update');
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }
}
