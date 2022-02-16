<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JclSection extends Model
{
    use HasFactory;

    protected $fillable = ['join_course_lesson_id','section_id','join_date','end_date','progress','status'];

    public function jcl()
    {
        return $this->belongsTo(JoinCourseLesson::class,'join_course_lesson_id');
    }

    public function section()
    {
        return $this->belongsTo(Quiz::class,'section_id');
    }
}