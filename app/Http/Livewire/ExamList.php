<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Exam;
use Livewire\Component;

class ExamList extends Component
{
    public $exam_id;
    public $answers;

    public function mount($exam_id)
    {
        $this->exam_id = $exam_id;
        $this->answers = Answer::where('exam_id', $this->exam_id)->where('user_id', auth()->user()->id)->get();

    }

    public function render()
    {
        return view('livewire.exam-list',[
            'exam' => Exam::findOrFail($this->exam_id)
        ])->extends('layouts.frontend');
    }

    public function ansStore()
    {
        $exam = Exam::find(request()->exam_id);
        if (request()->question) {
            for ($i=0; $i < sizeof(request()->question) ; $i++) {
                if (request()->short_question_answer[$i][0] == request()->short_question_correct[$i]) {
                    $mark = $exam->per_question_mark;
                } else {
                    $mark = 0;
                }
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'exam_id' => request()->exam_id,
                    'question' => request()->question[$i],
                    'short_question_answer' =>  request()->short_question_answer[$i][0],
                    'short_question_correct' => request()->short_question_correct[$i],
                    'mark' => $mark,
                    'missing_word' => request()->missing_word[$i],
                ]);
            }
        }
        if (request()->long_question) {
            for ($i=0; $i < sizeof(request()->long_question) ; $i++) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'exam_id' => request()->exam_id,
                    'question' => request()->long_question[$i],
                    'long_question_answer' => request()->long_question_answer[$i],
                    'mark' => request()->mark,
                ]);
            }
        }


        return redirect()->back();


    }
}
