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
Route::resource('/admin/tourisms', 'TourismController');
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


//Gallery
Route::resource('/admin/gallerys', 'GalleryController');
Route::get('/admin/gallerys/{id}/detail', 'GalleryController@detail');
Route::get('/admin/gallerys/{q}/search', 'GalleryController@search');
Route::get('/admin/gallerys/{id}/show', 'GalleryController@show');
Route::post('/admin/gallerys/store', 'GalleryController@store');
Route::post('/admin/gallerys/update', 'GalleryController@update');
Route::post('/admin/gallerys/destroy', 'GalleryController@destroy');
Route::get('/admin/gallerys/{id}/addimage', 'GalleryController@addimage');
Route::get('/admin/gallerys/{id}/updateimage', 'GalleryController@updateimage');
Route::post('/admin/gallerys/updateFromGallery', 'GalleryController@updateFromGallery');
Route::post('/admin/gallerys/removeImage', 'GalleryController@removeImage');
//Image
Route::resource('/admin/images', 'ImageController');
Route::get('/admin/images/{id}/detail', 'ImageController@detail');
Route::get('/admin/images/{q}/search', 'ImageController@search');
Route::get('/admin/images/{id}/show', 'ImageController@show');
Route::post('/admin/images/store', 'ImageController@store');
Route::post('/admin/images/update', 'ImageController@update');
Route::post('/admin/images/destroy', 'ImageController@destroy');

//Tourism
Route::resource('/admin/tourisms', 'TourismController');
Route::get('/admin/tourisms/{id}/detail', 'TourismController@detail');
Route::get('/admin/tourisms/{q}/search', 'TourismController@search');
Route::get('/admin/tourisms/{id}/show', 'TourismController@show');
Route::post('/admin/tourisms/store', 'TourismController@store');
Route::post('/admin/tourisms/update', 'TourismController@update');
Route::post('/admin/tourisms/destroy', 'TourismController@destroy');

//Route::post('/admin/gallerys/removeImage','GalleryController@removeImage', ['middleware' => 'restfulApi']);
// Route::resource('users', 'UserController');
// Route::resource('roles', 'RoleController');
// Route::resource('permissions', 'PermissionController');
// Route::resource('posts', 'PostController');
//'middleware' => 'auth'

