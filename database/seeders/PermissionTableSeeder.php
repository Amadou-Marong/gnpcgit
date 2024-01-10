<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'siteSetting-edit',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',



            'course-list',
            'course-create',
            'course-edit',
            'course-delete',



            'question-list',
            'question-create',
            'question-edit',
            'question-delete',


            'exam-list',
            'exam-create',
            'exam-edit',
            'exam-delete',

            'answer-list',
            'answer-create',
            'answer-edit',
            'answer-delete',

            'student-list',
            'student-delete',
            'student-mail',



        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
