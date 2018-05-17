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

Route::get('/', 'PageController@home');
Route::get('/sign-up', 'PageController@signUp');
Route::get('/home', 'PageController@index')->middleware('auth');
Route::get('/sign-in', 'PageController@signIn')->name('login');

Route::post('/create-account', 'AccountController@createAccount');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('account/login', 'AccountController@login');
Route::get('/account/activate/{id}', 'AccountController@accountActivationByEmail');
Route::post('account/activate/resend', 'AccountController@resendActivationCode');
