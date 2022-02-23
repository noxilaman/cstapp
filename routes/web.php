<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyTypesController;
use App\Http\Controllers\CoursesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sky', function () {
    return view('layouts.admin2');
});

Route::prefix('admin')->group(function () {
    Route::resource('company_types', CompanyTypesController::class);
    Route::resource('projects', ProjectsController::class);
    Route::resource('companies', CompaniesController::class);
    Route::resource('students', StudentsController::class);
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
Route::get('students/qrcode/{project_company_id}', [StudentsController::class, 'qrcode']);

Route::get('join/course/{project_com_student_id}/{course_id}', [JoinsController::class, 'studentJoinCourse']);
Route::get('learns/course/{joincourse_id}', [LearnsController::class, 'learnCourse']);
Route::get('join/lesson/{join_course_id}/{lesson_id}', [JoinsController::class, 'studentJoinLesson']);
Route::get('learns/lesson/{joincourselesson_id}', [LearnsController::class, 'learnLesson']);
Route::get('learns/section/{joincourselesson_id}/{jclsection_id}', [LearnsController::class, 'learnSection']);
Route::get('learns/sectionchangestatus/{jclsection_id}/{status}', [LearnsController::class, 'sectionChangeStatus']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
