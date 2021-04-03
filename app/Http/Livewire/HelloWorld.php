<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $names = ['Fikri', 'Dewi', 'Rahmat'];

    public function render()
    {
        return view('livewire.hello-world');
    }
}
