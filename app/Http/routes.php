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
Route::get('/', function(){
    return redirect('cover');
});

Route::get('cover', function(){
    return view('cover');
});


Route::get('auth/{hash?}', ['as'=>'auth.get', 'uses'=>'AuthController@index'])->where('hash', '[0-9a-z]{32}');
Route::post('auth', ['as'=>'auth.post', 'uses'=>'AuthController@post']);



//Route::controllers([
//    'lang' => 'Preferences\LanguageController'
//]);

//Route::get('/', 'WelcomeController@index');
//Route::get('home', 'HomeController@index');
//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
