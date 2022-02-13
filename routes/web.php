<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyTypesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CompaniesController;

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
    Route::resource('company_types',CompanyTypesController::class);
    Route::resource('projects',ProjectsController::class);
    Route::resource('companies',CompaniesController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


