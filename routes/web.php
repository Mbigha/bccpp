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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('home', function () {
    return redirect('dashboard');
});

Route::get('enrollment/choose-action', 'EnrollmentControllerTwo@choose_action');
Route::get('enrollment/start-new', 'EnrollmentControllerTwo@start_new');
Route::post('enrollment/continue', 'EnrollmentControllerTwo@continue');
Route::match(['get', 'post'], 'enrollment/page-one', 'EnrollmentController@page_one');
Route::match(['get', 'post'], 'enrollment/page-two', 'EnrollmentController@page_two');
Route::match(['get', 'post'], 'enrollment/page-three', 'EnrollmentController@page_three');
Route::match(['get', 'post'], 'enrollment/page-four', 'EnrollmentControllerTwo@page_four');

Route::get('analysis/form', 'AnalysisController@form');
Route::get('clients/view/{id}', 'AnalysisController@view');
// Route::post('analysis/search', 'AnalysisController@search');
Route::match(['get', 'post'], 'analysis/search', 'AnalysisController@search');
