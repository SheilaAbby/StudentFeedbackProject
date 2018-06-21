<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//admin routes
//Route::resource('administration','AdminController')->middleware('is_admin');



//lectuer routes
//Route::group(['middleware'=>'is_admin'],function (){
    Route::resource('administration','AdminController');
    Route::get('administration/lecturers/add','AdminController@addLect')->name('admin.addLect');
    Route::get('administration/lecturers/delete-lecturer','AdminController@deleteLect')->name('admin.deleteLect');
    Route::get('/edit','LecturersController@index1');
    Route::get('/edit/update/{id}','LecturersController@edit');
    Route::get('/delete/{id}','LecturersController@destroy');
    Route::post('/updated/{id}','LecturersController@update');
//courses routes
    Route::get('/addCourse','CourseController@index');
    Route::post('/saveCourse','CourseController@store');

//Students Routes
    Route::get('/addStudent','StudentController@index');
    Route::post('/saveStudent','StudentController@store');
    Route::resource('lecturers','LecturersController');


//});

//Assess Lecture routes
Route::get('/assessLect/{id}','AssessController@index');
Route::post('/assess/{id}','AssessController@store');

