<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
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

        /** @check whether the email has been registered */
        $emailIsRegistered = User::where('email', $validatedData['email'])->first();

        if ($emailIsRegistered) {
            if (auth()->attempt($validatedData)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
            return $this->addError('password', 'The password you entered is incorrect.');
        }

        return $this->addError('email', 'Your email has not been registered.');
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
