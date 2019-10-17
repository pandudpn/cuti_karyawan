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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@doLogin');
Route::get('/login/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'usersession'], function(){
    Route::get('/', 'HomeController@index');

    // staff
    Route::prefix('/staff')->group(function(){
        Route::get('/', 'Master\StaffController@index');
        Route::match(['get', 'post'], '/new', 'Master\StaffController@create');
        Route::match(['get', 'put'], '/edit/{id}', 'Master\StaffController@edit');
        Route::delete('/delete/{id}', 'Master\StaffController@delete');
    });

    // role
    Route::prefix('/role')->group(function(){
        Route::get('/', 'Master\RoleController@index');
        Route::match(['get', 'post'], '/new', 'Master\RoleController@create');
        Route::match(['get', 'put'], '/edit/{id}', 'Master\RoleController@edit');
        Route::delete('/delete/{id}', 'Master\RoleController@delete');
    });

    // cuti
    Route::prefix('/cuti')->group(function(){
        Route::get('/', 'Master\CutiController@index');
        Route::match(['get', 'post'], '/new', 'Master\CutiController@create');
        Route::match(['get', 'put'], '/edit/{id}', 'Master\CutiController@edit');
        Route::delete('/delete/{id}', 'Master\CutiController@delete');
        Route::get('/reject/{id}', 'Master\CutiController@reject');
    });

    // submission
    Route::prefix('/submission')->group(function(){
        Route::get('/', 'Master\SubmissionController@index');
        Route::match(['get', 'post'], '/new', 'Master\SubmissionController@create');
    });
});