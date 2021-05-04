<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Presence;
use App\Models\Attendance;
use App\Http\Traits\Search;
use Livewire\WithPagination;
use App\Http\Traits\FlashMessage;

class Presences extends Component
{
    use WithPagination, FlashMessage;

    public function render()
    {
        return view('livewire.presences', [
            'presences'=> Presence::get()
        ]);
    }
}
