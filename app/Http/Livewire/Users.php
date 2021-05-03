<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Http\Traits\Search;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination,Search;
    
    public $profilePhotoUrl;
    
    /** The code below will match between the query string and the $search property.
     * in other words, protected property $queryString will always has the same
     * value with the public property $search
     */
    protected $queryString = [
        'search'=>['except'=>''],
        'page'=>['except'=>1]
    ];

    public function render()
    {
        return view('livewire.users', [
            'users'=> User::where('email', 'like', "%$this->search%")->paginate(5)
        ]);
    }
}
