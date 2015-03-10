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
Route::get('token', array('as'=>'token.form.Show', 'uses'=>'TokenController@formShow'));
Route::post('token', array('as'=>'token.form.Submitted', 'uses'=>'TokenController@formSubmitted'));
//Route::get('login/token/{md5}', array('as'=>'token.insert', 'uses'=>'TokenController@tokenInsert'))
//    ->where(['md5'=>'[0-9a-z]{32}']);
Route::get('token/insert', array('as'=>'token.insert', 'uses'=>'TokenController@tokenInsert'));

// Settings routes
Route::get('locale/{value}', array('as'=>'switch.locale', 'uses'=>'LocaleController@changeLang'))
    ->where(['value'=>'[en|ru]{2}']);



Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::get('test', 'TestController@index');
Route::get('session', 'TestController@clearSession');
Route::get('mail', 'TestController@sendMail');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
