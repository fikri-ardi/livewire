<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Traits\FlashMessage;
use Illuminate\Support\Facades\Storage;

class ProfilePhoto extends Component
{
    use WithFileUploads;
    use FlashMessage;

    public $profilePhoto;

    protected $rules = ['profilePhoto'=>'required|mimes:png,jpg,svg,bmp|max:1024'];

    public function updatedProfilePhoto(){
        $this->validate();
    }

    public function save()
    {
        $this->validate();

        Storage::exists(auth()->user()->profile_photo_url) ? Storage::delete(auth()->user()->profile_photo_url) : true; //delete old profile photo

        $profilePhotoName = $this->profilePhoto->store('photos');

        auth()->user()->update([
            'profile_photo_url'=>$profilePhotoName
        ]);

        $this->emit('profilePhotoUpdated'); //will be heard by profilePhotoViewer livewire component
        $this->sendMsg('success', 'The profile photo has been successfully updated');
    }
    
    public function render()
    {
        return view('livewire.profile-photo');
    }
}
