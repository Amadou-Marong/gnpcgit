<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'exams';

    protected $fillable = ['exam_name','per_question_mark','course_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'exam_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'exam_id', 'id');
    }

     // model boot
     protected static function boot()
     {
         parent::boot();

         static::addGlobalScope('exam', function (Builder $builder) {
             if (auth()->check()) {
                 if (Auth::user()->hasRole('lecturer')) {
                         return $builder->whereHas('course', function ($query) {
                             $query->where('lecturer_id', auth()->user()->id);
                         });

                 }

             }
         });



     }



}
