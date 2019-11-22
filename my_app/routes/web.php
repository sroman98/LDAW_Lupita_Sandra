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
})->name('home');

Route::post('/signup', [
  'uses' => 'SignupController@postSignup',
  'as' => 'signup'
]);

Route::get('/signup', [
  'uses' => 'SignupController@getSignup',
  'as' => 'signup'
]);

Route::post('/login', [
  'uses' => 'UsuarioController@postLogin',
  'as' => 'login'
]);

Route::get('/dashboard', [
  'uses' => 'DashboardController@getDashboard',
  'as' => 'dashboard',
  'middleware' => 'auth'
]);

Route::get('/crearEvento', [
  'uses' => 'CrearEventoController@getCrearEvento',
  'as' => 'crearEvento',
  'middleware' => 'auth'
]);

Route::post('/crearEvento', [
  'uses' => 'CrearEventoController@postEvento',
  'as' => 'crearEvento',
  'middleware' => 'auth'
]);

Route::post('/registrarme', [
  'uses' => 'RegistroEventoController@postRegistro',
  'as' => 'registrarme',
  'middleware' => 'auth'
]);
