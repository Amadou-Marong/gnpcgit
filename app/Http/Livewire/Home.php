<?php

namespace App\Http\Livewire;


use App\Models\CourseStudent;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{
    public $course_id;

    public function render()
    {
        return view('livewire.home')->extends('layouts.frontend');
    }

    public function store()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $this->validate([
            'course_id' => 'required',
        ]);

        $course = DB::table('courses')->where('course_unique_id', $this->course_id)->first();


        if (CourseStudent::where('user_id', auth()->user()->id)->where('course_id', $this->course_id)->count()) {
            return redirect()->route('course.show', $course->id);
        }

        CourseStudent::insert([
            'course_id' => $course->id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('course.show', $course->id);
    }
}
