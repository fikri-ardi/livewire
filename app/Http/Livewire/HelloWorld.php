<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = 'Rian'; //properti public ini akan otomatis dipassing ke view nya
    public $loud = false;
    public $greetings = ['Hello'];

    // method mount sama sperti __construct, method ini akan dijalankan ketika laravel component dibuat
    public function mount($name){
        $this->name = $name;
    }

    // method hydrate akan dijalankan setiap kali terjadi action yang berkaitan dengan data binding, method hydrate dijalankan lalu action baru dijalankan
    public function hydrate(){
        $this->name = 'hydrated';
    }
    
    public function resetName($name = 'Fikri'){
        $this->name = $name;
    }
    
    public function render()
    {
        return view('livewire.hello-world');
    }
}
