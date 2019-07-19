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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password', 'Auth\PasswordController@showPasswordForm')->name('password');
Route::post('password', 'Auth\PasswordController@Password');

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/applicant/create', 'ApplicantController@form')->name('applicant_create');
Route::post('/applicant/create', 'ApplicantController@create');
Route::get('/applicant/list', 'ApplicantController@list')->name('applicant_list');
Route::get('/applicant/edit/{id}', 'ApplicantController@show')->name('applicant_edit');
Route::post('/applicant/edit/{id}', 'ApplicantController@edit');
Route::get('/applicant/delete/{id}', 'ApplicantController@delete')->name('applicant_delete');

Route::get('/university/create', 'UniversityController@form')->name('university_create');
Route::post('/university/create', 'UniversityController@create');
Route::get('/university/edit/{id}', 'UniversityController@show')->name('university_edit');
Route::post('/university/edit/{id}', 'UniversityController@edit');
Route::get('/university/delete/{id}', 'UniversityController@delete')->name('university_delete');

Route::get('/major/create', 'MajorController@form')->name('major_create');
Route::post('/major/create', 'MajorController@create');
Route::get('/major/edit/{id}', 'MajorController@show')->name('major_edit');
Route::post('/major/edit/{id}', 'MajorController@edit');
Route::get('/major/delete/{id}', 'MajorController@delete')->name('major_delete');

Route::get('/dorm/create', 'MajorController@form')->name('dorm_create');
Route::post('/dorm/create', 'MajorController@create');
Route::get('/dorm/edit/{id}', 'MajorController@show')->name('dorm_edit');
Route::post('/dorm/edit/{id}', 'MajorController@edit');
Route::get('/dorm/delete/{id}', 'MajorController@delete')->name('dorm_delete');

Route::get('/pdf/{id}', 'ExtraController@pdf')->name('pdf');
Route::get('/cafe', 'ExtraController@cafe')->name('cafe');
Route::get('/test', 'ExtraController@test');

