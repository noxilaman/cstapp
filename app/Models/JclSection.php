<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JclSection extends Model
{
    use HasFactory;

    protected $fillable = ['join_course_lesson_id', 'section_id', 'join_date', 'end_date', 'progress', 'status'];

    public function jcl()
    {
        return $this->hasOne('App\Models\JoinCourseLesson', 'id', 'join_course_lesson_id');
    }

    public function section()
    {
        return $this->hasOne('App\Models\Section', 'id', 'section_id');
    }

    public function jclquizs()
    {
        return $this->hasMany(JclQuiz::class, 'jcl_section_id');
    }
}
