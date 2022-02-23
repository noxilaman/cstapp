<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'seq', 'name', 'desc', 'image', 'limit_quiz', 'status'];

    public function course()
    {
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section', 'lesson_id');
    }

    public function quizs()
    {
        return $this->hasMany('App\Models\Quiz', 'lesson_id');
    }
}
