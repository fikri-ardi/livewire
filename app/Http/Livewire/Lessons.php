<?php

namespace App\Http\Livewire;

use Session;
use Livewire\Component;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Http\Traits\FlashMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Activities extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use FlashMessage;
    
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
        $this->sendMsg('success', 'The lesson has been successfully added.');
    }

    public function update($id){
        $lesson = Lesson::where('id', $id)->first();
        $lesson->update([
            'name'=>$this->name
        ]);
        $this->sendMsg('success', 'The lesson has been successfully updated.');
    }

    public function delete(Request $request, Lesson $lesson){
        /**
         * Authorize user with lessonPolicy
        */
        if (auth()->user()->cannot('delete', $lesson)) {
            return $this->sendMsg('error', "Cannot modify other's lesson.");
        }

        Lesson::destroy($lesson->id);

        $this->sendMsg('success', 'The lesson has been successfully deleted.');
    }
    
    public function render()
    {
        return view('livewire.activities', [
            'activities' => Lesson::where('name', 'like', "%$this->search%")->paginate(10)
        ]);
    }
}
