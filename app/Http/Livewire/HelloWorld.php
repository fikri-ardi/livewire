<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = 'Rian'; //properti public ini akan otomatis dipassing ke view nya
    public $age = 17;
    public $updatedAge = false;
    public $updated = false;
    
    // method updated akan dijalankan setiap kali properti public di atas berubah
    public function updated(){
        $this->updated = true;
    }
    
    // method updatedAge akan dijalankan setiap kali properti public $age di atas berubah
    public function updatedAge(){
        $this->updatedAge = true;
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
