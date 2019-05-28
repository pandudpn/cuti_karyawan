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

    // supplier
    Route::get('/supplier', 'Master\SupplierController@index');
    Route::match(['get', 'post'], '/supplier/create', 'Master\SupplierController@create');
    Route::match(['get', 'put'], '/supplier/edit/{id}', 'Master\SupplierController@edit');
    Route::delete('/supplier/delete/{id}', 'Master\SupplierController@delete');

    // kriteria
    Route::get('/kriteria', 'Master\KriteriaController@index');
    Route::match(['get', 'post'], '/kriteria/create', 'Master\KriteriaController@create');
    Route::match(['get', 'put'], '/kriteria/edit/{id}', 'Master\KriteriaController@edit');
    Route::delete('/kriteria/delete/{id}', 'Master\KriteriaController@delete');

    // periode
    Route::get('/periode', 'Master\PeriodeController@index');
    Route::match(['get', 'post'], '/periode/create', 'Master\PeriodeController@create');
    Route::match(['get', 'put'], '/periode/edit/{id}', 'Master\PeriodeController@edit');
    Route::delete('/periode/delete/{id}', 'Master\PeriodeController@delete');
});