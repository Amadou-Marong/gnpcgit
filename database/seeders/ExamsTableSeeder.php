<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exams')->delete();
        
        \DB::table('exams')->insert(array (
            0 => 
            array (
                'id' => 1,
            'exam_name' => 'exam 1 (Computer science)',
                'per_question_mark' => 5,
                'course_id' => 3,
                'created_at' => '2024-12-29 20:07:16',
                'updated_at' => '2024-12-29 20:09:19',
            ),
            1 => 
            array (
                'id' => 2,
            'exam_name' => 'exam 1 (Physics)',
                'per_question_mark' => 10,
                'course_id' => 2,
                'created_at' => '2024-12-29 20:07:32',
                'updated_at' => '2024-12-29 20:09:05',
            ),
            2 => 
            array (
                'id' => 3,
            'exam_name' => 'exam 1 (English)',
                'per_question_mark' => 10,
                'course_id' => 1,
                'created_at' => '2024-12-29 20:07:38',
                'updated_at' => '2024-12-29 20:08:52',
            ),
            3 => 
            array (
                'id' => 4,
            'exam_name' => 'exam 1 (Web Programming)',
                'per_question_mark' => 10,
                'course_id' => 4,
                'created_at' => '2024-12-29 22:07:38',
                'updated_at' => '2024-12-29 22:08:52',
            ),
            4 => 
            array (
                'id' => 5,
            'exam_name' => 'exam 1 (Data Structures)',
                'per_question_mark' => 10,
                'course_id' => 5,
                'created_at' => '2024-12-29 22:07:38',
                'updated_at' => '2024-12-29 22:08:52',
            ),
        ));
        
        
    }
}