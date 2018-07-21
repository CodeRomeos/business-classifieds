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

Route::get('/{any}', 'WelcomeController@welcome')->where('any', '.*');


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:administrator'])->group(function() {
	Route::get('/', 'Admin\AdminController@dashboard')->name('dashboard');
});
