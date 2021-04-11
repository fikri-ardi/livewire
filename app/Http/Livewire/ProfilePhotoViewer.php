<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoViewer extends Component
{
    public $profilePhotoUrl;
    public $size = 'h-40 w-40'; //used for setting image size in view
    
    protected $listeners = ['profilePhotoUpdated'=>'updateProfilePhoto'];

    public function mount(){
        $this->updateProfilePhoto();
    }

    public function updateProfilePhoto(){
        $this->profilePhotoUrl = auth()->user()->profile_photo_url !== null ? Storage::url(auth()->user()->profile_photo_url) : false;
    }
    
    public function render()
    {
        return view('livewire.profile-photo-viewer');
    }
}
