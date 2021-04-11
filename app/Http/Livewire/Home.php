<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}
