<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyType;

class CompanyTypesController extends Controller
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
        $companytypes = CompanyType::paginate($perPage);
     
        return view('admin.company_types.index',compact('companytypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/company_type/');
            $image->move($destinationPath, $name);

          //  $loadm->image = $name;
            $requestData['image'] = 'images/company_type/' . $name;
        }

        CompanyType::create($requestData);

        return redirect('/admin/company_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companytype = CompanyType::findOrFail($id);
        return view('admin.company_types.show',compact('companytype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companytype = CompanyType::findOrFail($id);
        return view('admin.company_types.edit',compact('companytype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $companytype = CompanyType::findOrFail($id);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/company_type/');
            $image->move($destinationPath, $name);

          //  $loadm->image = $name;
            $requestData['image'] = 'images/company_type/' . $name;
        }

        $companytype->update($requestData);

        return redirect('/admin/company_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CompanyType::destroy($id);
        return redirect('/admin/company_types');
    }
}
