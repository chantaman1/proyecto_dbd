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

//RUTAS DE LA ASEGURADORA
Route::get('/aseguradora/show/{id}', 'aseguradoraController@show');

Route::get('/aseguradora/all/', 'aseguradoraController@index');

//RUTAS DEL ASIENTO
Route::get('/asiento/show/{id}', 'asientoController@show');

Route::get('/asiento/all/', 'asientoController@index');

//RUTAS DE LA AUDITORIA
Route::get('/auditoria/show/{id}', 'auditoriaController@show');

Route::get('/auditoria/all/', 'auditoriaController@index');+

//RUTAS DE LA COMPANIA ALQUILER
Route::get('/compania_alquiler/show/{id}', 'compania_alquilerController@show');

Route::get('/compania_alquiler/all/', 'compania_alquilerController@index');

//RUTAS DEL COMPROBANTE DE PAGO
Route::get('/comprobante_pago/show/{id}', 'comprobante_pagoController@show');

Route::get('/comprobante_pago/all/', 'comprobante_pagoController@index');

//RUTAS DE LA HABITACION
Route::get('/habitacion/show/{id}', 'habitacionController@show');

Route::get('/habitacion/all/', 'habitacionController@index');

//RUTAS DEL HOTEL
Route::get('/hotel/show/{id}', 'hotelController@show');

Route::get('/hotel/all/', 'hotelController@index');

//RUTAS DEL METODO PAGO
Route::get('/metodo_pago/show/{id}', 'metodo_pagoController@show');

Route::get('/metodo_pago/all/', 'metodo_pagoController@index');

//RUTAS DEL PAQUETE
Route::get('/paquete/show/{id}', 'paqueteController@show');

Route::get('/paquete/all/', 'paqueteController@index');

//RUTAS DEL PASAJERO
Route::get('/pasajero/show/{id}', 'pasajeroController@show');

Route::get('/pasajero/all/', 'pasajeroController@index');

//RUTAS DE LA RESERVA
Route::get('/reserva/show/{id}', 'reservaController@show');

Route::get('/reserva/all/', 'reservaController@index');

//RUTAS DE LA ROL
Route::get('/rol/show/{id}', 'rolController@show');

Route::get('/rol/all/', 'rolController@index');

//RUTAS DE LA SEGURO
Route::get('/seguro/show/{id}', 'seguroController@show');

Route::get('/seguro/all/', 'seguroController@index');

//RUTAS DE LA SERVICIO
Route::get('/servicio/show/{id}', 'servicioController@show');

Route::get('/servicio/all/', 'servicioController@index');

//RUTAS DEL VEHICULO
Route::get('/vehiculo/show/{id}', 'vehiculoController@show');

Route::get('/vehiculo/all/', 'vehiculoController@index');

//RUTAS DEL VEHICULO
Route::get('/vuelo/show/{id}', 'vueloController@show');

Route::get('/vuelo/all/', 'vueloController@index');
//-------------------------------------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
