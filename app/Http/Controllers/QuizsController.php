<?php

namespace App\Http\Controllers;

use App\Models\Chioce;
use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $quizs = Quiz::paginate($perPage);

        return view('admin.quizs.index', compact('quizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessonlist = Lesson::pluck('name', 'id');

        return view('admin.quizs.create', compact('lessonlist'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/quizs/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'images/quizs/'.$name;
        }

        $quiz = Quiz::create($requestData);

        for ($loop = 1; $loop <= 6; ++$loop) {
            if (!empty($requestData['c_name'.$loop])) {
                $tmpchoice = [];
                $tmpchoice['quiz_id'] = $quiz->id;
                $tmpchoice['name'] = $requestData['c_name'.$loop];
                $tmpchoice['result'] = $requestData['c_result'.$loop];
                $tmpchoice['desc'] = $requestData['c_desc'.$loop];
                if ($request->hasFile('c_image_file'.$loop)) {
                    $image = $request->file('c_image_file'.$loop);
                    $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('images/quizs/'.$quiz->id);
                    $image->move($destinationPath, $name);

                    //  $loadm->image = $name;
                    $tmpchoice['image'] = 'images/quizs/'.$quiz->id.'/'.$name;
                }
                $tmpchoice['status'] = 'Active';
                Chioce::create($tmpchoice);
            }
        }

        return redirect('/admin/quizs');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);

        return view('admin.quizs.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lessonlist = Lesson::pluck('name', 'id');
        $quiz = Quiz::findOrFail($id);

        return view('admin.quizs.edit', compact('quiz', 'lessonlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $quiz = Quiz::findOrFail($id);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/quizs/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'images/quizs/'.$name;
        }

        $quiz->update($requestData);

        foreach ($quiz->choices()->get() as $choice) {
            if (!empty($requestData['c_name'.$choice->id])) {
                $choice->name = $requestData['c_name'.$choice->id];
                $choice->result = $requestData['c_result'.$choice->id];
                $choice->desc = $requestData['c_desc'.$choice->id];
                if ($request->hasFile('c_image_file'.$choice->id)) {
                    $image = $request->file('c_image_file'.$choice->id);
                    $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('images/quizs/'.$quiz->id);
                    $image->move($destinationPath, $name);

                    //  $loadm->image = $name;
                    $choice->image = 'images/quizs/'.$quiz->id.'/'.$name;
                }
                $choice->update();
            }
        }

        if (!empty($requestData['c_name_new'])) {
            $tmpchoice = [];
            $tmpchoice['quiz_id'] = $quiz->id;
            $tmpchoice['name'] = $requestData['c_name_new'];
            $tmpchoice['result'] = $requestData['c_result_new'];
            $tmpchoice['desc'] = $requestData['c_desc_new'];
            if ($request->hasFile('c_image_file_new')) {
                $image = $request->file('c_image_file_new');
                $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('images/quizs/'.$quiz->id);
                $image->move($destinationPath, $name);

                //  $loadm->image = $name;
                $tmpchoice['image'] = 'images/quizs/'.$quiz->id.'/'.$name;
            }
            $tmpchoice['status'] = 'Active';
            Chioce::create($tmpchoice);
        }

        return redirect('/admin/quizs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quiz::destroy($id);

        return redirect('/admin/quizs');
    }

    public function list($lesson_id)
    {
        $perPage = 10;
        $quizs = Quiz::where('lesson_id', $lesson_id)->paginate($perPage);

        return view('admin.quizs.index', compact('quizs'));
    }

    public function deleteChoice($quiz_id, $choice_id)
    {
        Chioce::destroy($choice_id);

        return redirect('/admin/quizs/'.$quiz_id.'/edit');
    }
}
