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

#Route::get('/',                 function () {return view('standard/index');});
#Route::get('/schedule',         function () {return view('standard/schedule');});
Route::get('/race_page',        function () {return view('standard/race_page');});

Route::get('/',                 'PagesController@index');
Route::get('test_user',         'RacesController@results');
Route::get('/schedule',         'SeasonsController@schedule');
Route::get('/schedule/{id}',    'SeasonController@schedule');
Route::get('/results/{id}',     'RaceController@show');
Route::get('/results',          'RaceController@index');

Route::get('/home', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
#Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
