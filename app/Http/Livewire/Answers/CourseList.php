<?php

namespace App\Http\Livewire\Answers;

use App\Models\CourseStudent;
use App\Models\User;
use Livewire\Component;

class CourseList extends Component
{
    public $student_id;
    public $answers;

    public function mount($student_id)
    {
        $this->student_id = $student_id;
    }

    public function render()
    {
        $courses = User::findOrFail($this->student_id)->courses;

        return view('livewire.answers.courses', [
            'courses' => $courses,
        ])->extends('layouts.app');
    }
}
