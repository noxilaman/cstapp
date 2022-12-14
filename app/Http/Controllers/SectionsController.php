<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
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
    public function index(Request $request)
    {
        $txtsearch = $request->query('txtsearch');
        $perPage = 10;

        if(!empty($txtsearch )){
            $sections = Section::Where('name','like','%'.$txtsearch.'%')->paginate($perPage);
        }else{
            $sections = Section::paginate($perPage);
        }

        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessonlist = Lesson::pluck('name', 'id');

        return view('admin.sections.create', compact('lessonlist'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/sections/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'images/sections/'.$name;
        }

        $section = Section::create($requestData);

        return redirect('/admin/sections');
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
        $section = Section::findOrFail($id);

        return view('admin.sections.show', compact('section'));
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
        $section = Section::findOrFail($id);

        return view('admin.sections.edit', compact('section', 'lessonlist'));
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
        $section = Section::findOrFail($id);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/sections/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'images/sections/'.$name;
        }

        $section->update($requestData);

        return redirect('/admin/sections');
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
        Section::destroy($id);

        return redirect('/admin/sections');
    }

    public function list($section_id)
    {
        $perPage = 10;
        $sections = Section::where('section_id', $section_id)->paginate($perPage);

        return view('admin.sections.index', compact('sections'));
    }
}
