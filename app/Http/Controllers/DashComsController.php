<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Auth;

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
}
