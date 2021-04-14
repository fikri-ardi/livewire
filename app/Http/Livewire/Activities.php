<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
use Illuminate\Support\Facades\Gate;

class Activities extends Component
{
    public $name;
    public $method;

    public function mount(){
        $this->method = 'save';
    }

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

    public function delete(Activity $activity){

        if (! Gate::allows('delete-activity', $activity)) {
            abort(403);
        }
        
        Activity::destroy($activity->id);
    }
    
    public function render()
    {
        return view('livewire.activities', [
            'activities' => Activity::paginate(10)
        ]);
    }
}
