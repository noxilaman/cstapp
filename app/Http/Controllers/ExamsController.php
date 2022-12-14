<?php

namespace App\Http\Controllers;

use App\Models\JclQuiz;
use App\Models\JclSection;
use App\Models\JoinCourseLesson;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isStaff');
    }
    
    public function play($jcl_section_id)
    {
        $jclsection = JclSection::findOrFail($jcl_section_id);
        $jclquizs = JclQuiz::where('jcl_section_id', $jcl_section_id)->inRandomOrder()->get();

        return view('exams.play', compact('jclquizs', 'jclsection'));
    }

    public function playAction(Request $request, $jcl_section_id)
    {
        $requestData = $request->all();

        //$jclObj = JoinCourseLesson::findOrFail($jcl_id);
        $jclsection = JclSection::findOrFail($jcl_section_id);
        $jclquizs = JclQuiz::where('jcl_section_id', $jcl_section_id)->get();
        $allPass = true;
        foreach ($jclquizs as $jclquiz) {
            if (!isset($requestData['choice-'.$jclquiz->id])) {
                $allPass = false;
            } else {
                foreach ($jclquiz->quiz->choicecorrect() as $choice) {
                    if ($choice->id != $requestData['choice-'.$jclquiz->id]) {
                        $allPass = false;
                    }
                }
            }
        }
        if ($allPass) {
            foreach ($jclquizs as $jclquiz) {
                $jclquiz->progress = 'Pass';
                $jclquiz->update();
            }
        }

        $jclsection->jcl->updateprogress($jclsection->join_course_lesson_id);

        $jclsection->jcl->joincourse->updateprogress($jclsection->jcl->join_course_id);
        $jclsection->jcl->joincourse->projcompstudent->updateprogress($jclsection->jcl->joincourse->proj_comp_student_id);

        if($allPass){
            return redirect('/exams/review/'.$jclsection->id);
        }else{
            $request->session()->flash('message', 'สอบแบบทดสอบไม่ผ่าน ทบทวนและเข้าทำการทดสอบใหม่'); 
            $request->session()->flash('alert-class', 'alert-danger'); 
            return redirect('/learns/lesson/'.$jclsection->join_course_lesson_id);
        }
   
    }

    public function review($jcl_section_id)
    {
        $jclsection = JclSection::findOrFail($jcl_section_id);
        $jclquizs = JclQuiz::where('jcl_section_id', $jcl_section_id)->get();

        if ($jclsection->progress == 'Pass') {
            return view('exams.review', compact('jclquizs', 'jclsection'));
        } else {
            return view('exams.play', compact('jclquizs', 'jclsection'));
        }
    }
}
