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

// Login routes
Route::get('login/token', array('as'=>'show.token.form', 'uses'=>'TokenController@showForm'));
Route::post('login/token', array('as'=>'token.form.submitted', 'uses'=>'TokenController@formSubmitted'));

// Settings routes
Route::get('locale/{value}', array('as'=>'switch.locale', 'uses'=>'LocaleController@changeLang'))
    ->where(['value'=>'[en|ru]{2}']);

Route::get('login/token/{md5}', array('as'=>'token.insert', 'uses'=>'LoginController@tokenInsert'))
    ->where(['md5'=>'[0-9a-z]{32}']);

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::get('test', 'TestController@index');
Route::get('session', 'TestController@clearSession');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
