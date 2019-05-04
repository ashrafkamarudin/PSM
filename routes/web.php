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
	Route::get('/borrow-receipt', 'CirculationController@borrowReceipt')->name('circulation.borrowReceipt');
	Route::get('/return-receipt', 'CirculationController@returnReceipt')->name('circulation.returnReceipt');
	Route::delete('/delete', 'CirculationController@delete')->name('circulation.delete');
	Route::resource('/circulation', 'CirculationController');
});

Route::get('/checkin', 'CheckinController@index')->name('checkIn');
Route::post('/checkin', 'CheckinController@store')->name('checkin.store');

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|librarian|library_prefect')->group(function () {
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::get('/report', 'CheckInReportController@index')->name('report.result');
	Route::get('/result', 'CheckInReportController@result')->name('report.index');

	Route::resources([
		'users' => 'UserController',
		'permissions' => 'PermissionController',
		'posts' => 'PostController',
		'books' => 'BookController',
		'students' => 'StudentController',
		'permissions' => 'PermissionController'
	]);

	Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
	Route::resource('/circulation-history', 'CirculationHistoryController', ['only' => 'index', 'show']);

	Route::post('/circulation-history', 'CirculationHistoryController@filter')->name('circulation-history.filter');

	Route::get('/circulation', 'CirculationController@index');
});

Route::get('/home', 'HomeController@index')->name('home');
