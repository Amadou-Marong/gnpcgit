<?php

namespace Tests\Unit\Livewire;

use App\Models\Coure;
use App\Models\User;
use Livewire\Livewire;
use Tests\TestCase;

class StudentListTest extends TestCase
{
    public function test_it_can_render_student_list_page()
    {
        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $course =  Course::factory()->create(['lecturer_id' => $user->id]);

//        $this->expectException('Illuminate\Auth\Access\AuthorizationException');


        Livewire::test(\App\Http\Livewire\StudentList::class)
            ->call('render')
            ->assertset('course_id', $course->id)
            ->assertViewIs('livewire.students.student-list');
    }

}
