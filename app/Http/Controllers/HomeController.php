<?php

namespace App\Http\Controllers;

use App\Models\JoinCourse;
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
            return view('admin.dashboards.admin');
        } elseif (Auth::user() && Auth::user()->group->name == 'company') {
            return view('dashboards.company');
        } elseif (Auth::user() && Auth::user()->group->name == 'student') {
            $dataStudent = Student::findOrFail(Auth::user()->student_id);

            $projectcompstudent = $dataStudent->projcompstudents()->first();
            $project = $projectcompstudent->projectcompany->project;

            //  dd($project);
            $course = $project->courses()->first();

            $joincourse = JoinCourse::where('proj_comp_student_id', $projectcompstudent->id)->where('course_id', $course->id)->first();

            //dd($course);

            return view('dashboards.student', compact('dataStudent', 'projectcompstudent', 'project', 'course', 'joincourse'));
        }
    }
}
