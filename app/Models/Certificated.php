<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificated extends Model
{
    use HasFactory;
    protected $fillable = ['join_course_id','compnay_id','student_id','token','pass_date'];

    public function joincourse()
    {
        return $this->hasOne('App\Models\JoinCourse', 'id', 'join_course_id');
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }

    public function student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }
}
