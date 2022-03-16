<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Course;
use App\Models\Project;
use App\Models\ProjectCompany;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('isAdmin');
        $perPage = 10;
        $companies = Company::paginate($perPage);
        $course = Course::where('status', 'Active')->first();

        return view('admin.companies.index', compact('companies', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('isAdmin');

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
        $this->middleware('isAdmin');

        $requestData = $request->all();

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage/images/companies/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'storage/images/companies/'.$name;
        }

        if ($request->hasFile('logo_file')) {
            $logo = $request->file('logo_file');
            $name = md5($logo->getClientOriginalName().time()).'.'.$logo->getClientOriginalExtension();
            $destinationPath = public_path('storage/images/logo/');
            $logo->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['logo'] = 'storage/images/logo/'.$name;
        }

        $company = Company::create($requestData);

        $project = Project::where('status', 'Active')->first();

        $tmp = [];
        $tmp['project_id'] = $project->id;
        $tmp['company_id'] = $company->id;
        $tmp['join_date'] = $project->start_date;
        $tmp['end_date'] = $project->end_date;
        $tmp['status'] = 'Active';

        $pc = ProjectCompany::create($tmp);

        $username = 'C'.str_pad($pc->id, 3, '0', STR_PAD_LEFT).str_pad($company->id, 3, '0', STR_PAD_LEFT);
        $password = $this->_randomPassword(8);

        $tmpUser = [];
        $tmpUser['username'] = $username;
        $tmpUser['name'] = $requestData['name'];
        $tmpUser['email'] = $requestData['email'];
        $tmpUser['password'] = Hash::make($password);
        $tmpUser['group_id'] = 2;
        $tmpUser['company_id'] = $company->company_id;
        $tmpUser['email_verified_at'] = date('Y-m-d H:i:s');

        $studentdata = User::create($tmpUser);

        $company->uname = $username;
        $company->upass = $password;
        $company->update();

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
        $this->middleware('isAdmin');
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
        $this->middleware('isAdmin');
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
        $this->middleware('isAdmin');
        $requestData = $request->all();
        $company = Company::findOrFail($id);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage/images/companies/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'storage/images/companies/'.$name;
        }

        if ($request->hasFile('logo_file')) {
            $logo = $request->file('logo_file');
            $name = md5($logo->getClientOriginalName().time()).'.'.$logo->getClientOriginalExtension();
            $destinationPath = public_path('storage/images/logo/');
            $logo->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['logo'] = 'storage/images/logo/'.$name;
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
        $this->middleware('isAdmin');
        ProjectCompany::where('company_id', $id)->delete();
        Company::destroy($id);

        return redirect('/admin/companies');
    }

    public function changestatus($id, $status)
    {
        $this->middleware('isAdmin');
        $company = Company::findOrFail($id);

        $company->status = $status;
        $company->update();

        $users = User::where('company_id', $id)->get();
        foreach ($users as $userObj) {
            $userObj->status = $status;
            $userObj->update();
        }

        return redirect('/admin/companies');
    }

    public function register($project_id)
    {
        $project = Project::findOrFail($project_id);
        $companytypelist = CompanyType::pluck('name', 'id');

        return view('companies.register', compact('companytypelist', 'project'));
    }

    public function registerAction(Request $request, $project_id)
    {
        $requestData = $request->all();

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $name = md5($image->getClientOriginalName().time()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage/images/companies/');
            $image->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['image'] = 'storage/images/companies/'.$name;
        }

        if ($request->hasFile('logo_file')) {
            $logo = $request->file('logo_file');
            $name = md5($logo->getClientOriginalName().time()).'.'.$logo->getClientOriginalExtension();
            $destinationPath = public_path('storage/images/logo/');
            $logo->move($destinationPath, $name);

            //  $loadm->image = $name;
            $requestData['logo'] = 'storage/images/logo/'.$name;
        }
        $requestData['status'] = 'Inactive';

        $company = Company::create($requestData);

        $project = Project::findOrFail($project_id);

        $tmp = [];
        $tmp['project_id'] = $project->id;
        $tmp['company_id'] = $company->id;
        $tmp['join_date'] = $project->start_date;
        $tmp['end_date'] = $project->end_date;
        $tmp['status'] = 'Active';

        $pc = ProjectCompany::create($tmp);

        $username = 'C'.str_pad($pc->id, 3, '0', STR_PAD_LEFT).str_pad($company->id, 3, '0', STR_PAD_LEFT);
        $password = $this->_randomPassword(8);

        $tmpUser = [];
        $tmpUser['username'] = $username;
        $tmpUser['name'] = $requestData['name'];
        $tmpUser['email'] = $requestData['email'];
        $tmpUser['password'] = Hash::make($password);
        $tmpUser['group_id'] = 2;
        $tmpUser['company_id'] = $company->id;
        $tmpUser['email_verified_at'] = date('Y-m-d H:i:s');

        $studentdata = User::create($tmpUser);

        $company->uname = $username;
        $company->upass = $password;
        $company->update();

        return view('companies.thankyou');
    }

    private function _randomPassword($num)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = []; //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $num; ++$i) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }

        return implode($pass); //turn the array into a string
    }

    public function demo_cert($id, $course_id, $lang)
    {
        $company = Company::findOrFail($id);
        $course = Course::findOrFail($course_id);

        return view('admin.courses.cert_demo', compact('course', 'lang', 'company'));
    }
}
