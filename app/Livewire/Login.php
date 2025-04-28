<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    #[Validate('required|string')]
    public string $email;

    #[Validate('required|string')]
    public string $password;

    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            // Redirect to intended URL or home page
            return $this->redirect('/', navigate: true);
        }

        // Authentication failed
        $this->addError('email', 'The provided credentials do not match our records.');

        // Optionally, you can clear the password field for security
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.login');
    }
}