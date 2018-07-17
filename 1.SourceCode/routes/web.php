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
    return view('welcome');
});

Route::get('/', 'Frontend\HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route auth (manager)
Route::group(['middleware' => 'auth', 'prefix' => 'manager', 'namespace'=>'Backend'], function () {
    Route::get('/', 'HomeController@index');
    //FILE
    Route::get('file', 'FileController@index')->name('indexFile');
    Route::get('file/{id}/edit', 'FileController@edit')->name('editFile');
    Route::put('file/update', 'FileController@update')->name('updateFile');
    Route::get('file/create', 'FileController@create')->name('createFile');
    Route::post('file/store', 'FileController@store')->name('storeFile');

    //USER
    Route::get('user', 'UserController@index')->name('indexUser');
    Route::post('user/update', 'UserController@update')->name('updateUser');
});


//Route auth (admin-level)
Route::group(['middleware' => 'Checklevel', 'prefix' => 'manager', 'namespace'=>'Backend'], function () {
    Route::get('user/show', 'UserController@show')->name('showUser');
});