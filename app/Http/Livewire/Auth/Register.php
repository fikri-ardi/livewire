<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function validate_email(){
        $this->validate([
            'email'=>'required|email|unique:users',
            ]);
        }
        
        public function validate_password(){
            $this->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            ]);
        }
        
        public function validate_password_confirm(){
            $this->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'passwordConfirmation'=>'required|same:password',
        ]);
    }
                
    public function register(){
            $data = $this->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'passwordConfirmation'=>'required|same:password',
        ]);
        
        $user = User::create([
            'email'=>$data['email'],
            'password'=> bcrypt($data['password'])
        ]);

        auth()->login($user);
        return redirect('/');
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
