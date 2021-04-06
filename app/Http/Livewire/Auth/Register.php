<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function validates(){
        $this->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'passwordConfirmation'=>'required|same:password',
        ]);
    }
    
    public function register(){
        $this->validates();
        
        $user = User::create([
            'email'=>$this->email,
            'password'=> bcrypt($this->password)
        ]);

        auth()->login($user);
        return redirect('/');
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
