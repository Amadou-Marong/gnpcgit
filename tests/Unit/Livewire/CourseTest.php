<?php

namespace Tests\Unit\Livewire;

use App\Models\Course;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class CourseTest extends TestCase
{
    public function test_it_can_render_classroom_page()
    {
        $user = User::factory()->create();
        $course =  Course::factory()->create(['lecturer_id' => $user->id]);


        Livewire::test(\App\Http\Livewire\Course::class, [
            'course_id' => $course->id
        ])
            ->call('render')
            ->assertset('course_id', $course->id)
            ->assertViewIs('livewire.course');
    }

    public function test_it_can_render_course_list_page()
    {
        $user = User::factory()->create();
        Course::factory(3)->create(['lecturer_id' => $user->id]);

        Livewire::test(\App\Http\Livewire\CourseList::class)
            ->call('render')
            ->assertViewHas('courses')
            ->assertViewIs('livewire.course-list');
    }

}
