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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');
///Province
Route::resource('/admin/provinces', 'ProvinceController');
Route::get('/admin/provinces/{id}/detail', 'ProvinceController@detail');
Route::get('/admin/provinces/{q}/search', 'ProvinceController@search');
Route::get('/admin/provinces/{id}/show', 'ProvinceController@show');
Route::post('/admin/provinces/store', 'ProvinceController@store');
Route::post('/admin/provinces/update', 'ProvinceController@update');
Route::post('/admin/provinces/destroy', 'ProvinceController@destroy');
//Users
Route::resource('/admin/users', 'UserController');
Route::get('/admin/users/{id}/detail', 'UserController@detail');
Route::get('/admin/users/{q}/search', 'UserController@search');
Route::get('/admin/users/{id}/show', 'UserController@show');
Route::post('/admin/users/store', 'UserController@store');
Route::post('/admin/users/update', 'UserController@update');
Route::post('/admin/users/destroy', 'UserController@destroy');

//Tourism;
Route::resource('/admin/tourisms', 'TourismController');
Route::get('/admin/tourisms/{id}/detail', 'UserController@detail');
Route::get('/admin/tourisms/{q}/search', 'UserController@search');
Route::get('/admin/tourisms/{id}/show', 'UserController@show');
Route::post('/admin/tourisms/store', 'UserController@store');
Route::post('/admin/tourisms/update', 'UserController@update');
Route::post('/admin/tourisms/destroy', 'UserController@destroy');


// Route::resource('users', 'UserController');
// Route::resource('roles', 'RoleController');
// Route::resource('permissions', 'PermissionController');
// Route::resource('posts', 'PostController');
//'middleware' => 'auth'
