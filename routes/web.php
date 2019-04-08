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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('circulation')->group(function () {
	Route::get('/borrow', 'CirculationController@borrow')->name('borrow');
	Route::get('/return', 'HomeController@return')->name('return');
	Route::post('/search', 'CirculationController@search')->name('search');
});

Route::get('/checkin', 'CheckinController@index')->name('checkIn');
Route::post('/checkin', 'CheckinController@store')->name('checkin.store');

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|librarian|library_prefect')->group(function () {
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');

	Route::resource('/users', 'UserController');

	Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
	Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
	Route::resource('/posts', 'PostController');
	Route::resource('/books', 'BookController');
	Route::resource('/students', 'StudentController');
});

Route::get('/home', 'HomeController@index')->name('home');
