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
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:administrator'])->group(function() {
	Route::get('/', 'Admin\AdminController@dashboard')->name('dashboard');
});

Route::namespace('Spa')->prefix('spa')->group(function() {

    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::post('register', 'Auth\RegisterController@register');

    Route::prefix('businesses')->group(function(){
        Route::get('/', 'BusinessController@index');
        Route::get('/{businessid}', 'BusinessController@show');
    });

	Route::prefix('user')->group(function() {
		Route::prefix('bookmarks')->middleware(['auth', 'role:advertiser'])->group(function() {
			Route::get('/check/{business_id}', 'UserController@getBookmarkStatus');
			Route::post('/{business_id}', 'UserController@bookmark');
			Route::post('/', 'UserController@bookmarks');
		});

		Route::get('/', 'UserController@getLoggedInUser');
	});
});

Route::get('/{any}', 'WelcomeController@welcome')->where('any', '.*');
