<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', 'AuthController@login');
Route::get('/admin', 'AdminsController@index');
Route::get('/admin/{id}', 'AdminsController@show');
Route::post('/register', 'AuthController@register');
Route::post('/admin', 'AdminsController@store');

//student get routes
Route::get('/student', 'StudentsController@index');
Route::get('/student/{id}', 'StudentsController@show');

//attendance get routes
Route::get('/attendance', 'AttendanceController@index');
Route::get('/attendance/{id}', 'AttendanceController@show');

Route::group(['middleware' => ['jwt.verify']], function() {
    // Route::resource('admin', 'AdminsController');
    Route::put('/admin/{id}', 'AdminsController@update');
    Route::delete('/admin/{id}', 'AdminsController@destroy');
    Route::post('/logout','AuthController@logout');

    //students routes
    Route::post('/student', 'StudentsController@store');
    Route::put('/student/{id}', 'StudentsController@update');
    Route::delete('/student/{id}', 'StudentsController@destroy');

    //Attendance routes
    Route::post('/attendance', 'AttendanceController@store');
    Route::put('/attendance/{id}', 'AttendanceController@update');
    Route::delete('/attendance/{id}', 'AttendanceController@destroy');
    Route::post('/classes', 'ClassesController@store');
    Route::put('/classes/{id}', 'ClassesController@update');
    Route::delete('/classes/{id}', 'ClassesController@destroy');
    Route::post('/section', 'SectionController@store');
    Route::put('/section/{id}', 'SectionController@update');
    Route::delete('/section/{id}', 'SectionController@destroy');
    });
Route::post('/register', 'AuthController@register');
Route::post('/admin', 'AdminsController@store');

