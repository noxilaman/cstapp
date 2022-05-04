<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashStaffsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isStaff');
    }

    public function staffsetting()
    {
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $student = Student::findOrFail($user->student_id);
        if ($company->status != 'Active') {
            return redirect('/logout');
        }

        return view('students.setting', compact('company', 'student'));
    }

    public function staffsettingAction(Request $request, $id)
    {
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $student = Student::findOrFail($user->student_id);
        if ($company->status != 'Active' || $company->id != $id) {
            return redirect('/logout');
        }
        $requestData = $request->all();
        $student->update($requestData);

        return redirect('student/setting');
    }

    public function changepass(){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $student = Student::findOrFail($user->student_id);
        if ($company->status != 'Active') {
            return redirect('/logout');
        }

        return view('students.changepass', compact('company','student'));
    }

    public function changepassAction(Request $request,$id){
        $user = Auth::user();
        $company = Company::findOrFail($user->company_id);
        $student = Student::findOrFail($id);
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

        $student->upass = $rawpass;
        $student->update();

        return redirect('/home');
    }
}
