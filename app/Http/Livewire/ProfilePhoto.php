<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePhoto extends Component
{
    use WithFileUploads;

    public $profilePhoto;

    protected $rules = ['profilePhoto'=>'required|max:1024'];

    public function updatedProfilePhoto(){
        $this->validate();
    }
    
    public function save()
    {
        $this->validate();

        $profilePhotoName = $this->profilePhoto->store('photos');

        auth()->user()->update([
            'profile_photo_url'=>$profilePhotoName
        ]);

        $this->emit('profilePhotoUpdated'); //used for updating profile photo in sidebar
    }
    
    public function render()
    {
        return view('livewire.profile-photo');
    }
}
