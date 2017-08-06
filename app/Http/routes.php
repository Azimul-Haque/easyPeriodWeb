<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::resource('dashboard', 'PeriodController');

Route::get('periodlist', ['as' => 'dashboard.periodlist', 'uses' => 'PeriodController@getPeriodList']);


// user routess
Route::get('settings/profile', ['as' => 'settings.profile', 'uses' => 'UserController@getProfile']);
Route::put('settings/profile/{id}', ['as' => 'settings.profile.update', 'uses' => 'UserController@updateProfile']);
