<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'seq', 'name', 'desc', 'link_clip', 'image', 'status', 'limit_quiz'];

    public function lesson()
    {
        return $this->hasOne('App\Models\Lesson', 'id', 'lesson_id');
    }

    public function quizs()
    {
        return $this->hasMany('App\Models\Quiz', 'section_id');
    }
}
