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




Route::group(['prefix'=>'json'], function() {
	Route::group(['prefix'=>'u'], function() {
		Route::get('/is-logged-in', function() {
			$user = \Auth::check() ? \Auth::user() : null;
			return response()->json(compact('user'));
		});
	});
	Auth::routes();
	//Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function() {
		Route::group(['prefix' => 'categories'], function() {
			Route::get('/', 'CategoryController@adminCategories');
			Route::get('/{id}', 'CategoryController@adminCategory');
			Route::post('/{id}', 'CategoryController@update');
			Route::post('/create', 'CategoryController@create');
		});
	});

	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
	Route::post('/list-your-business', 'UserBusinessController@store');

	Route::group(['prefix'=>'classifieds'], function(){
		Route::group(['prefix'=>'categories'], function(){
			Route::get('/{slug}', 'CategoryController@show')->name('category');
			Route::get('/', 'CategoryController@index')->name('categories');
		});
		Route::post('/{businessid}/reviews', 'ReviewController@storeBusinessReview')->middleware('auth');
		Route::get('/{businessid}', 'BusinessController@show')->name('business');
		Route::get('/', 'BusinessController@index')->name('classifieds');
	});
});
Route::get('/{all}', 'WelcomeController@index')->where(['all'=>'.*'])->name('index');