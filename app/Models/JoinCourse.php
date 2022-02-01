<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinCourse extends Model
{
    use HasFactory;

    protected $fillable = ['proj_comp_student_id','course_id','join_date','end_date','progress','status'];

    public function projcompstudent()
    {
        return $this->belongsTo(ProjCompStudent::class,'proj_comp_student_id');
    }

     public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
