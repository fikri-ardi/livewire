<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoViewer extends Component
{
    public $profilePhotoUrl;
    public $user;
    public $size = 'h-40 w-40'; //used for setting image size in view
    
    protected $listeners = ['profilePhotoUpdated'=>'updateProfilePhoto'];

    public function mount(){
        $this->updateProfilePhoto();
    }

    public function updateProfilePhoto(){
        $this->profilePhotoUrl = $this->user->profile_photo_url !== null ? Storage::url($this->user->profile_photo_url) : false;
    }
    
    public function render()
    {
        return view('livewire.profile-photo-viewer');
    }
}
