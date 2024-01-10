<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExamFactory extends Factory
{
    protected $model = Exam::class;

    public function definition()
    {
        return [
			'exam_name' => $this->faker->name,
			'per_question_mark' => rand(1, 100),
			'course_id' => $this->faker->name,
        ];
    }
}
