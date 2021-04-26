<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    public $profilePhotoUrl;
    public $name;
    public $email;

    protected function rules(){
        return [
            'name'=>'required|string',
            'email'=>['required','email', 'unique:users,email,'.auth()->id()], //except the current user email
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    public function save(){
        auth()->user()->update([
            'name'=>ucwords($this->name),
            'email'=>$this->email
        ]);
    }
    
    public function mount(){
        $this->updateProfilePhoto();
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updateProfilePhoto(){
        $this->profilePhotoUrl = auth()->user()->profile_photo_url !== null ? Storage::url(auth()->user()->profile_photo_url) : false;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
