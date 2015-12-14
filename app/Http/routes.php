<?php
Route::bind('user',        function ($id)    { return App\User::whereId($id)->first(); });
Route::bind('student',     function ($id)    { return App\Student::whereStudentId($id)->first(); });
Route::bind('role',        function ($id)    { return App\Role::whereId($id)->first(); });
Route::bind('information', function ($id)    { return App\Information::whereId($id)->first(); });
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

// AUTH CONTROLLERS
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// USER
Route::resource('user', 'UserController');
post('update/{user_id}/role', ['as' => 'update_role', 'uses' => 'UserController@updateRoles']);

// INFORMATION
Route::resource('information', 'InformationController', ['only' => ['store', 'update', 'index']]);

// FIELD
Route::bind('field', function($id) { return App\Field::whereId($id)->first(); });
Route::resource('field', 'FieldController');

// SOA HISTORY
Route::group(['middleware' => 'auth'], function () {

    get('import/payment_history', ['as' => 'import_payment_history', 'uses' => 'InformationController@showImportPaymentHistory']);
    get('import/soa_history', ['as' => 'import_soa_history', 'uses' => 'InformationController@showImportSoaHistory']);

});

post('import_field/information', ['as' => 'importInformation', 'uses' => 'InformationController@importInformation']);