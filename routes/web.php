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
});

Route::group(['prefix'=>'u', 'middleware'=>'role:advertiser'], function() {

});

Route::group(['prefix'=>'classifieds'], function(){
	Route::group(['prefix'=>'categories'], function(){
		Route::get('/{slug}', 'CategoryController@show')->name('category');
		Route::get('/', 'CategoryController@index')->name('categories');
	});
	Route::post('/{businessid}/reviews', 'ReviewController@storeBusinessReview');
	Route::get('/{businessid}', 'BusinessController@show')->name('business');
	Route::get('/', 'BusinessController@index')->name('classifieds');
});

Route::get('/', 'WelcomeController@index')->name('homepage');
