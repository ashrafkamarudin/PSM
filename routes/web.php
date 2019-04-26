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

Route::prefix('circulation')->middleware('role:superadministrator|librarian|library_prefect')->group(function () {
	Route::get('/borrow', 'CirculationController@borrow')->name('circulation.borrow');
	Route::get('/return', 'CirculationController@return')->name('circulation.return');
	Route::post('/searchBorrow', 'CirculationController@searchForBorrow')->name('search.borrow');
	Route::post('/searchReturn', 'CirculationController@searchForReturn')->name('search.return');
	Route::get('/reset', 'CirculationController@circulationReset')->name('circulation.reset');
	Route::delete('/delete', 'CirculationController@delete')->name('circulation.delete');
	Route::resource('/circulation', 'CirculationController');
});

Route::get('/checkin', 'CheckinController@index')->name('checkIn');
Route::post('/checkin', 'CheckinController@store')->name('checkin.store');

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|librarian|library_prefect')->group(function () {
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::get('/report', 'CheckInReportController@index')->name('report.index');
	Route::get('/result', 'CheckInReportController@result')->name('report.result');

	Route::resource('/users', 'UserController');
	Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
	Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
	Route::resource('/posts', 'PostController');
	Route::resource('/books', 'BookController');
	Route::resource('/students', 'StudentController');

	Route::get('/circulation', 'CirculationController@index');
});

Route::get('/home', 'HomeController@index')->name('home');
