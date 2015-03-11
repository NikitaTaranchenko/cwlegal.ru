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
Route::get('auth/token', 'AuthController@getToken');
Route::post('auth/token', 'AuthController@postToken');

Route::controllers([
    'lang' => 'Preferences\LanguageController'
]);

//Route::get('/', 'WelcomeController@index');
//Route::get('home', 'HomeController@index');
//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
