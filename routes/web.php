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

Route::get('/usuario/destroy/{id}', 'usuarioController@destroy');

//RUTAS DE LA AEROLINEA
Route::get('/aerolinea/show/{id}', 'aerolineaController@show');

Route::get('/aerolinea/all/', 'aerolineaController@index');

Route::get('/aerolinea/destroy/{id}', 'aerolineaController@destroy');

//RUTAS DE LA AEROPUERTO
Route::get('/aeropuerto/show/{id}', 'aeropuertoController@show');

Route::get('/aeropuerto/all/', 'aeropuertoController@index');

Route::get('/aeropuerto/destroy/{id}', 'aeropuertoController@destroy');

//RUTAS DE LA ASEGURADORA
Route::get('/aseguradora/show/{id}', 'aseguradoraController@show');

Route::get('/aseguradora/all/', 'aseguradoraController@index');

Route::get('/aseguradora/destroy/{id}', 'aseguradoraController@destroy');
//RUTAS DEL ASIENTO
Route::get('/asiento/show/{id}', 'asientoController@show');

Route::get('/asiento/all/', 'asientoController@index');

Route::get('/asiento/destroy/{id}', 'asientoController@destroy');

//RUTAS DE LA AUDITORIA
Route::get('/auditoria/show/{id}', 'auditoriaController@show');

Route::get('/auditoria/all/', 'auditoriaController@index');

Route::get('/auditoria/destroy/{id}', 'auditoriaController@destroy');

//RUTAS DE LA COMPANIA ALQUILER
Route::get('/compania_alquiler/show/{id}', 'compania_alquilerController@show');

Route::get('/compania_alquiler/all/', 'compania_alquilerController@index');

Route::get('/compania_alquiler/destroy/{id}', 'compania_alquilerController@destroy');

//RUTAS DEL COMPROBANTE DE PAGO
Route::get('/comprobante_pago/show/{id}', 'comprobante_pagoController@show');

Route::get('/comprobante_pago/all/', 'comprobante_pagoController@index');

Route::get('/comprobante_pago/destroy/{id}', 'comprobante_pagoController@destroy');

//RUTAS DE LA HABITACION
Route::get('/habitacion/show/{id}', 'habitacionController@show');

Route::get('/habitacion/all/', 'habitacionController@index');

Route::get('/habitacion/destroy/{id}', 'habitacionController@destroy');

//RUTAS DEL HOTEL
Route::get('/hotel/show/{id}', 'hotelController@show');

Route::get('/hotel/all/', 'hotelController@index');

Route::get('/hotel/destroy/{id}', 'hotelController@destroy');

//RUTAS DEL METODO PAGO
Route::get('/metodo_pago/show/{id}', 'metodo_pagoController@show');

Route::get('/metodo_pago/all/', 'metodo_pagoController@index');

Route::get('/metodo_pago/destroy/{id}', 'metodo_pagoController@destroy');

//RUTAS DEL PAQUETE
Route::get('/paquete/show/{id}', 'paqueteController@show');

Route::get('/paquete/all/', 'paqueteController@index');

Route::get('/paquete/destroy/{id}', 'paqueteController@destroy');

//RUTAS DEL PASAJERO
Route::get('/pasajero/show/{id}', 'pasajeroController@show');

Route::get('/pasajero/all/', 'pasajeroController@index');

Route::get('/pasajero/destroy/{id}', 'pasajeroController@destroy');

//RUTAS DE LA RESERVA
Route::get('/reserva/show/{id}', 'reservaController@show');

Route::get('/reserva/all/', 'reservaController@index');

Route::get('/reserva/destroy/{id}', 'reservaController@destroy');

//RUTAS DE LA ROL
Route::get('/rol/show/{id}', 'rolController@show');

Route::get('/rol/all/', 'rolController@index');

Route::get('/rol/destroy/{id}', 'rolController@destroy');

//RUTAS DE LA SEGURO
Route::get('/seguro/show/{id}', 'seguroController@show');

Route::get('/seguro/all/', 'seguroController@index');

Route::get('/seguro/destroy/{id}', 'seguroController@destroy');

//RUTAS DE LA SERVICIO
Route::get('/servicio/show/{id}', 'servicioController@show');

Route::get('/servicio/all/', 'servicioController@index');

Route::get('/servicio/destroy/{id}', 'servicioController@destroy');

//RUTAS DEL VEHICULO
Route::get('/vehiculo/show/{id}', 'vehiculoController@show');

Route::get('/vehiculo/all/', 'vehiculoController@index');

Route::get('/pico/destroy/{id}', 'picoController@destroy');

//RUTAS DEL VEHICULO
Route::get('/vuelo/show/{id}', 'vueloController@show');

Route::get('/vuelo/all/', 'vueloController@index');
//-------------------------------------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
