<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'questions';

    protected $fillable = ['question','exam_id','answer','long_written','missing_word','image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionOptions()
    {
        return $this->hasMany('App\Models\QuestionOption', 'question_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function exam()
    {
        return $this->hasOne('App\Models\Exam', 'id', 'exam_id');
    }

    // model boot
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('exam', function (Builder $builder) {
            if (auth()->check()) {
                if (Auth::user()->hasRole('lecturer')) {
                        return $builder->whereHas('exam', function ($query) {
                            $query->whereHas('course', function ($query1) {
                                $query1->where('lecturer_id', auth()->user()->id);
                            });
                        });

                }

            }
        });



    }

}
