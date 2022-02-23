<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JclQuiz extends Model
{
    use HasFactory;

    protected $fillable = ['join_course_lesson_id', 'quiz_id', 'join_date', 'end_date', 'time_no', 'progress', 'status'];

    public function jcl()
    {
        return $this->hasOne('App\Models\JoinCourseLesson', 'id', 'join_course_lesson_id');
    }

    public function quiz()
    {
        return $this->hasOne('App\Models\Quiz', 'id', 'quiz_id');
    }
}
