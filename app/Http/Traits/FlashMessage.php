<?php 
namespace App\Http\Traits;

trait FlashMessage{
    /**
     * used for sending flash message.
     */
    public function sendMsg($type, $message){
        session()->flash('type', $type);
        session()->flash('message', $message);
        $sessionType = session('type');
        $sessionMsg = session('message');
        $this->emit('newMsg', $sessionType, $sessionMsg);
    }
}