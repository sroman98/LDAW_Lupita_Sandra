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
    return view('index');
});

Route::post('/signup', [
  'uses' => 'UsuarioController@postSignup',
  'as' => 'signup'
]);

Route::post('/login', [
  'uses' => 'UsuarioController@postLogin',
  'as' => 'login'
]);

Route::get('/dashboard', [
  'uses' => 'UsuarioController@getDashboard',
  'as' => 'dashboard'
]);
