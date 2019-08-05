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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/show-job/{job}', 'HomeController@show')->name('show-job');

Route::get('/change-status/{status}/{job}', 'HomeController@changeStatus')->name('email-job-status');

Route::namespace('Auth')->group(function(){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    
    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

Route::middleware('auth')->group( function(){

    Route::middleware('HR')->prefix('hr')->group(function(){

        Route::get('/home', 'HRController@index')->name('hr.home');
    
        Route::get('/add-new-job', 'HRController@create')->name('hr.new-job');
        Route::post('/add-new-job/create', 'HRController@store')->name('hr.create-job');
        
        // Route::get('/edit-job/{job}', 'HRController@edit')->name('edit-job');
        // Route::post('/update-job/{job}', 'HRController@update')->name('update-job');
    
        Route::get('/show-job/{job}', 'HRController@show')->name('hr.show-job');
    
        Route::post('/delete-job/{job}', 'HRController@destroy')->name('hr.delete-job');
    });

    Route::middleware('Moderator')->prefix('moderator')->group(function(){

        Route::get('/home', 'ModeratorController@index')->name('moderator.home');

        Route::get('/jobs/{status}', 'ModeratorController@jobs')->name('moderator.jobs');
    
        Route::get('/show-job/{job}', 'ModeratorController@show')->name('moderator.show-job');
    
        Route::post('/approve-job/{job}', 'ModeratorController@approve')->name('moderator.approve-job');
        Route::post('/decline-job/{job}', 'ModeratorController@decline')->name('moderator.decline-job');

    });


    Route::get('change-password', 'Auth\ChangePasswordController@showForm')->name('change-pass');
    // Route::post('update-password', 'Auth\ChangePasswordController@update')->name('update-pass');

});

