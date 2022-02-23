<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinCourseLesson extends Model
{
    use HasFactory;

    protected $fillable = ['join_course_id', 'lesson_id', 'join_date', 'end_date', 'progress', 'status'];

    public function joincourse()
    {
        return $this->hasOne('App\Models\JoinCourse', 'id', 'join_course_id');
    }

    public function lesson()
    {
        return $this->hasOne('App\Models\Lesson', 'id', 'lesson_id');
    }
}
