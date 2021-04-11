<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Sidebar extends Component
{
    public $profilePhotoUrl;

    protected $listeners = ['profilePhotoUpdated'=>'updateProfilePhoto'];

    public function mount(){
        $this->updateProfilePhoto();
    }

    public function updateProfilePhoto(){
        $this->profilePhotoUrl = auth()->user()->profile_photo_url !== null ? Storage::url(auth()->user()->profile_photo_url) : false;
    }

    public function render()
    {
        return view('layouts.sidebar');
    }
}
