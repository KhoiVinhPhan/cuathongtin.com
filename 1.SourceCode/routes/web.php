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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Route auth (user-level)
Route::group(['middleware' => 'auth', 'prefix' => 'manager', 'namespace'=>'Backend'], function () {
    Route::get('/', 'HomeController@index')->name('homeBackend');
    //FILE
    Route::get('file', 'FileController@index')->name('indexFile');
    Route::get('file/{id}/edit', 'FileController@edit')->name('editFile');
    Route::put('file/update', 'FileController@update')->name('updateFile');
    Route::get('file/create', 'FileController@create')->name('createFile');
    Route::post('file/store', 'FileController@store')->name('storeFile');

    //USER
    Route::get('user', 'UserController@index')->name('indexUser');
    Route::post('user/update', 'UserController@update')->name('updateUser');
    Route::post('user/change-permission','UserController@changePermission')->name('changePermission');
    Route::post('user/change-password','UserController@changePassword')->name('changePassword');
    Route::post('user/change-password-login','UserController@changePasswordLogin')->name('changePasswordLogin');

    //CATEGORY PRODUCT
    Route::get('category-product', 'CategoryProductController@index')->name('indexCategoryProduct');
    Route::post('select-category-product', 'CategoryProductController@selectCategoryproduct')->name('selectCategoryproduct');
    Route::post('category-product/store', 'CategoryProductController@store')->name('storeCategoryProduct');
    Route::post('sec-category-product/delete', 'CategoryProductController@deleteSecCategoryProduct')->name('deleteSecCategoryProduct');
    Route::post('category-product/delete', 'CategoryProductController@deleteCategoryProduct')->name('deleteCategoryProduct');
});


//Route auth (admin-level)
Route::group(['middleware' => 'Checklevel', 'prefix' => 'manager', 'namespace'=>'Backend'], function () {
    //USER
    Route::get('user/show', 'UserController@show')->name('showUser');
    Route::get('user/create', 'UserController@create')->name('createUser');
    Route::post('user/store', 'UserController@store')->name('storeUser');
    Route::get('user/{user_id}/delete', 'UserController@delete')->name('deleteUser');
    Route::get('user/trash', 'UserController@trash')->name('trashUser');
    Route::get('user/{user_id}/restore', 'UserController@restore')->name('restoreUser');
    Route::post('user/deleteChoice', 'UserController@deleteChoice')->name('deleteChoiceUser');
    Route::get('user/{user_id}/edit', 'UserController@edit')->name('editUser');
    Route::post('user/updateUserEdit', 'UserController@updateUserEdit')->name('updateUserEdit');
});


//Route front end
Route::group(['namespace'=>'Frontend'], function () {
    Route::get('/', 'HomeController@index');
});