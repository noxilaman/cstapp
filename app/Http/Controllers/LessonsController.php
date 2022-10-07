<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $lessons = Lesson::paginate($perPage);

        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courselist = Course::pluck('name', 'id');

        return view('admin.lessons.create', compact('courselist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/lessons/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'images/lessons/'.$name;
        }

        $lesson = Lesson::create($requestData);

        return redirect('/admin/lessons');
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
        $lesson = Lesson::findOrFail($id);

        return view('admin.lessons.show', compact('lesson'));
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
        $courselist = Course::pluck('name', 'id');
        $lesson = Lesson::findOrFail($id);

        return view('admin.lessons.edit', compact('lesson', 'courselist'));
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
        $lesson = Lesson::findOrFail($id);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/lessons/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'images/lessons/'.$name;
        }

        $lesson->update($requestData);

        return redirect('/admin/lessons');
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
        Lesson::destroy($id);

        return redirect('/admin/lessons');
    }

    public function list($course_id)
    {
        $perPage = 10;
        $lessons = Lesson::where('course_id', $course_id)->paginate($perPage);

        return view('admin.lessons.index', compact('lessons'));
    }
}
