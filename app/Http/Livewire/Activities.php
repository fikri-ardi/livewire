<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Activities extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    
    public $name;
    public $method;
    public $search;

    public function mount(){
        $this->method = 'save';
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $queryString = [
        'search'=>['except'=>''],
        'page'=>['except'=>1]
    ];

    /**
     * used for set the method to save or update.
     */
    public function setMethodTo($method){
        $this->method = $method;
    }

    public function save(){
        auth()->user()->activities()->create([
            'name'=>$this->name
        ]);
    }

    public function update($id){
        $activity = Activity::where('id', $id)->first();
        $activity->update([
            'name'=>$this->name
        ]);
    }

    public function delete(Request $request, Activity $activity){
        /** 
         * The first way to authorize with Gate
         *  if (! Gate::allows('delete-activity', $activity)) {
        *       abort(403); // unauthorized actions
         *  } 
        */

        /** 
         * The second way, this method will throw an axception / abort(403) when auth()->id() is different than $activity->user_id.
         * The Gate are defined in AuthServiceProvider in boot method
         * Gate::authorize('delete-activity', $activity);
         */

         /**
          * Authorize user with ActivityPolicy
          * if (auth()->user()->cannot('delete', $activity)) {
          *     abort(403);
          * }
          */

         /**
          * Authorize user with ActivityPolicy
          */
          $this->authorize('delete', $activity);
          
        Activity::destroy($activity->id);
    }
    
    public function render()
    {
        return view('livewire.activities', [
            'activities' => Activity::where('name', 'like', "%$this->search%")->paginate(10)
        ]);
    }
}
