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

Route::get('activate/{token}', 'Auth\RegisterController@activate')
    ->name('activate');
Route::get('/home', 'HomeController@index')->name('home');

//RUTAS DEL USUARIO
Route::get('/usuario/show/{id}', 'usuarioController@show');

Route::get('/usuario/all/', 'usuarioController@index');

//RUTAS DE LA AEROLINEA
Route::get('/aerolinea/show/{id}', 'aerolineaController@show');

Route::get('/aerolinea/all/', 'aerolineaController@index');

//RUTAS DE LA AEROPUERTO
Route::get('/aeropuerto/show/{id}', 'aeropuertoController@show');

Route::get('/aeropuerto/all/', 'aeropuertoController@index');


//-------------------------------------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
