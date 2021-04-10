<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Sidebar extends Component
{
    public $profilePhotoUrl;

    protected $listeners = ['profilePhotoUpdated'=>'refreshMe'];

    public function refreshMe(){
        $this->profilePhotoUrl = auth()->user()->profile_photo_url !== null ? Storage::url(auth()->user()->profile_photo_url) : false;
    }

    public function mount(){
        $this->profilePhotoUrl = auth()->user()->profile_photo_url !== null ? Storage::url(auth()->user()->profile_photo_url) : false;
    }

    public function render()
    {
        return view('layouts.sidebar');
    }
}
