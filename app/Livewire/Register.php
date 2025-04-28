<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Register extends Component
{

    #[Validate('required|string')]
    public string $name;

    #[Validate('required|string')]
    public string $email;

    #[Validate('required|string')]
    public string $password;

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $this->reset();
        return $this->redirect('/login', navigate: true);
    }
    public function render()
    {
        return view('livewire.register');
    }
}
