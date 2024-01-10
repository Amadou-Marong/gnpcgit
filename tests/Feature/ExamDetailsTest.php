<?php

namespace Tests\Feature;

use App\Mail\studentMail;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Exam;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ExamDetailsTest extends TestCase
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    private $user, $exam, $student, $answer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $course = Course::factory()->create(['lecturer_id' => $this->user->id]);

        $this->exam = Exam::factory()->create(['course_id' => $course->id]);

        $this->student = User::factory()->create();
        $this->answer = Answer::factory()->create([
            'user_id' => $this->student->id,
            'exam_id' => $this->exam->id,
            'mark' => rand(1, 100),
        ]);
    }

    public function test_it_can_render_exam_details_page()
    {
        Livewire::actingAs($this->user);
        Livewire::test(\App\Http\Livewire\Answers\ExamDetail::class, [
            'exam_id' => $this->exam->id,
            'student_id' => $this->student->id
        ])
            ->call('render')
            ->assertViewIs('livewire.answers.exam-detail');
    }

    public function test_it_can_show_exam_details()
    {
        Livewire::actingAs($this->user);
        Livewire::test(\App\Http\Livewire\Answers\ExamDetail::class, [
            'exam_id' => $this->exam->id,
            'student_id' => $this->student->id
        ])
            ->call('show', $this->answer->id)
            ->assertViewIs('livewire.answers.exam-detail');
    }

    public function test_it_can_store_exam_mark()
    {
        Livewire::actingAs($this->user);
        Livewire::test(\App\Http\Livewire\Answers\ExamDetail::class, [
            'exam_id' => $this->exam->id,
            'student_id' => $this->student->id
        ])
            ->set('mark', $mark = rand(1,100))
            ->set('answer', $this ->answer)
            ->call('storeMark')
            ->assertViewIs('livewire.answers.exam-detail');

        $this->assertDatabaseHas('answers', [
           'mark' => $mark ,
            'id' => $this->answer->id
        ]);
    }

}
