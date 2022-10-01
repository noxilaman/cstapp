<?php

namespace App\Http\Controllers;

use App\Models\JclQuiz;
use App\Models\JclSection;
use App\Models\Section;
use App\Models\JoinCourse;
use App\Models\JoinCourseLesson;
use App\Models\ProjCompStudent;

class JoinsController extends Controller
{
    public function studentJoinCourse($proj_com_student_id, $course_id)
    {
        $joincourse = JoinCourse::where('proj_comp_student_id', $proj_com_student_id)->where('course_id', $course_id)->first();

        if (empty($joincourse)) {
            $pjcomstd = ProjCompStudent::findOrFail($proj_com_student_id);

            $tmpJoinCourse = [];
            $tmpJoinCourse['proj_comp_student_id'] = $proj_com_student_id;
            $tmpJoinCourse['project_id'] = $pjcomstd->project_id;
            $tmpJoinCourse['company_id'] = $pjcomstd->company_id;
            $tmpJoinCourse['student_id'] = $pjcomstd->student_id;
            $tmpJoinCourse['course_id'] = $course_id;
            $tmpJoinCourse['join_date'] = date('Y-m-d');
            $tmpJoinCourse['end_date'] = date('Y-m-d', strtotime('+1 year'));
            $tmpJoinCourse['progress'] = 'Join';
            $tmpJoinCourse['status'] = 'Active';
            $joincourse = JoinCourse::create($tmpJoinCourse);

            foreach($joincourse->course->lessons()->get() as $sublesson){
                $tmpJoinCourseLesson = [];
                $tmpJoinCourseLesson['join_course_id'] = $joincourse->id;
                $tmpJoinCourseLesson['lesson_id'] = $sublesson->id;
                $tmpJoinCourseLesson['join_date'] = date('Y-m-d');
                $tmpJoinCourseLesson['end_date'] = date('Y-m-d', strtotime('+1 year'));
                $tmpJoinCourseLesson['progress'] = 'Join';
                $tmpJoinCourseLesson['status'] = 'Active';

                $joincourselesson = JoinCourseLesson::create($tmpJoinCourseLesson);

                $this->joinAllSections($joincourselesson);
             }
            
        }

        return redirect('/learns/course/'.$joincourse->id);
    }

    public function studentJoinLesson($join_course_id, $lesson_id)
    {
        $joincourselesson = JoinCourseLesson::where('join_course_id', $join_course_id)
            ->where('lesson_id', $lesson_id)
            ->first();
        if (empty($joincourselesson)) {
            $tmpJoinCourseLesson = [];
            $tmpJoinCourseLesson['join_course_id'] = $join_course_id;
            $tmpJoinCourseLesson['lesson_id'] = $lesson_id;
            $tmpJoinCourseLesson['join_date'] = date('Y-m-d');
            $tmpJoinCourseLesson['end_date'] = date('Y-m-d', strtotime('+1 year'));
            $tmpJoinCourseLesson['progress'] = 'Join';
            $tmpJoinCourseLesson['status'] = 'Active';

            $joincourselesson = JoinCourseLesson::create($tmpJoinCourseLesson);

            $this->joinAllSections($joincourselesson);

            //$this->randomQuiz($joincourselesson);
        }

        return redirect('/learns/lesson/'.$joincourselesson->id);
    }

    public function joinAllSections($joincourselesson)
    {
        foreach ($joincourselesson->lesson->sections()->get() as $section) {
            $tmpJCLSection = [];
            $tmpJCLSection['join_course_lesson_id'] = $joincourselesson->id;
            $tmpJCLSection['section_id'] = $section->id;
            $tmpJCLSection['join_date'] = date('Y-m-d');
            $tmpJCLSection['end_date'] = date('Y-m-d', strtotime('+1 year'));
            $tmpJCLSection['progress'] = 'Join';
            $tmpJCLSection['status'] = 'Active';

            $limitquiz = 3;
            if (isset($section->limit_quiz)) {
                $limitquiz = $section->limit_quiz;
            }

            $jclSection = JclSection::create($tmpJCLSection);

            foreach ($section->quizs()->inRandomOrder()->limit($limitquiz)->get() as $quiz) {
                $tmpJCLQuiz = [];
                $tmpJCLQuiz['jcl_section_id'] = $jclSection->id;
                $tmpJCLQuiz['quiz_id'] = $quiz->id;
                $tmpJCLQuiz['join_date'] = date('Y-m-d');
                $tmpJCLQuiz['end_date'] = date('Y-m-d', strtotime('+1 year'));
                $tmpJCLQuiz['time_no'] = 0;
                $tmpJCLQuiz['progress'] = 'Join';
                $tmpJCLQuiz['status'] = 'Active';

                JclQuiz::create($tmpJCLQuiz);
            }
        }
    }

    public function randomQuiz($joincourselesson)
    {
        $limitquiz = $joincourselesson->lesson->limit_quiz;
        foreach ($joincourselesson->lesson->quizs()->inRandomOrder()->limit($limitquiz)->get() as $quiz) {
            $tmpJCLQuiz = [];
            $tmpJCLQuiz['join_course_lesson_id'] = $joincourselesson->id;
            $tmpJCLQuiz['quiz_id'] = $quiz->id;
            $tmpJCLQuiz['join_date'] = date('Y-m-d');
            $tmpJCLQuiz['end_date'] = date('Y-m-d', strtotime('+1 year'));
            $tmpJCLQuiz['time_no'] = 0;
            $tmpJCLQuiz['progress'] = 'Join';
            $tmpJCLQuiz['status'] = 'Active';

            JclQuiz::create($tmpJCLQuiz);
        }
    }

    public function joinSelectSections($joincourselesson_id,$section_id)
    {
        $joincourselesson = JoinCourseLesson::findOrFail($joincourselesson_id);
        $section = Section::findOrFail($section_id);
        //foreach ($joincourselesson->lesson->sections()->get() as $section) {
            $tmpJCLSection = [];
            $tmpJCLSection['join_course_lesson_id'] = $joincourselesson->id;
            $tmpJCLSection['section_id'] = $section->id;
            $tmpJCLSection['join_date'] = date('Y-m-d');
            $tmpJCLSection['end_date'] = date('Y-m-d', strtotime('+1 year'));
            $tmpJCLSection['progress'] = 'Join';
            $tmpJCLSection['status'] = 'Active';



            $limitquiz = 3;
            if (isset($section->limit_quiz)) {
                $limitquiz = $section->limit_quiz;
            }

            $jclSection = JclSection::create($tmpJCLSection);

            foreach ($section->quizs()->inRandomOrder()->limit($limitquiz)->get() as $quiz) {
                $tmpJCLQuiz = [];
                $tmpJCLQuiz['jcl_section_id'] = $jclSection->id;
                $tmpJCLQuiz['quiz_id'] = $quiz->id;
                $tmpJCLQuiz['join_date'] = date('Y-m-d');
                $tmpJCLQuiz['end_date'] = date('Y-m-d', strtotime('+1 year'));
                $tmpJCLQuiz['time_no'] = 0;
                $tmpJCLQuiz['progress'] = 'Join';
                $tmpJCLQuiz['status'] = 'Active';

                JclQuiz::create($tmpJCLQuiz);
            }
        //}
        return redirect('/learns/section/'.$joincourselesson->id.'/'.$jclSection->id.'/N');
    }
}
