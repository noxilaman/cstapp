<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Project;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $courses = Course::paginate($perPage);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectlist = Project::pluck('name', 'id');

        return view('admin.courses.create', compact('projectlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('cert_th_file')) {
            $image = $request->file('cert_th_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/certs/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['cert_img_th'] = 'images/certs/'.$name;
        }

        if ($request->hasFile('cert_en_file')) {
            $image = $request->file('cert_en_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/certs/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['cert_img_en'] = 'images/certs/'.$name;
        }

        $course = Course::create($requestData);

        return redirect('/admin/courses');
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
        $course = Course::findOrFail($id);

        return view('admin.courses.show', compact('course'));
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
        $course = Course::findOrFail($id);
        $projectlist = Project::pluck('name', 'id');

        return view('admin.courses.edit', compact('course', 'projectlist'));
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
        $course = Course::findOrFail($id);

        if ($request->hasFile('cert_th_file')) {
            $image = $request->file('cert_th_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/certs/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['cert_img_th'] = 'images/certs/'.$name;
        }

        if ($request->hasFile('cert_en_file')) {
            $image = $request->file('cert_en_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/certs/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['cert_img_en'] = 'images/certs/'.$name;
        }

        $course->update($requestData);

        return redirect('/admin/courses');
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
        //Course::destroy($id);

        return redirect('/admin/courses');
    }

    public function demo_cert($id, $lang)
    {
        $course = Course::findOrFail($id);

        return view('admin.courses.cert_demo', compact('course', 'lang'));
    }
}
