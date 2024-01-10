<?php

namespace App\Http\Livewire\Answers;

use App\Models\Answer;
use Livewire\Component;

class ExamDetail extends Component
{
    public $exam_id;
    public $answers;
    public $student_id;
    public $answer;
    public $mark;


    public function mount($exam_id,$student_id)
    {
        $this->exam_id = $exam_id;
        $this->student_id = $student_id;
        $this->answers = Answer::where('exam_id', $this->exam_id)->where('user_id', $this->student_id)->get();
    }


    public function render()
    {
        return view('livewire.answers.exam-detail')->extends('layouts.app');
    }

    public function show($id)
    {
        $this->answer = Answer::findOrFail($id);
        $this->mark=null;
    }
    public function storeMark()
    {
        $this->answer->mark = $this->mark;
        $this->answer->save();
        return redirect('/examDetail/'.$this->exam_id.'/'.$this->student_id);
    }
}
