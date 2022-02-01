<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinCourseLesson extends Model
{
    use HasFactory;

    protected $fillable = ['join_course_id','lesson_id','join_date','end_date','progress','status'];

    public function joincourse()
    {
        return $this->belongsTo(JoinCourseLesson::class,'join_course_id');
    }

     public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
}
