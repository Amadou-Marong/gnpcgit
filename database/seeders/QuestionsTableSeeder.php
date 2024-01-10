<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('questions')->delete();
        
        \DB::table('questions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question' => 'Consider the following statements:

1. The DNS system used by Internet permits computer to identify other computers.

2. In order to connect to the internet, each computer requires a unique numerical code, which is known as IP address.

Choose the correct answer from the codes given below:',
                'answer' => ' Both',
                'long_written' => 0,
                'exam_id' => 1,
                'created_at' => '2021-12-29 20:11:36',
                'updated_at' => '2021-12-30 08:02:20',
            ),
            1 => 
            array (
                'id' => 2,
                'question' => ' A group of ………………... is commonly called as one byte.',
                'answer' => 'Eight bits',
                'long_written' => 0,
                'exam_id' => 1,
                'created_at' => '2021-12-29 20:12:38',
                'updated_at' => '2021-12-30 08:02:09',
            ),
            2 => 
            array (
                'id' => 3,
                'question' => 'Consider the following statements:

1. GNPC Broadband, an IT company, has launched the GNPC program in Turntable, Brusubi.

2. Based on fiber optic cable, GNPC Broadband covers about 3000 km area.

Choose the correct answer from the codes given below:',
                'answer' => 'Both',
                'long_written' => 0,
                'exam_id' => 1,
                'created_at' => '2024-01-05 20:13:36',
                'updated_at' => '2024-01-05 08:02:03',
            ),
            3 => 
            array (
                'id' => 4,
                'question' => 'Write about computer',
                'answer' => 'a computer is a machine',
                'long_written' => 1,
                'exam_id' => 1,
                'created_at' => '2024-01-05 13:48:04',
                'updated_at' => '2024-01-05 13:48:04',
            ),

            // Physics Exams Start here

            4 => 
            array (
                'id' => 5,
                'question' => 'Which of the following is not a unit for power?',
                'answer' => 'Both A and C',
                'long_written' => 0,
                'exam_id' => 2,
                'created_at' => '2024-01-06 13:48:04',
                'updated_at' => '2024-01-06 13:48:04',
            ),
        ));
        
        
    }
}