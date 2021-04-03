<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = 'Rian'; //properti public ini akan otomatis dipassing ke view nya
    
    public function render()
    {
        return view('livewire.hello-world');
    }
}
