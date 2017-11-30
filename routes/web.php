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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::prefix('admin')->group(function(){
	Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin-form');
	Route::post('login', 'Auth\AdminLoginController@login')->name('admin-login');
	Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin-logout');

	/** admin reset password routes **/

	Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
	Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showLinkRequestForm')->name('admin.password.reset');
});
