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

Route::get('/race_page',        function () {return view('standard/race_page');});
Route::get('/email/thank_you',  function () {return view('/email/thank_you');});

Route::get('/',                 'PagesController@index');
Route::get('test_user',         'RacesController@results');
Route::get('/schedule',         'SeasonsController@schedule');
Route::get('/schedule/{id}',    'SeasonsController@schedule');
Route::get('/results/{id}',     'RacesController@show');
Route::get('/results',          'RacesController@index');
Route::post('email/register',   'EmailListController@register');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
#Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/renewal/{wisport_id}', 'WisportRacersController@show');
Route::post('auth/renewal/update/{id}', 'Auth\RenewalsController@update');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('auth/renewal/{wisport_id}', 'WisportRacersController@show');
    Route::post('auth/renewal/update', 'WisportRacersController@renew');
    Route::get('auth/payment',        function () {return view('auth/payment');});
});