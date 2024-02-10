<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Login extends Component
{
    public $username, $password;

    public function loginUser(Request $request)
    {
        $validated = $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return $this->redirect('/lapor');
        }

        $this->addError('username', 'Username tidak ada');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
