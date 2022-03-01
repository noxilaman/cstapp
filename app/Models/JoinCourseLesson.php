<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinCourseLesson extends Model
{
    use HasFactory;

    protected $fillable = ['join_course_id', 'lesson_id', 'join_date', 'end_date', 'progress', 'status'];

    public function joincourse()
    {
        return $this->hasOne('App\Models\JoinCourse', 'id', 'join_course_id');
    }

    public function lesson()
    {
        return $this->hasOne('App\Models\Lesson', 'id', 'lesson_id');
    }

    public function jclsections()
    {
        return $this->hasMany(JclSection::class, 'join_course_lesson_id');
    }

    public function updateprogress($id)
    {
        $jcl = self::findOrFail($id);
        $currentprogress = 'Pass';
        foreach ($jcl->jclsections()->get() as $jclsection) {
            if ($jclsection->progress != 'Pass') {
                $currentprogress = 'Inprogress';
            }
            foreach ($jclsection->jclquizs()->get() as $jclquiz) {
                if ($jclquiz->progress != 'Pass') {
                    $currentprogress = 'Inprogress';
                }
            }
        }
        $jcl->progress = $currentprogress;

        $jcl->update();
    }
}
