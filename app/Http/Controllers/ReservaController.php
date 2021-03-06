<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserva;
use App\Vehiculo;
use App\Habitacion;
use App\Asiento;
use App\Comprobante_pago;
use Faker\Factory as Faker;
use Auth;
use Carbon\Carbon;
use App\Mail\confirmacionCompra;
use Illuminate\Support\Facades\Mail;
class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $faker = Faker::create();
      $passengers = $request->session()->get('passengers');
      if($request->session()->get('tipoViaje') == 'both'){
        if($request->session()->get('esPaquete') == 'true'){
          $x = 0;
          foreach($passengers as $passenger){
            $reserva_id = $faker->unique()->ean8;
            $pasajero1 = app('App\Http\Controllers\PasajeroController')->store($passenger, $request->session()->get('asientosIda')[$x]);
            usleep(100000);
            if($passenger->seguro == 'true'){
              $pasajero1->seguros()->attach([5]);
            }
            app('App\Http\Controllers\AsientoController')->confirmSeat($request->session()->get('asientosIda')[$x]);
            usleep(100000);
            app('App\Http\Controllers\PasajeroController')->store($passenger, $request->session()->get('asientosRegreso')[$x]);
            usleep(100000);
            app('App\Http\Controllers\AsientoController')->confirmSeat($request->session()->get('asientosRegreso')[$x]);
            $reserva = new Reserva;
            $data = ['totalAPagar' => intVal($request->session()->get('total_pagar')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id];
            $reserva->fill($data);
            $reserva->save();
            $reserva->asientos()->attach([$request->session()->get('asientosIda')[$x]]);
            $reserva->paquetes()->attach([$request->session()->get('get_paquete')->id], ['fecha_inicio' => $request->session()->get('paquete_fecha_ida'), 'fecha_termino' => $request->session()->get('paquete_fecha_vuelta')]);
            usleep(100000);
            $request->session()->push('reservaId', $reserva_id);
            $reserva_id = $faker->unique()->ean8;
            $reserva2 = new Reserva;
            $data2 = ['totalAPagar' => intVal($request->session()->get('total_pagar')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id];
            $reserva2->fill($data2);
            $reserva2->save();
            $reserva2->asientos()->attach([$request->session()->get('asientosRegreso')[$x]]);
            $reserva2->paquetes()->attach([$request->session()->get('get_paquete')->id], ['fecha_inicio' => $request->session()->get('paquete_fecha_ida'), 'fecha_termino' => $request->session()->get('paquete_fecha_vuelta')]);
            $x++;
            $request->session()->push('reservaId', $reserva_id);
          }
          $request->session()->put('compra_reservas', $request->session()->get('reservaId'));
          $totalPasajeros = $request->session()->get('totalPasajeros');
          $reserva_final = $request->session()->get('reservaId');
          $ciudadOrigen = $request->session()->get('ida_ciudad_origen');
          $ciudadDestino = $request->session()->get('ida_ciudad_destino');
          Mail::to($request->session()->get('usuario_correo'))->send(new confirmacionCompra($request));
          sleep(1);
          return view('buyFinished', ['tipoVuelo' => 'Paquete ida y vuelta', 'cOrigen' => $ciudadOrigen, 'cDestino' => $ciudadDestino,
                                      'pasajeros' => $totalPasajeros, 'reserva' => $reserva_final]);
        }
        else{
          $x = 0;
          foreach($passengers as $passenger){
            $reserva_id = $faker->unique()->ean8;
            $pasajero1 = app('App\Http\Controllers\PasajeroController')->store($passenger, $request->session()->get('asientosIda')[$x]);
            usleep(100000);
            if($passenger->seguro == 'true'){
              $pasajero1->seguros()->attach([5]);
            }
            app('App\Http\Controllers\AsientoController')->confirmSeat($request->session()->get('asientosIda')[$x]);
            usleep(100000);
            app('App\Http\Controllers\PasajeroController')->store($passenger, $request->session()->get('asientosRegreso')[$x]);
            usleep(100000);
            app('App\Http\Controllers\AsientoController')->confirmSeat($request->session()->get('asientosRegreso')[$x]);
            $reserva = new Reserva;
            $data = ['totalAPagar' => intVal($request->session()->get('total_pagar')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id];
            $reserva->fill($data);
            $reserva->save();
            $reserva->asientos()->attach([$request->session()->get('asientosIda')[$x]]);
            usleep(100000);
            $request->session()->push('reservaId', $reserva_id);
            $reserva_id = $faker->unique()->ean8;
            $reserva2 = new Reserva;
            $data2 = ['totalAPagar' => intVal($request->session()->get('total_pagar')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id];
            $reserva2->fill($data2);
            $reserva2->save();
            $reserva2->asientos()->attach([$request->session()->get('asientosRegreso')[$x]]);
            $x++;
            $request->session()->push('reservaId', $reserva_id);
          }
          $request->session()->put('compra_reservas', $request->session()->get('reservaId'));
          $totalPasajeros = $request->session()->get('totalPasajeros');
          $reserva_final = $request->session()->get('reservaId');
          $ciudadOrigen = $request->session()->get('ida_ciudad_origen');
          $ciudadDestino = $request->session()->get('ida_ciudad_destino');
          Mail::to($request->session()->get('usuario_correo'))->send(new confirmacionCompra($request));
          sleep(1);
          return view('buyFinished', ['tipoVuelo' => 'Ida y vuelta', 'cOrigen' => $ciudadOrigen, 'cDestino' => $ciudadDestino,
                                      'pasajeros' => $totalPasajeros, 'reserva' => $reserva_final]);
        }
      }
      else{
        $x = 0;
        foreach($passengers as $passenger){
          $reserva_id = $faker->unique()->ean8;
          $pasajero = app('App\Http\Controllers\PasajeroController')->store($passenger, $request->session()->get('asientosIda')[$x]);
          usleep(100000);
          if($passenger->seguro == 'true'){
            $pasajero->seguros()->attach([5]);
          }
          app('App\Http\Controllers\AsientoController')->confirmSeat($request->session()->get('asientosIda')[$x]);
          $reserva = new Reserva;
          $data = ['totalAPagar' => intVal($request->session()->get('total_pagar')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id, 'asiento_id' => $request->session()->get('asientosIda')[$x]];
          $reserva->fill($data);
          $reserva->save();
          $reserva->asientos()->attach([$request->session()->get('asientosIda')[$x]]);
          $x++;
          $request->session()->push('reservaId', $reserva_id);
        }
        $request->session()->put('compra_reservas', $request->session()->get('reservaId'));
        $totalPasajeros = $request->session()->get('totalPasajeros');
        $reserva_final = $request->session()->get('reservaId');
        $ciudadOrigen = $request->session()->get('ida_ciudad_origen');
        $ciudadDestino = $request->session()->get('ida_ciudad_destino');
        Mail::to($request->session()->get('usuario_correo'))->send(new confirmacionCompra($request));
        sleep(1);
        return view('buyFinished', ['tipoVuelo' => 'Solo ida', 'cOrigen' => $ciudadOrigen, 'cDestino' => $ciudadDestino,
                                    'pasajeros' => $totalPasajeros, 'reserva' => $reserva_final]);
      }

    }

    public function reservaPaquete(Request $request){
        $reserva = new Reserva;
        $data = ['totalAPagar' => intVal($request->session()->get('paquete_precio')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id()];
        $reserva->fill($data);
        $reserva->save();
        return $reserva;
    }

    public function finalizar_pago_auto(Request $request){
      $reserva = new Reserva;
      $comprobante = new Comprobante_pago;
      $faker = Faker::create();
      $reserva_code = $faker->unique()->ean8;
      $data = ['totalAPagar' => $request->session()->get('vehiculo_total_pago'), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva'=> $reserva_code];
      $reserva->fill($data);
      $reserva->save();
      $data_comprobante = ['total_pagado'=>$reserva->totalAPagar,'descripcion_pago'=>'Pago por renta de vehiculo','metodo_pago_id'=> 2, 'reserva_id'=>$reserva->id];
      $comprobante->fill($data_comprobante);
      $comprobante->save();
      $format = 'd/m/Y';
      $fecha1 = Carbon::createFromFormat($format, $request->session()->get('vehiculo_fecha_retiro'));
      $fecha2 = Carbon::createFromFormat($format, $request->session()->get('vehiculo_fecha_devolucion'));
      $reserva->vehiculos()->attach([$request->session()->get('vehiculo_id')],['fecha_inicio'=>$fecha1, 'fecha_termino'=>$fecha2]);
      Vehiculo::find($request->session()->get('vehiculo_id'))->update(['disponibilidad'=> false]);
      $vehiculo = Vehiculo::find($request->session()->get('vehiculo_id'));
      $detalle = (object)['numero_tarjeta'=>$request->get('numero'), 'cvv'=>$request->get('cvv'),'nombre'=>$request->get('nombre'),
                          'fecha_retiro'=>$request->session()->get('vehiculo_fecha_retiro'),'fecha_devolucion'=>$request->session()->get('vehiculo_fecha_devolucion'), 'ciudad'=>$request->session()->get('vehiculo_ciudad')];
      $request->session()->put('compra_reservas', array($reserva_code));
      Mail::to($request->session()->get('usuario_correo'))->send(new confirmacionCompra($request));
      return view('comprobante_pago_vehiculo')->with('vehiculo',$vehiculo)->with('reserva',$reserva)->with('detalle',$detalle);
    }

    public function terminar_reserva_habitacion(Request $request){
        app('App\Http\Controllers\HabitacionController')->reservarHabitacion($request->session()->get('habitacion_id'));
        $reserva = new Reserva;
        $comprobante = new Comprobante_pago;
        $faker = Faker::create();
        $reserva_code = $faker->unique()->ean8;
        $data = ['totalAPagar' => $request->session()->get('habitacion_total'), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva'=> $reserva_code];
        $reserva->fill($data);
        $reserva->save();
        $data_comprobante = ['total_pagado'=>$reserva->totalAPagar,'descripcion_pago'=>'Pago por renta de habitación','metodo_pago_id'=> 2, 'reserva_id'=>$reserva->id];
        $comprobante->fill($data_comprobante);
        $comprobante->save();
        $reserva->habitacions()->attach([$request->session()->get('habitacion_id')],['fecha_inicio'=>$request->session()->get('hotel_date_inicio'), 'fecha_termino'=>$request->session()->get('hotel_date_fin')]);
        $habitacion = Habitacion::find($request->session()->get('habitacion_id'));
        $detalle = (object)['numero_tarjeta'=>$request->get('numero'), 'cvv'=>$request->get('cvv'),'nombre'=>$request->get('nombre'),
                            'fecha_inicio'=>$request->session()->get('hotel_fecha_inicio'),'fecha_fin'=>$request->session()->get('hotel_fecha_fin'), 'ciudad'=>$request->session()->get('hotel_ciudad')];
        $request->session()->put('compra_reservas', array($reserva_code));
        Mail::to($request->session()->get('usuario_correo'))->send(new confirmacionCompra($request));
        return view('comprobante_pago_habitacion')->with('habitacion',$habitacion)->with('reserva',$reserva)->with('detalle',$detalle);
    }

    public function test(){
      return view('buyFinished');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);
        if($reserva != NULL){
            return $reserva;
        }
        else{
            return "Reserva no existe.";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        if($reserva != NULL){
          $reserva->fill($request->all());
          $reserva->save();
          return $reserva;
        }
        else{
          return "No puede modificar una reserva no existente.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $reserva = Reserva::find($id);
      if($reserva != NULL){
          $reserva->delete();
          return "Reserva eliminada.";
      }
      else{
          return "Reserva no existente.";
      }
    }

    public function checkinResult(Request $request)
    {
        $reserva = Reserva::where('reserva', $request->get('codigoReserva'))->first();
        $asientos = $reserva->asientos;
        foreach($asientos as $asiento)
        {
          $pasajero = $asiento->pasajero;
          if($pasajero->apellido_paterno == $request->get('apellido')){
            return view('checkinResult')->with('asiento', $asiento)->with('reserva', $reserva);
          }
        }
        return redirect('/checkin');
    }
}
