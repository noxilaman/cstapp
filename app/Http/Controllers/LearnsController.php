<?php

namespace App\Http\Controllers;

use App\Models\JclQuiz;
use App\Models\JclSection;
use App\Models\JoinCourse;
use App\Models\JoinCourseLesson;
use App\Models\Student;
use Auth;

class LearnsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isStaff');
    }
    
    public function learnCourse($joincourse_id)
    {
        $progress = [];
        $joincourseObj = JoinCourse::findOrFail($joincourse_id);
        //dd($joincourseObj->course->lessons()->get());
        $joinlessonrw = JoinCourseLesson::where('join_course_id', $joincourse_id)->get();
        $joinlessons = [];

        $projectcompstudent = $joincourseObj->projectcompstudent;
        $project = $joincourseObj->project;
        $course = $joincourseObj->course;
        $joincourse=$joincourseObj;
        $progress['count'] = $course->lessons->count();
            $progress['pass'] = 0;

        foreach ($joinlessonrw as $joinlesson) {
            $joinlessons[$joinlesson->lesson_id] = $joinlesson;
            if ($joinlesson->progress == 'Pass') {
                ++$progress['pass'];
            }
        }

        $jcls = $joinlessons;
        
        $dataStudent = Student::findOrFail(Auth::user()->student_id);
        //dd($joincourse);
        return view('dashboards.student', compact('dataStudent', 'projectcompstudent', 'project', 'course', 'joincourse', 'jcls', 'progress'));
        
        //return view('courses.learn', compact('joincourseObj', 'joinlessons'));
    }

    public function learnLesson($joincourselesson_id)
    {
        $jclObj = JoinCourseLesson::findOrFail($joincourselesson_id);

        $jclSectionRw = JclSection::where('join_course_lesson_id', $joincourselesson_id)->get();
        //$jclQuizRw = JclQuiz::where('join_course_lesson_id', $joincourselesson_id)->get();
        $jclSections = [];
        $jclQuizs = [];
        $jclSectionFlags = [];
        $jclQuizFlags = [];
        $nextSeq = 0;
        // dd($jclSectionRw );
        foreach ($jclSectionRw as $jclSectionObj) {
            $jclSections[$jclSectionObj->section_id] = $jclSectionObj;
            $jclSectionFlags[$jclSectionObj->section_id] = false;
            if ($jclSectionObj->section->seq == 1) {
                $jclSectionFlags[$jclSectionObj->section_id] = true;
            } else {
                if ($jclSectionObj->progress != 'Join') {
                    $jclSectionFlags[$jclSectionObj->section_id] = true;
                }
            }
            if ($jclSectionObj->progress == 'Pass') {
                $nextSeq = $jclSectionObj->section->seq + 1;
            } else {
                $canQuiz = false;
            }
            if ($jclSectionObj->section->seq == $nextSeq) {
                $jclSectionFlags[$jclSectionObj->section_id] = true;
            }

            

            $jclQuizFlags[$jclSectionObj->section_id] = true;
            foreach ($jclSectionObj->jclquizs()->get() as $jclQuizObj) {
                if ($jclQuizObj->progress != 'Pass') {
                    $jclQuizFlags[$jclSectionObj->section_id] = false;
                }
            }
        }

        return view('lessons.learn', compact('jclObj', 'jclSections', 'jclSectionFlags', 'jclQuizFlags'));
    }

    public function learnSection($joincourselesson_id, $jclsection_id, $flagpass = 'N')
    {
        $jclObj = JoinCourseLesson::findOrFail($joincourselesson_id);
        $jclSection = JclSection::findOrFail($jclsection_id);
        if ($jclSection->progress != 'Pass') {
            $jclSection->progress = 'Inprogress';
            $jclSection->update();
        }

        $jclObj->updateprogress($joincourselesson_id);
        $jclObj->joincourse->updateprogress($jclObj->join_course_id);
        $jclObj->joincourse->projcompstudent->updateprogress($jclObj->joincourse->proj_comp_student_id);

        return view('lessons.learnsection', compact('jclObj', 'jclSection','flagpass'));
    }

    public function sectionChangeStatus($jclsection_id, $status)
    {
        $jclSection = JclSection::findOrFail($jclsection_id);
        $jclSection->progress = $status;
        $jclSection->update();
    }

    public function viewedfirstvdo($joincourse_id)
    {
        $joincourseObj = JoinCourse::findOrFail($joincourse_id);
        $joincourseObj->view_clip = "viewed";
        $joincourseObj->update();
    }
}
