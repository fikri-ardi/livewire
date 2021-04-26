<?php

namespace App\Http\Livewire;

use Session;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class FlashMessage extends Component
{
    public $sessionType;
    public $sessionMsg;

    protected $listeners = ['done'=>'updateSession'];

    public function updateSession($sessionType, $sessionMsg){
        $this->sessionType = $sessionType;
        $this->sessionMsg = $sessionMsg;
    }

    public function render()
    {
        return view('livewire.flash-message');
    }
}
