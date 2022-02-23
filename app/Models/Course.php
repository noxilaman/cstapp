<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'seq', 'name', 'desc', 'status'];

    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'course_id');
    }
}
