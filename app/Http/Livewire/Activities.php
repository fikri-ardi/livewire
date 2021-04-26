<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;

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

    /**
     * used for sending flash message.
     */
    public function sendMsg($type, $message){
        session()->flash('type', $type);
        session()->flash('message', $message);
        $sessionType = session('type');
        $sessionMsg = session('message');
        $this->emit('done', $sessionType, $sessionMsg);
    }

    public function save(){
        auth()->user()->activities()->create([
            'name'=>$this->name
        ]);
        $this->sendMsg('success', 'The activity has been successfully added.');
    }

    public function update($id){
        $activity = Activity::where('id', $id)->first();
        $activity->update([
            'name'=>$this->name
        ]);
        $this->sendMsg('success', 'The activity has been successfully updated.');
    }

    public function delete(Request $request, Activity $activity){
        /**
         * Authorize user with ActivityPolicy
        */
        if (auth()->user()->cannot('delete', $activity)) {
            return $this->sendMsg('error', "Cannot modify other's activity.");
        }

        Activity::destroy($activity->id);

        $this->sendMsg('success', 'The activity has been successfully deleted.');
    }
    
    public function render()
    {
        return view('livewire.activities', [
            'activities' => Activity::where('name', 'like', "%$this->search%")->paginate(10)
        ]);
    }
}
