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
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix'=>'admin', 'middleware'=>'role:administrator'], function() {
	Route::group(['prefix'=>'users'], function() {
		Route::get('/{type}', 'UserController@adminShow')->name('adminUsers');
	});
	Route::group(['prefix'=>'categories'], function() {
		Route::post('/create', 'CategoryController@store');
		Route::get('/{id}/edit', 'CategoryController@edit');
		Route::post('/{id}/edit', 'CategoryController@update');
		Route::post('/{id}/trash', 'CategoryController@trash');
		Route::post('/{id}/delete', 'CategoryController@delete');
		Route::get('/{type}', 'CategoryController@adminIndex')->name('adminCategories');
	});
	Route::get('/', 'AdminController@index')->name('adminDashboard');
});

Route::group(['prefix'=>'u', 'middleware'=>['auth','role:advertiser']], function() {
	Route::get('/', 'UserController@dashboard')->name('userDashboard');
	Route::get('/profile', 'UserController@profile')->name('userProfile');
	Route::post('/profile', 'UserController@updateProfile');
	Route::get('/password', 'UserController@password')->name('userPassword');
	Route::post('/password', 'UserController@updatePassword');
	Route::group(['prefix'=>'my-business'], function() {
		Route::get('/', 'BusinessController@userBusiness')->name('userBusiness');
		Route::post('/', 'BusinessController@updateUserBusiness');
		Route::post('/activation/{type}', 'BusinessController@updateActivation');
	});

});

Route::group(['prefix'=>'classifieds'], function(){
	Route::group(['prefix'=>'categories'], function(){
		Route::get('/{slug}', 'CategoryController@show')->name('category');
		Route::get('/', 'CategoryController@index')->name('categories');
	});
	Route::post('/{businessid}/reviews', 'ReviewController@storeBusinessReview')->middleware('auth');
	Route::get('/{businessid}', 'BusinessController@show')->name('business');
	Route::get('/', 'BusinessController@index')->name('classifieds');
});

Route::get('/', 'WelcomeController@index')->name('homepage');
