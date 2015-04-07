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

Route::get('/', 'WelcomeController@index');

Route::get('contact',
    ['as' => 'contact', 'uses' => 'Contact@create']);
Route::post('contact',
    ['as' => 'contact_store', 'uses' => 'Contact@store']);

Route::get('blog',
    ['as' => 'blog', 'uses' => 'Blog@index']);

Route::get('admin/blog',
    ['as' => 'blogadmin', 'uses' => 'BlogAdmin@create']);
Route::post('admin/blog',
    ['as' => 'blogadmin_store', 'uses' => 'BlogAdmin@store']);

/*Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
