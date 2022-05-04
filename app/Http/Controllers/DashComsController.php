<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Course;
use App\Models\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashComsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isCompany');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liststd()
    {
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $projectcompany = $company->projectcompanies()->first();
        $perPage = 10;

        $pjcomstds = $projectcompany->projectcompstudents()->paginate($perPage);

        return view('companies.liststudent', compact('pjcomstds', 'company'));
    }

    public function home()
    {
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        if ($company->status != 'Active') {
            return redirect('/logout');
        }

        $projectcompany = $company->projectcompanies()->first();

        $stat = [];
        $stat['all'] = 0;
        $stat['pass'] = 0;
        $stat['inprogress'] = 0;
        $stat['join'] = 0;
        foreach ($projectcompany->projectcompstudents()->get() as $pcsObj) {
            ++$stat['all'];
            if ($pcsObj->progress == 'Pass') {
                ++$stat['pass'];
            } elseif ($pcsObj->progress == 'Inprogress') {
                ++$stat['inprogress'];
            } else {
                ++$stat['join'];
            }
        }

        return view('dashboards.company', compact('projectcompany', 'company', 'stat'));
    }

    public function setting()
    {
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        if ($company->status != 'Active') {
            return redirect('/logout');
        }

        $companytypelist = CompanyType::pluck('name', 'id');

        return view('companies.setting', compact('company', 'companytypelist'));
    }

    public function settingAction(Request $request, $id)
    {
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        if ($company->status != 'Active' || $company->id != $id) {
            return redirect('/logout');
        }

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

        $company->update($requestData);

        return redirect('company/setting');
    }

    public function changepass(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        if ($company->status != 'Active') {
            return redirect('/logout');
        }

        return view('companies.changepass', compact('company'));
    }

    public function changepassAction(Request $request,$id){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        if ($company->status != 'Active' || $company->id != $id) {
            return redirect('/logout');
        }

        $request->validate([
            'newpass' => 'required|min:6|max:20|confirmed'
        ]);

        $requestData = $request->all();

        $rawpass =  $requestData['newpass'];
        $encrypass =  Hash::make($requestData['newpass']);

        $user->password = $encrypass;
        $user->update();

        $company->upass = $rawpass;
        $company->update();

        return redirect('/home');
    }

    public function certstaff($student_id, $course_id, $lang)
    {
        $student = Student::findOrFail($student_id);
        $course = Course::findOrFail($course_id);
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);

        return view('companies.cert_demo', compact('course', 'lang', 'company', 'student'));
    }
}
