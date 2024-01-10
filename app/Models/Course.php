<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'courses';

    protected $fillable = ['course_name','course_unique_id','lecturer_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exams()
    {
        return $this->hasMany('App\Models\Exam', 'course_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lecturer()
    {
        return $this->hasOne('App\Models\User', 'id', 'lecturer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function students()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\CourseStudent');
    }

    // model boot
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('courseStudent', function (Builder $builder) {
            if (auth()->check()) {
                if (Auth::user()->hasRole('student')) {
                        return $builder->whereHas('students', function ($query) {
                            $query->where('user_id', auth()->user()->id);
                        });

                }
                if (Auth::user()->hasRole('lecturer')) {
                    return $builder->where('lecturer_id', auth()->user()->id);
                }
            }
        });



    }


}
