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
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/user_profile', 'HomeController@index')->name('user_profile');

//Studens
Route::resource('students', 'StudentController');

// Techers
Route::resource('teachers', 'TeacherController');

// Advisor
Route::resource('advisors', 'AdvisorController');

//Document
Route::get('/files/create', 'DocumentController@create');
Route::post('/files', 'DocumentController@store');
Route::get('/files', 'DocumentController@index');
Route::get('files/{id}', 'DocumentController@show');
Route::get('files/download/{file}', 'DocumentController@download');

//Scheduler
Route::get('/schedule', 'ScheduleController@edit');
