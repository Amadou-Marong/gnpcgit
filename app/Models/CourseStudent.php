<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseStudent extends Pivot
{

    protected $table = 'course_user';

    protected $fillable = [
        'course_id',
        'user_id',
    ];

}

