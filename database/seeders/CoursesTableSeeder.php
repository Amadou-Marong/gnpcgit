<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'course_name' => 'English',
                'course_unique_id' => '3174',
                'lecturer_id' => 2,
                'created_at' => '2024-01-05 20:06:32',
                'updated_at' => '2024-01-05 20:06:32',
            ),
            1 => 
            array (
                'id' => 2,
                'course_name' => 'Physics ',
                'course_unique_id' => '38533',
                'lecuturer_id' => 2,
                'created_at' => '2024-01-05 20:06:45',
                'updated_at' => '2024-01-05 20:06:45',
            ),
            2 => 
            array (
                'id' => 3,
                'course_name' => 'Computer science ',
                'course_unique_id' => '2849',
                'lecturer_id' => 2,
                'created_at' => '2024-01-05 20:06:56',
                'updated_at' => '2024-01-05 20:06:56',
            ),
            3 => 
            array (
                'id' => 4,
                'course_name' => 'Web Programming ',
                'course_unique_id' => '3445',
                'lecturer_id' => 2,
                'created_at' => '2024-01-05 20:07:56',
                'updated_at' => '2024-01-05 20:07:56',
            ),
            4 => 
            array (
                'id' => 5,
                'course_name' => 'Data Structures and Algorithms',
                'course_unique_id' => '2677',
                'lecturer_id' => 2,
                'created_at' => '2024-01-05 21:07:56',
                'updated_at' => '2024-01-05 21:07:56',
            ),
        ));
        
        
    }
}