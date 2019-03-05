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
    return redirect('vuelos');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/test1', function () {
    return view('test1');
});


Route::get('/vuelos', 'vueloController@index');

Route::get('/autos','vehiculoController@start');

Route::get('/seguros',function(){
  return view('seguros');
});

Route::get('/seleccionarSeguro',function(){
  return view('seleccionarSeguro');
});

Route::get('/hoteles',function(){
  return view('hotel');
});

Route::get('/home', function () {
    return view('vuelos');
});

Route::get('/paquetes', function () {
    return view('paquetes');
});

Route::get('/send-mail', function () {
    return redirect('vuelos');
});


//RUTAS DEL USUARIO
Route::get('/usuario/show/{id}', 'usuarioController@show');

Route::get('/usuario/all/', 'usuarioController@index');

Route::get('/usuario/email/{email}', 'usuarioController@getUserByEmail');

Route::post('/usuario/register', 'usuarioController@store');

Route::post('/usuario/update/{id}', 'usuarioController@update');

Route::post('/usuario/updateByEmail/{email}', 'usuarioController@updatePasswordByEmail');

Route::post('/usuario/destroy/{id}', 'usuarioController@destroy');

//RUTAS DE LA AEROLINEA
Route::get('/aerolinea/show/{id}', 'aerolineaController@show');

Route::get('/aerolinea/all/', 'aerolineaController@index');

Route::post('/aerolinea/register', 'aerolineaController@store');

Route::post('/aerolinea/update/{id}', 'aerolineaController@update');

Route::get('/aerolinea/destroy/{id}', 'aerolineaController@destroy');

//Route::get('/aerolinea/create/{id}', 'aerolineaController@destroy');

//RUTAS DE LA AEROPUERTO
Route::get('/aeropuerto/show/{id}', 'aeropuertoController@show');

Route::get('/aeropuerto/all/', 'aeropuertoController@index');

Route::post('/aeropuerto/register', 'aeropuertoController@store');

Route::post('/aeropuerto/update/{id}', 'aeropuertoController@update');

Route::get('/aeropuerto/destroy/{id}', 'aeropuertoController@destroy');

//RUTAS DE LA ASEGURADORA
Route::get('/aseguradora/show/{id}', 'aseguradoraController@show');

Route::get('/aseguradora/all/', 'aseguradoraController@index');

Route::post('/aseguradora/register', 'aseguradoraController@store');

Route::post('/aseguradora/update/{id}', 'aseguradoraController@update');

Route::get('/aseguradora/destroy/{id}', 'aseguradoraController@destroy');

//RUTAS DEL ASIENTO
Route::get('/asiento/show/{id}', 'asientoController@show');

Route::get('/asiento/all/', 'asientoController@index');

Route::get('/asiento/getSeats/{id}', 'asientoController@getSeatsByFlightId');

Route::post('/asiento/useSeat/{id}', 'asientoController@updateSeat');

Route::post('/asiento/register', 'asientoController@store');

Route::post('/asiento/update/{id}', 'asientoController@update');

Route::get('/asiento/destroy/{id}', 'asientoController@destroy');

//RUTAS DE LA AUDITORIA
Route::get('/auditoria/show/{id}', 'auditoriaController@show');

Route::get('/auditoria/all/', 'auditoriaController@index');

Route::post('/auditoria/register', 'auditoriaController@store');

Route::post('/auditoria/update/{id}', 'auditoriaController@update');

Route::get('/auditoria/destroy/{id}', 'auditoriaController@destroy');

//RUTAS DE LA COMPANIA ALQUILER
Route::get('/compania_alquiler/show/{id}', 'compania_alquilerController@show');

Route::get('/compania_alquiler/all/', 'compania_alquilerController@index');

Route::post('/compania_alquiler/register', 'compania_alquilerController@store');

Route::post('/compania_alquiler/update/{id}', 'compania_alquilerController@update');

Route::get('/compania_alquiler/destroy/{id}', 'compania_alquilerController@destroy');

//RUTAS DEL COMPROBANTE DE PAGO
Route::get('/comprobante_pago/show/{id}', 'comprobante_pagoController@show');

Route::get('/comprobante_pago/all/', 'comprobante_pagoController@index');

Route::post('/comprobante_pago/register', 'comprobante_pagoController@store');

Route::post('/comprobante_pago/update/{id}', 'comprobante_pago@update');

Route::get('/comprobante_pago/destroy/{id}', 'comprobante_pagoController@destroy');

//RUTAS DE LA HABITACION
Route::get('/habitacion/show/{id}', 'habitacionController@show');

Route::get('/habitacion/all/', 'habitacionController@index');

Route::post('/habitacion/register', 'habitacionController@store');

Route::post('/habitacion/update/{id}', 'habitacionController@update');

Route::get('/habitacion/destroy/{id}', 'habitacionController@destroy');

//RUTAS DEL HOTEL
Route::get('/hotel/show/{id}', 'hotelController@show');

Route::get('/hotel/all/', 'hotelController@index');

Route::post('/hotel/register', 'hotelController@store');

Route::post('/hotel/update/{id}', 'hotelController@update');

Route::get('/hotel/destroy/{id}', 'hotelController@destroy');

Route::get('/getHotels','hotelController@filter');

Route::get('mostrar_habitaciones','hotelController@getAllRooms');

Route::get('reservar_habitacion', 'habitacionController@iniciarReserva');

Route::post('comprar_habitacion', 'habitacionController@terminarReserva');

//RUTAS DEL METODO PAGO
Route::get('/metodo_pago/show/{id}', 'metodo_pagoController@show');

Route::get('/metodo_pago/all/', 'metodo_pagoController@index');

Route::post('/metodo_pago/register', 'metodo_pago@store');

Route::post('/metodo_pago/update/{id}', 'metodo_pago@update');

