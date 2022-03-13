<?php

namespace App\Http\Controllers;

use App\Models\JoinCourse;
use App\Models\ProjCompStudent;
use App\Models\ProjectCompany;
use App\Models\Student;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $students = Student::paginate($perPage);

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    public function register($project_company_id)
    {
        $projectcompany = ProjectCompany::findOrFail($project_company_id);

        if ($projectcompany->company->status == 'Active') {
            return view('students.register', compact('projectcompany'));
        } else {
            return redirect('/');
        }
    }

    public function registerAction(Request $request, $project_company_id)
    {
        $requestData = $request->all();
        $projectcompany = ProjectCompany::findOrFail($project_company_id);

        $tmpStudent = [];
        $tmpStudent['idcard'] = $requestData['idcard'];
        $tmpStudent['mobile'] = $requestData['mobile'];
        $tmpStudent['fname'] = $requestData['fname'];
        $tmpStudent['lname'] = $requestData['lname'];
        $tmpStudent['fname_en'] = $requestData['fname_en'];
        $tmpStudent['lname_en'] = $requestData['lname_en'];
        $tmpStudent['uname'] = 'base';
        $tmpStudent['upass'] = 'base';
        $tmpStudent['password'] = 'base'; //,'uname','upass','status'
        $studentdata = Student::create($tmpStudent);

        $username = 'U'.str_pad($project_company_id, 3, '0', STR_PAD_LEFT).str_pad($studentdata->id, 3, '0', STR_PAD_LEFT);
        $password = $this->_randomPassword(8);

        $studentdata->uname = $username;
        $studentdata->upass = $password;
        $studentdata->status = 'Active';
        $studentdata->update();

        $tmpUser = [];
        $tmpUser['username'] = $username;
        $tmpUser['name'] = $requestData['fname'].' '.$requestData['lname'];
        $tmpUser['email'] = $requestData['mobile'].'@mobile.me';
        $tmpUser['password'] = Hash::make($password);
        $tmpUser['group_id'] = 3;
        $tmpUser['company_id'] = $projectcompany->company_id;
        $tmpUser['student_id'] = $studentdata->id;
        $tmpUser['email_verified_at'] = date('Y-m-d H:i:s');

        $userdata = User::create($tmpUser);

        $tmpprojcompstudent = [];
        $tmpprojcompstudent['project_company_id'] = $projectcompany->id;
        $tmpprojcompstudent['project_id'] = $projectcompany->project_id;
        $tmpprojcompstudent['company_id'] = $projectcompany->company_id;
        $tmpprojcompstudent['student_id'] = $studentdata->id;
        $tmpprojcompstudent['join_date'] = date('Y-m-d');
        $tmpprojcompstudent['end_date'] = date('Y-m-d', strtotime('+1 year'));
        $tmpprojcompstudent['progress'] = 'Join';
        $tmpprojcompstudent['status'] = 'Active';

        $pjcomstd = ProjCompStudent::create($tmpprojcompstudent);

        Auth::login($userdata);

        return view('students.thankyou', compact('studentdata', 'pjcomstd'));
    }

    public function qrcode($project_company_id)
    {
        $projectcompany = ProjectCompany::findOrFail($project_company_id);

        return view('students.qrcode', compact('projectcompany'));
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

    public function demo_cert($id, $lang)
    {
        $student = Student::findOrFail($id);
        $projcompstudent = $student->projcompstudents()->where('student_id', $id)->first();
        $company = $projcompstudent->company;
        $course = JoinCourse::where('proj_comp_student_id', $projcompstudent->id)->first()->course;

        return view('admin.courses.cert_demo', compact('course', 'lang', 'company', 'student'));
    }
}
