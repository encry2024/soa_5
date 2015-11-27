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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::bind('user', function ($id) { return App\User::whereId($id)->first(); });
Route::bind('student', function ($id) { return App\Student::whereStudentId($id)->first(); });
Route::bind('role', function ($id) { return App\Role::whereId($id)->first(); });

Route::resource('user', 'UserController');
Route::resource('student', 'StudentController');