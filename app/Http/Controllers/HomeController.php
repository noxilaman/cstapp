<?php

namespace App\Http\Controllers;

use App\Models\JoinCourse;
use App\Models\JoinCourseLesson;
use App\Models\Project;
use App\Models\Student;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user() && Auth::user()->group->name == 'admin') {
            $project = Project::where('status', 'Active')->first();

            return view('admin.dashboards.admin', compact('project'));
        } elseif (Auth::user() && Auth::user()->group->name == 'company') {
            return redirect('/company/home');
        } elseif (Auth::user() && Auth::user()->group->name == 'student') {
            $dataStudent = Student::findOrFail(Auth::user()->student_id);

            $projectcompstudent = $dataStudent->projcompstudents()->first();
            $project = $projectcompstudent->projectcompany->project;

            //  dd($project);
            $course = $project->courses()->first();
            $jcls = [];
            $joincourse = JoinCourse::where('proj_comp_student_id', $projectcompstudent->id)->where('course_id', $course->id)->first();
            if (!empty($joincourse)) {
                $jclrw = JoinCourseLesson::where('join_course_id', $joincourse->id)->get();
                foreach ($jclrw as $jclObj) {
                    $jcls[$jclObj->lesson_id] = $jclObj;
                }
            }

            //dd($course);

            return view('dashboards.student', compact('dataStudent', 'projectcompstudent', 'project', 'course', 'joincourse', 'jcls'));
        }
    }
}
