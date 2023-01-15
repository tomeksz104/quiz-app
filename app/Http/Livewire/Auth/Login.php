<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class Login extends ModalComponent
{
    public string $username = '';
    public string $password = '';
    public string $currentPath = '';
    public bool $remember = false;

    public function render()
    {
        return view('livewire.Auth.login');
    }

    public function mount()
    {
        $this->currentPath = url()->previous();
    }

    protected $rules = [
        'username' => 'required|string',
        'password' => 'required|string',
        'remember' => 'bool'
    ];

    protected $messages = [
        'username.required' => 'Pole nazwa użytkownika lub adres email jest wymagane',
        'password.required' => 'Pole hasło jest wymagane'
    ];

    public function submit()
    {
        $this->validate();

        if($this->attemptLogin()) {
            request()->session()->regenerate();
            return redirect()->intended($this->currentPath);
        }

        $this->dispatchBrowserEvent('toast', [
            'title' =>  'Nieprawidłowe dane logowania',
            'icon'=> 'error',
        ]);
    }

    protected function attemptLogin()
    {
        return $this->guard()->attempt(
            ['username' => $this->username, 'password' => $this->password], $this->remember
        );

    }

    protected function guard()
    {
        return Auth::guard();
    }
}
