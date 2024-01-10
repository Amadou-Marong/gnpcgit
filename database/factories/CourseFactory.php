<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
			'course_name' => $this->faker->name,
			'course_unique_id' => $this->faker->name,
			'lecturer_id' => $this->faker->name,
        ];
    }
}
