<?php

namespace App\Http\Controllers;

use App\Models\JoinCourse;
use App\Models\JoinCourseLesson;
use App\Models\Company;
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
            $companies = Company::where('status', 'Active')->get();
            // dd($companies[0]->projectselectcompanies($project->id)->projectcompstudents->count());
            return view('admin.dashboards.admin', compact('project', 'companies'));
        } elseif (Auth::user() && Auth::user()->group->name == 'company') {
            return redirect('/company/home');
        } elseif (Auth::user() && Auth::user()->group->name == 'student') {
            $dataStudent = Student::findOrFail(Auth::user()->student_id);

            $projectcompstudent = $dataStudent->projcompstudents()->first();
            $project = $projectcompstudent->projectcompany->project;


            $courses = $project->courses;
            // dd($courses);
            $jcls = [];
            $progress = [];
            $joincourses = [];
            foreach($courses as $courseObj){
            
            $progress[$courseObj->id]['count'] = $courseObj->lessons->count();
            $progress[$courseObj->id]['pass'] = 0;

            $joincourses[$courseObj->id] = JoinCourse::where('proj_comp_student_id', $projectcompstudent->id)->where('course_id', $courseObj->id)->first();
            if (!empty($joincourses[$courseObj->id])) {
                $jclrw = JoinCourseLesson::where('join_course_id', $joincourses[$courseObj->id]->id)->get();
                foreach ($jclrw as $jclObj) {
                    $jcls[$courseObj->id][$jclObj->lesson_id] = $jclObj;

                    if ($jclObj->progress == 'Pass') {
                        ++$progress[$courseObj->id]['pass'];
                    }
                }
            }
            }

            
            return view('dashboards.joincourse',compact('courses','project','jcls','progress','joincourses','projectcompstudent'));
            


            $course = $project->courses()->first();
            

            return view('dashboards.student', compact('dataStudent', 'projectcompstudent', 'project', 'course', 'joincourse', 'jcls', 'progress'));
        }
    }
}
