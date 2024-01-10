<?php

namespace Tests\Unit\Livewire;

use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use http\Env\Request;
use Livewire\Livewire;
use Tests\TestCase;

class ExamListTest extends TestCase
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    private $user;
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    private $course;
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    private $exam;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->course =  Course::factory()->create(['lecturer_id' => $this->user->id]);

        $this->exam= Exam::factory()->create(['course_id' => $this->course->id]);
    }

    public function test_it_can_render_exam_list_page()
    {
        Livewire::actingAs($this->user);
        Livewire::test(\App\Http\Livewire\ExamList::class, [
            'exam_id' => $this->exam->id
        ])
            ->call('render')
            ->assertset(  'exam_id' , $this->exam->id)
            ->assertViewHas('exam')
            ->assertViewIs('livewire.exam-list');
    }
}