Route::get('/metodo_pago/destroy/{id}', 'metodo_pagoController@destroy');

//RUTAS DEL PAQUETE
Route::get('/paquete/show/{id}', 'paqueteController@show');

Route::get('/paquete/all/', 'paqueteController@index');

Route::post('/paquete/register', 'paqueteController@store');

Route::post('/paquete/update/{id}', 'paqueteController@update');

Route::get('/paquete/destroy/{id}', 'paqueteController@destroy');

Route::get('/paquetes', 'PaqueteController@start');

Route::get('/comprar_paquete','PaqueteController@comprar_paquete');

Route::get('/finalizarPaquete', 'PaqueteController@finalizarCompra')->middleware('auth');

//RUTAS DEL PASAJERO
Route::get('/pasajero/show/{id}', 'pasajeroController@show');

Route::get('/pasajero/all/', 'pasajeroController@index');

Route::post('/pasajero/register', 'pasajeroController@store');

Route::post('/pasajero/update/{id}', 'pasajeroController@update');

Route::get('/pasajero/destroy/{id}', 'pasajeroController@destroy');

//RUTAS DE LA RESERVA
Route::get('/reserva/show/{id}', 'reservaController@show');

Route::get('/reserva/all/', 'reservaController@index');

Route::post('/reserva/register', 'reservaController@store');

Route::post('/reserva/update/{id}', 'reservaController@update');

Route::get('/reserva/destroy/{id}', 'reservaController@destroy');

//RUTAS DE LA ROL
Route::get('/rol/show/{id}', 'rolController@show');

Route::get('/rol/all/', 'rolController@index');

Route::post('/rol/register', 'rolController@store');

Route::post('/rol/update/{id}', 'rolController@update');

Route::get('/rol/destroy/{id}', 'rolController@destroy');

//RUTAS DE LA SEGURO
Route::get('/seguro/show/{id}', 'seguroController@show');

Route::get('/seguro/all/', 'seguroController@index');

Route::post('/seguro/register', 'seguroController@store');

Route::post('/seguro/update/{id}', 'seguroController@update');

Route::get('/seguro/destroy/{id}', 'seguroController@destroy');

//RUTAS DE LA SERVICIO
Route::get('/servicio/show/{id}', 'servicioController@show');

Route::get('/servicio/all/', 'servicioController@index');

Route::post('/servicio/register', 'servicioController@store');

Route::post('/servicio/update/{id}', 'servicioController@update');

Route::get('/servicio/destroy/{id}', 'servicioController@destroy');

//RUTAS DEL VEHICULO
Route::get('/vehiculo/show/{id}', 'vehiculoController@show');

Route::get('/vehicle_list','vehiculoController@filter');

Route::get('/vehiculo/all/', 'vehiculoController@index');

Route::post('/vehiculo/register', 'vehiculoController@store');

Route::post('/vehiculo/update/{id}', 'vehiculoController@update');

Route::get('/vehiculo/destroy/{id}', 'vehiculoController@destroy');

Route::get('/reservar_vehiculo','vehiculoController@buy_vehicle');

//RUTAS DEL VUELO
Route::get('/vuelo/show/{id}', 'vueloController@show');

Route::get('/vuelo/all/', 'vueloController@index');

Route::get('/results', 'vueloController@getFlights');

Route::get('/vuelo/byDate/{date}/', 'vueloController@getFlightByDate');

Route::get('/vuelo/byDestination/{city}/', 'vueloController@getFlightByDestination');

Route::post('/vuelo/register', 'vueloController@store');

Route::post('/vuelo/update/{id}', 'vueloController@update');

Route::get('/vuelo/destroy/{id}', 'vueloController@destroy');

Route::get('/selecAsiento', 'asientoController@getSeatsByFlightId');

Route::get('/pasajero', 'pasajeroController@index');

Route::post('/comprar', 'pasajeroController@saveData');

Route::get('/finalizar', 'reservaController@store');

Route::get('/auth/facebook', 'facebookController@redirectToFacebookProvider');

Route::get('/auth/facebook/callback', 'facebookController@handleProviderFacebookCallback');

Route::get('/erase', 'vueloController@eraseData');
//-------------------------------------------------------------
Route::post('/register', 'Auth\RegisterController@start');

Route::post('/registering', 'Auth\RegisterController@createUser');

Route::get('/verify', 'UserController@verifyEmail');

Route::get('/login', 'Auth\LoginController@index');

Route::post('/login', 'Auth\LoginController@authenticate');

Route::get('/logout', 'Auth\LoginController@getLogout');

// RUTAS DE ADMINISTRACION

Route::get('/administration', 'AdministrationController@index');

Route::post('/administrationAerolinea', 'administrationController@adminAerolineasView');

Route::post('/administrationAerolineaDelete', 'administrationController@adminAerolineasDelete');

Route::post('/administrationAerolineaAdd', 'administrationController@adminAerolineasAdd');

Route::post('administrationVuelo', 'administrationController@adminVueloView');

Route::post('administrationVueloAdd', 'administrationController@adminVueloAdd');

Route::post('administrationAsientoAdd', 'administrationController@adminAsientoAdd');

Route::post('administrationHotel', 'administrationController@adminHotelView');

Route::post('administrationHotelDisable', 'administrationController@adminHotelDisable');

Route::post('administrationHotelAdd', 'administrationController@adminHotelAdd');

Route::post('administrationHabitacion', 'administrationController@adminHabitacionView');

Route::post('administrationHabitacionHotel', 'administrationController@adminHabitacionHotelView');

Route::post('administrationHabitacionHotelDisable', 'administrationController@adminHabitacionHotelDisable');

Route::post('administrationHabitacionHotelAdd', 'administrationController@adminHabitacionHotelAdd');
