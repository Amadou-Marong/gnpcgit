<?php

namespace App\Http\Livewire;

use App\Models\Course as ModelsCourse;
use Livewire\Component;

class Course extends Component
{
    public $course_id;

    public function mount($course_id)
    {
        $this->course_id = $course_id;
    }

    public function render()
    {
        return view('livewire.course',[
            'course' => ModelsCourse::findOrFail($this->course_id),
        ])->extends('layouts.frontend');
    }
}
