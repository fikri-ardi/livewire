<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class HelloWorld extends Component
{
    public $contacts;

    public function mount()
    {
        $this->contacts = Contact::all();
    }
    
    public function refreshChildren()
    {
        $this->emit('refreshChildren');
    }
    
    public function render()
    {
        return view('livewire.hello-world');
    }
}
