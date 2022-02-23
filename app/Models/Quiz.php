<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'seq', 'name', 'desc', 'link_clip', 'image', 'ans_desc', 'status'];

    public function lesson()
    {
        return $this->hasOne('App\Models\Lesson', 'id', 'lesson_id');
    }

    public function choices()
    {
        return $this->hasMany('App\Models\Chioce', 'quiz_id');
    }
}
