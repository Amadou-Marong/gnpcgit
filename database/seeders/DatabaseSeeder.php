<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(100)->create();
        // \App\Models\Course::factory(10)->create();
        // \App\Models\CourseStudent::factory(10)->create();
        // \App\Models\Exam::factory(10)->create();
        // \App\Models\Question::factory(10)->create();
        // \App\Models\QuestionOption::factory(10)->create();

        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);


        $this->call(CoursesTableSeeder::class);
        $this->call(ExamsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(QuestionOptionsTableSeeder::class);
    }
}
