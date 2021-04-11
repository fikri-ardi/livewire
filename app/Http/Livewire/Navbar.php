<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Navbar extends Component
{
    public $profilePhotoUrl;
    
    public function mount(){
        $this->updateProfilePhoto();
    }

    public function updateProfilePhoto(){
        $this->profilePhotoUrl = auth()->user()->profile_photo_url !== null ? Storage::url(auth()->user()->profile_photo_url) : false;
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login');
    }
    
    public function render()
    {
        return view('livewire.navbar');
    }
}
