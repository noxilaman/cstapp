<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyTypesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashComsController;
use App\Http\Controllers\DashStaffsController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\JoinsController;
use App\Http\Controllers\LearnsController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\QuizsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/sky', function () {
    return view('layouts.admin2');
});

Route::prefix('admin')->group(function () {
    Route::resource('company_types', CompanyTypesController::class);
    Route::resource('projects', ProjectsController::class);
    Route::get('companies/certdemo/{id}/{course_id}/{lang}', [CompaniesController::class, 'demo_cert']);
    Route::resource('companies', CompaniesController::class);
    Route::get('students/certdemo/{id}/{lang}', [StudentsController::class, 'demo_cert']);
    Route::resource('students', StudentsController::class);
    Route::get('courses/certdemo/{id}/{lang}', [CoursesController::class, 'demo_cert']);
    Route::resource('courses', CoursesController::class);
    Route::resource('lessons', LessonsController::class);
    Route::get('lessons/list/{course_id}', [LessonsController::class, 'list']);
    Route::resource('sections', SectionsController::class);
    Route::get('sections/list/{lesson_id}', [SectionsController::class, 'list']);
    Route::resource('quizs', QuizsController::class);
    Route::get('quizs/list/{lesson_id}', [QuizsController::class, 'list']);
    Route::get('quizs/deleteChoice/{quiz_id}/{choice_id}', [QuizsController::class, 'deleteChoice']);
    Route::get('companies/changestatus/{id}/{status}', [CompaniesController::class, 'changestatus']);
});

Route::get('companies/register/{project_id}', [CompaniesController::class, 'register']);
Route::post('companies/registerAction/{project_id}', [CompaniesController::class, 'registerAction']);

Route::get('students/register/{project_company_id}', [StudentsController::class, 'register']);
Route::post('students/registerAction/{project_company_id}', [StudentsController::class, 'registerAction']);
Route::get('students/forgotpass', [StudentsController::class, 'forgotpass']);
Route::post('students/forgotpassAction', [StudentsController::class, 'forgotpassAction']);
Route::get('students/qrcode/{project_company_id}', [StudentsController::class, 'qrcode']);

Route::get('join/course/{project_com_student_id}/{course_id}', [JoinsController::class, 'studentJoinCourse']);
Route::get('learns/course/{joincourse_id}', [LearnsController::class, 'learnCourse']);
Route::get('join/lesson/{join_course_id}/{lesson_id}', [JoinsController::class, 'studentJoinLesson']);
Route::get('join/selectedsection/{join_course_id}/{section_id}', [JoinsController::class, 'joinSelectSections']);

Route::get('learns/lesson/{joincourselesson_id}', [LearnsController::class, 'learnLesson']);
Route::get('learns/section/{joincourselesson_id}/{jclsection_id}/{flag}', [LearnsController::class, 'learnSection']);
Route::get('learns/sectionchangestatus/{jclsection_id}/{status}', [LearnsController::class, 'sectionChangeStatus']);


//Exams
Route::get('exams/play/{joincourselesson_id}', [ExamsController::class, 'play']);
Route::post('exams/playAction/{joincourselesson_id}', [ExamsController::class, 'playAction']);
Route::get('exams/review/{joincourselesson_id}', [ExamsController::class, 'review']);

//Company Page
Route::get('company/home', [DashComsController::class, 'home']);
Route::get('company/liststd', [DashComsController::class, 'liststd']);
Route::get('company/setting', [DashComsController::class, 'setting'])->name('company.setting');
Route::post('company/settingAction/{id}', [DashComsController::class, 'settingAction']);
Route::get('company/changepass', [DashComsController::class, 'changepass'])->name('company.changepass');
Route::post('company/changepassAction/{id}', [DashComsController::class, 'changepassAction']);
Route::get('company/certstaff/{student_id}/{course_id}/{lang}', [DashComsController::class, 'certstaff']);

//Staff Page
Route::get('student/changepass', [DashStaffsController::class, 'changepass'])->name('student.changepass');
Route::post('student/changepassAction/{id}', [DashStaffsController::class, 'changepassAction']);
Route::get('student/setting', [DashStaffsController::class, 'staffsetting'])->name('student.setting');
Route::post('student/settingAction/{id}', [DashStaffsController::class, 'staffsettingAction']);

Route::group(['middleware' => ['auth']], function () {
    /*
    * Logout Route
    */
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'perform'])->name('logout.perform');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
