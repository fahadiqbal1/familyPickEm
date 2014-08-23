<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'UserController@getLogin');

Route::controller('users', 'UserController');
Route::controller('app', 'AppController');

Route::group(array('prefix' => 'api'), function()
{
	Route::resource('teams', 'TeamController', array('only' => array('index', 'show', 'update')));
	Route::resource('matches', 'MatchController', array('only' => array('index', 'show')));
	Route::resource('weeks', 'WeekController', array('only' => array('index', 'show')));
	Route::resource('picks', 'PickController');
});