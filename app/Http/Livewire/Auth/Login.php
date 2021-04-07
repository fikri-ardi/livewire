<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;

class Login extends Component
{
    public $email = '';
    public $password = '';

    /** @rules for validation */
    protected $rules = [
            'email'=>'required|email',
            'password'=>'required|min:8',
    ];

    public function login(Request $request){
        $validatedData = $this->validate();

        if (auth()->attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return $this->addError('email', 'The credentials is does not match our records.');
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
