<?php 

namespace App\Http\Traits;

/**
 * search trait that is linked with search blade component for searching data
 */
trait Search
{
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
}
