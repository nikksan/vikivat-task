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


// Default 	Laravel Auth Routes
Auth::routes();

// Catalog routes
Route::get('/', 'GalleryController@index');

Route::get('/image', 'GalleryController@showUploadForm')->middleware('auth');
Route::post('/image', 'GalleryController@handleImageUpload')->middleware('auth');
Route::get('/image/mine', 'GalleryController@showUserUploads')->middleware('auth');

Route::get('/image/{image_id}', 'GalleryController@showImage')
	->where('image_id', '[0-9]+');

Route::delete('/image/{image_id}', 'GalleryController@deleteImage')
	->where('image_id', '[0-9]+')
	->middleware('auth', 'image.ownership');



// Admin routes
Route::get('admin', function(){
	return redirect('admin/dashboard');
});
Route::get('admin/dashboard', 'Admin\\DashboardController@index')->middleware('auth.admin');
Route::get('admin/login', 'Admin\\AuthController@showLoginForm');
Route::post('admin/login', 'Admin\\AuthController@login');
Route::get('admin/logout', 'Admin\\AuthController@logout')->middleware('auth.admin');

Route::resource('admin/images', 'Admin\\ImagesController')->middleware('auth.admin');

