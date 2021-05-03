<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;
use App\Models\Attendance;
use App\Http\Traits\Search;
use Livewire\WithPagination;
use App\Http\Traits\FlashMessage;

class Attendances extends Component
{
    use Search,WithPagination,FlashMessage;

    public $subject,$lessonId,$startedAt,$endedAt,$method;

    protected $queryString = [
        'search'=>['except'=>''],
        'page'=>['except'=>1],
    ];

    protected $rules = [
        'subject'=>'required|string',
        'lessonId'=>'required|integer',
        'startedAt'=>'required|date',
        'endedAt'=>'required|date',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->method = 'save';
    }

    public function create(){
        $this->method = 'save';
        $this->subject = '';
        $this->lessonId = '';
        $this->startedAt = '';
        $this->endedAt = '';
    }

    public function save(){
        $this->validate();

        Attendance::create([
            'subject' => $this->subject,
            'lesson_id' => $this->lessonId,
            'started_at' => $this->startedAt,
            'ended_at' => $this->endedAt,
        ]);
        $this->sendMsg('success', 'The lesson has been successfully added.');
    }

    public function render()
    {
        return view('livewire.attendances', [
            'attendances' => Attendance::where('subject', 'like', "%$this->search%")->paginate(10),
            'lessons'=>Lesson::get(['id', 'name']),
        ]);
    }
}
