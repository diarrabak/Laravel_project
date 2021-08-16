<?php

use Illuminate\Support\Facades\Route;
//Bringing controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobopeningController;
use App\Http\Controllers\AcademicgroupController;
use App\Http\Controllers\ResearchGroupController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\TestimonialController;

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

/*Route::get('/', function () {
   // return view('welcome');
   return view('auth.login');
    //return view('frontpages.homepage');
});*/

Route::get('/', [DepartmentController::class, 'homepage']);

/*Route::get('/', function () {

    if (!empty(session('email'))) {
        $user=User::where('email',session('email'))->get();
        session(['name' => $user->name]);
        session(['role' => $user->role]);
    }

    return view('frontpages.homepage');
});*/

Route::get('/student', function () {
    return view('frontpages.student');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
//Route::get('/users/{user}', [UserController::class, 'show']);
Route::resource('courses', CourseController::class);
Route::resource('specializations', SpecializationController::class);
Route::resource('laboratories', LaboratoryController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('jobopenings', JobopeningController::class);
Route::resource('academicgroups', AcademicgroupController::class);
Route::resource('researchgroups', ResearchgroupController::class);
Route::resource('informations', InformationController::class);
Route::resource('articles', ArticleController::class);
Route::resource('roles', RoleController::class);
Route::resource('equipments', EquipmentController::class);
Route::resource('testimonials', TestimonialController::class);
