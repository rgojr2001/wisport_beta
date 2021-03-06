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
Route::get('/test/{wisport_racer_id}',  'WisportRacersController@getRaceResults');

Route::get('/',                 'PagesController@index');
Route::get('/home',             'PagesController@index');
Route::get('test_user',         'RacesController@results');
Route::get('/schedule',         'SeasonsController@schedule');
Route::get('/schedule/{id}',    'SeasonsController@schedule');
Route::get('/results/{id}',     'RacesController@show');
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

Route::controller('datatables', 'DatatablesController', [
    'anyData'       => 'datatables.data',
    'getIndex'      => 'datatables',
]);

Route::controller('seasons', 'SeasonsController', [
    'anyData'       => 'seasons.data',
    'getIndex'         => 'seasons',
]);

Route::get('/standings/overall',            'SeasonsController@getOverallStandings');
Route::post('/standings/overall/data',      'SeasonsController@anyOverallStandingsData');
Route::get('/standings/ageGroup',            'SeasonsController@getAgeGroupStandings');
Route::post('/standings/ageGroup/data',      'SeasonsController@anyAgeGroupStandingsData');
Route::get('/standings/index',              'SeasonsController@leaderboard');
/*

*/