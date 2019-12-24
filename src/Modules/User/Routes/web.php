<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
});

Route::get('/', function () {
    return view('user::admin.welcome');
});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('password/email', 'Auth\AuthController@sendResetLinkEmail')
                                                ->name('password.email');
Route::get('password/reset', 'Auth\AuthController@showLinkRequestForm')
																					->name('password.request');
Route::post('password/reset', 'Auth\AuthController@reset')
																				->name('password.update');
Route::get('password/reset/{token}', 'Auth\AuthController@showResetForm')
																										->name('password.reset');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
																										->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');