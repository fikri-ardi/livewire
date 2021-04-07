<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Providers\RouteServiceProvider;

class Register extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    /** @rules for validation */
    protected $rules = [
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'passwordConfirmation'=>'required|same:password',
    ];

    /** @this method will be ran every update in model property above */
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    public function register(){
        $validatedData = $this->validate();
        
        $user = User::create([
            'email'=>$validatedData['email'],
            'password'=> bcrypt($validatedData['password'])
        ]);

        auth()->login($user);
        return redirect(RouteServiceProvider::HOME);
    }
    
    public function render()
    {
        return view('livewire.auth.register');
    }
}
