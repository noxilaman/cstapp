<?php

namespace App\Http\Controllers;

use App\Models\JclSection;
use App\Models\JoinCourse;
use App\Models\JoinCourseLesson;

class LearnsController extends Controller
{
    public function learnCourse($joincourse_id)
    {
        $joincourseObj = JoinCourse::findOrFail($joincourse_id);
        //dd($joincourseObj->course->lessons()->get());
        $joinlessonrw = JoinCourseLesson::where('join_course_id', $joincourse_id)->get();
        $joinlessons = [];
        foreach ($joinlessonrw as $joinlesson) {
            $joinlessons[$joinlesson->lesson_id] = $joinlesson;
        }

        return view('courses.learn', compact('joincourseObj', 'joinlessons'));
    }

    public function learnLesson($joincourselesson_id)
    {
        $jclObj = JoinCourseLesson::findOrFail($joincourselesson_id);

        $jclSectionRw = JclSection::where('join_course_lesson_id', $joincourselesson_id)->get();
        $jclSections = [];
        $jclSectionFlags = [];
        $nextSeq = 0;
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
            }
            if ($jclSectionObj->section->seq == $nextSeq) {
                $jclSectionFlags[$jclSectionObj->section_id] = true;
            }
        }

        return view('lessons.learn', compact('jclObj', 'jclSections', 'jclSectionFlags'));
    }

    public function learnSection($joincourselesson_id, $jclsection_id)
    {
        $jclObj = JoinCourseLesson::findOrFail($joincourselesson_id);
        $jclSection = JclSection::findOrFail($jclsection_id);
        if ($jclSection->progress != 'Pass') {
            $jclSection->progress = 'Inprogress';
            $jclSection->update();
        }

        return view('lessons.learnsection', compact('jclObj', 'jclSection'));
    }

    public function sectionChangeStatus($jclsection_id, $status)
    {
        $jclSection = JclSection::findOrFail($jclsection_id);
        $jclSection->progress = $status;
        $jclSection->update();
    }
}
