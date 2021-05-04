<?php

namespace App\Http\Livewire;

use Session;
use App\Models\Lesson;
use Livewire\Component;
use App\Http\Traits\{Search, FlashMessage};
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Lessons extends Component
{
    use AuthorizesRequests,WithPagination,FlashMessage,Search;
    
    public $name,$startedAt,$endedAt,$method;

    public function mount(){
        $this->method = 'save';
    }

    public $queryString = [
        'search'=>['except'=>''],
        'page'=>['except'=>1]
    ];
    
    protected $rules = [
        'name'=>'required|string',
        'startedAt'=>'required',
        'endedAt'=>'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function create(){
        $this->method = 'save';
        $this->name = '';
        $this->startedAt = '';
        $this->endedAt = '';
    }

    public function save(){
        $this->validate();

        auth()->user()->lessons()->create([
            'name' => $this->name,
            'started_at' => $this->startedAt,
            'ended_at' => $this->endedAt,
        ]);
        $this->sendMsg('success', 'The lesson has been successfully added.');
    }

    public function edit(Lesson $lesson){
        $this->method = "update($lesson)";
        $this->name = $lesson['name'];
        $this->startedAt = $lesson['started_at'];
        $this->endedAt = $lesson['ended_at'];
    }

    public function update(Lesson $lesson){
        $this->validate();

        $lesson->update([
            'name' => $this->name,
            'started_at' => $this->startedAt,
            'ended_at' => $this->endedAt,
        ]);
        $this->sendMsg('success', 'The lesson has been successfully updated.');
    }

    public function delete(Request $request, Lesson $lesson)
    {
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
        return view('livewire.lessons', [
            'lessons' => Lesson::where('name', 'like', "%$this->search%")->where('ended_at', '>=', date('Y-m-d H:i:s'))->paginate(10)
        ]);
    }
}
