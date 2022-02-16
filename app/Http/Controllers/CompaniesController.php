<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Project;
use App\Models\ProjectCompany;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $companies = Company::paginate($perPage);

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companytypelist = CompanyType::pluck('name', 'id');

        return view('admin.companies.create', compact('companytypelist'));
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
            $destinationPath = public_path('images/companies/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'images/companies/'.$name;
        }

        if ($request->hasFile('logo_file')) {
            $logo = $request->file('logo_file');
            $name = md5($logo->getClientOriginalName().time()).'.'.$logo->getClientOriginalExtension();
            $destinationPath = public_path('images/logo/');
            $logo->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['logo'] = 'images/logo/'.$name;
        }

        $company = Company::create($requestData);

        $project = Project::where('status', 'Active')->first();

        $tmp = [];
        $tmp['project_id'] = $project->id;
        $tmp['company_id'] = $company->id;
        $tmp['join_date'] = $project->start_date;
        $tmp['end_date'] = $project->end_date;
        $tmp['status'] = 'Active';

        ProjectCompany::create($tmp);

        return redirect('/admin/companies');
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
        $company = Company::findOrFail($id);

        return view('admin.companies.show', compact('company'));
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
        $companytypelist = CompanyType::pluck('name', 'id');
        $company = Company::findOrFail($id);

        return view('admin.companies.edit', compact('company', 'companytypelist'));
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
        $company = Company::findOrFail($id);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/companies/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'images/companies/'.$name;
        }

        if ($request->hasFile('logo_file')) {
            $logo = $request->file('logo_file');
            $name = md5($logo->getClientOriginalName().time()).'.'.$logo->getClientOriginalExtension();
            $destinationPath = public_path('images/logo/');
            $logo->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['logo'] = 'images/logo/'.$name;
        }

        $company->update($requestData);

        return redirect('/admin/companies');
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
        Company::destroy($id);

        return redirect('/admin/companies');
    }

    public function changestatus($id, $status)
    {
        $company = Company::findOrFail($id);

        $company->status = $status;
        $company->update();

        return redirect('/admin/companies');
    }

    public function register($project_id)
    {
        $project = Project::findOrFail($project_id);
        $companytypelist = CompanyType::pluck('name', 'id');

        return view('companies.register', compact('companytypelist', 'project'));
    }
}
