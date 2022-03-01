<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjCompStudent extends Model
{
    use HasFactory;

    protected $fillable = ['project_company_id', 'project_id', 'company_id', 'student_id', 'join_date', 'end_date', 'progress', 'status'];

    public function projectcompany()
    {
        return $this->hasOne('App\Models\ProjectCompany', 'id', 'project_company_id');
    }

    public function student()
    {
        return $this->hasOne('App\Models\Student', 'id', 'student_id');
    }

    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }

    public function joincourses()
    {
        return $this->hasMany(JoinCourse::class, 'proj_comp_student_id');
    }

    public function updateprogress($id)
    {
        $projcompstudent = self::findOrFail($id);
        $currentprogress = 'Pass';
        foreach ($projcompstudent->joincourses()->get() as $joincourse) {
            if ($joincourse->progress != 'Pass') {
                $currentprogress = 'Inprogress';
            }
        }
        $projcompstudent->progress = $currentprogress;
        $projcompstudent->update();
    }
}
