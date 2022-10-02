<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinCourse;

class GeneralController extends Controller
{
    public function publiccert($lang,$key)
    {


        $joinCourseObj = JoinCourse::where('hashkey',$key)->first();

       

        if(!empty($joinCourseObj)){
            $student = $joinCourseObj->student;
            $projcompstudent = $joinCourseObj->projcompstudent;
            $company = $joinCourseObj->company;
            $course = $joinCourseObj->course;

            //dd($course);

            // $student = Student::findOrFail($id);
            // $projcompstudent = $student->projcompstudents()->where('student_id', $id)->first();
            // $company = $projcompstudent->company;
            // $course = JoinCourse::where('proj_comp_student_id', $projcompstudent->id)->first()->course;

            return view('public.cert_demo', compact('course', 'lang', 'company', 'student'));
        }

        
    }
}
