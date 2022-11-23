<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JoinCourse extends Model
{
    use HasFactory;

    protected $fillable = ['proj_comp_student_id', 'project_id', 'company_id', 'student_id', 
    'course_id', 'join_date', 'end_date', 'progress', 'status','hashkey','view_clip'];

    public function projcompstudent()
    {
        return $this->hasOne('App\Models\ProjCompStudent', 'id', 'proj_comp_student_id');
    }

    public function course()
    {
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }

    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }

    public function student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }

    public function jcls()
    {
        return $this->hasMany(JoinCourseLesson::class, 'join_course_id');
    }

    public function updateprogress($id)
    {
        $jc = self::findOrFail($id);
        $currentprogress = 'Pass';
        foreach ($jc->jcls()->get() as $jcl) {
            if ($jcl->progress != 'Pass') {
                $currentprogress = 'Inprogress';
            }
        }
        $jc->progress = $currentprogress;
        if($currentprogress == 'Pass'){
            $jc->hashkey = Str::random(32);
        }
        $jc->update();
    }
}
