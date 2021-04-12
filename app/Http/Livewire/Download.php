<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Download extends Component
{
    public function export(){
        // return Storage::disk('exports')->download('laravel-auth.docx');
        return response()->download(storage_path('app/exports/laravel-auth.docx'), 'Laravel Authentication.xlsx');
    }

    public function render()
    {
        return view('livewire.download');
    }
}
