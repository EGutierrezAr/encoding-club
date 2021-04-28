<?php

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
    return view('welcome1');
});



Auth::routes();

Route::post('/appointments', 'AppointmentController@store');

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/user_profile', 'HomeController@index')->name('user_profile');

//Studens
Route::resource('students', 'StudentController');

Route::get('student/find', 'StudentController@find')->name('student/find');
Route::get('students/{id}/editSchedule', 'StudentController@editSchedule');
Route::post('students/{id}/schedule', 'StudentController@storeSchedule');
//Route::post('students/{id}/schedule', 'StudentController@storeSchedule');
Route::get('students/{id}/appointment', 'StudentController@appointment');
Route::get('students/{id}/{teacherid}/{date}/{time}/assingTeacher', 'StudentController@assingTeacher');
//Route::get('students/search', 'StudentController@search')->name('students/search');


Route::get('edit', 'StudentController@edit');


// Dashboard
Route::resource('dashboard', 'DashboardController');

// Techers
Route::get('teachers/find', 'TeacherController@find')->name('teachers/find');
Route::resource('teachers', 'TeacherController');


// Advisor
Route::resource('advisors', 'AdvisorController');

//Document
Route::get('/files/create', 'DocumentController@create');
Route::post('/files', 'DocumentController@store');
Route::get('/files', 'DocumentController@index');
Route::get('/files/{idLevel}/indexLevel', 'DocumentController@indexLevel');
Route::get('files/{id}', 'DocumentController@show');
Route::get('files/download/{file}', 'DocumentController@download');

//Scheduler
Route::get('/schedule', 'ScheduleController@edit');
Route::post('/schedule', 'ScheduleController@store');

// Class
Route::resource('class', 'ClassController');
Route::post('class', 'ClassController@store');

// Task
Route::resource('task', 'TaskController');
Route::get('task/viewTask/{file}', 'TaskController@viewTask');

