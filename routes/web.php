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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('password', 'Auth\PasswordController@showPasswordForm')->name('password');
    Route::post('password', 'Auth\PasswordController@Password');

    Route::get('/applicant/create', 'ApplicantController@form')->name('applicant_create');
    Route::post('/applicant/create', 'ApplicantController@create');
    Route::get('/applicant/list', 'ApplicantController@list')->name('applicant_list');
    Route::get('/applicant/edit/{id}', 'ApplicantController@show')->name('applicant_edit');
    Route::post('/applicant/edit/{id}', 'ApplicantController@edit');
    Route::get('/applicant/delete/{id}', 'ApplicantController@delete')->name('applicant_delete');

    Route::get('/university/list', 'UniversityController@list')->name('university_list');
    Route::post('/university/create', 'UniversityController@create')->name('university_create');
    Route::post('/university/edit/{id}', 'UniversityController@edit')->name('university_edit');
    Route::get('/university/delete/{id}', 'UniversityController@delete')->name('university_delete');

    Route::get('/major/list', 'MajorController@list')->name('major_list');
    Route::post('/major/create', 'MajorController@create')->name('major_create');
    Route::post('/major/edit/{id}', 'MajorController@edit')->name('major_edit');
    Route::get('/major/delete/{id}', 'MajorController@delete')->name('major_delete');

    Route::get('/dorm/list', 'DormController@list')->name('dorm_list');
    Route::post('/dorm/create', 'DormController@create')->name('dorm_create');
    Route::post('/dorm/edit/{id}', 'DormController@edit')->name('dorm_edit');
    Route::get('/dorm/delete/{id}', 'DormController@delete')->name('dorm_delete');

    Route::get('/pdf/{id}', 'ExtraController@pdf')->name('pdf');
    Route::prefix('report')->group(function () {
        Route::get('/cafe', 'ReportController@cafe')->name('cafe');
        Route::get('/type', 'ReportController@type')->name('state_report');
        Route::get('/major', 'ReportController@major')->name('major_report');
        Route::get('/university', 'ReportController@university')->name('university_report');
    });
    Route::get('/test', 'ExtraController@test');
});