<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserva;
use App\Vehiculo;
use App\Habitacion;
use App\Comprobante_pago;
use Faker\Factory as Faker;
use Auth;
use Carbon\Carbon;
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
        $x = 0;
        foreach($passengers as $passenger){
          $reserva_id = $faker->unique()->ean8;
          app('App\Http\Controllers\PasajeroController')->store($passenger, $request->session()->get('asientosIda')[$x]);
          usleep(100000);
          app('App\Http\Controllers\AsientoController')->confirmSeat($request->session()->get('asientosIda')[$x]);
          usleep(100000);
          app('App\Http\Controllers\PasajeroController')->store($passenger, $request->session()->get('asientosRegreso')[$x]);
          usleep(100000);
          app('App\Http\Controllers\AsientoController')->confirmSeat($request->session()->get('asientosRegreso')[$x]);
          $reserva = new Reserva;
          $data = ['totalAPagar' => intVal($request->session()->get('vuelo_total_pagar')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id, 'asiento_id' => $request->session()->get('asientosIda')[$x]];
          $reserva->fill($data);
          $reserva->save();
          usleep(100000);
          $reserva_id = $faker->unique()->ean8;
          $reserva2 = new Reserva;
          $data2 = ['totalAPagar' => intVal($request->session()->get('vuelo_total_pagar')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id, 'asiento_id' => $request->session()->get('asientosIda')[$x]];
          $reserva2->fill($data2);
          $reserva2->save();
          $x++;
          $request->session()->push('reservaId', $reserva_id);
        }
        dd('se supone hizo ambos.');
        return view('buyFinished', ['tipoVuelo' => 'Ida y regreso', 'cOrigen' => $request->session()->get('ida_ciudad_origen'), 'cDestino' => $request->session()->get('ida_ciudad_destino'),
                                    'pasajeros' => $request->session()->get('totalPasajeros'), 'reserva' => $request->session()->get('reservaId')]);
      }
      else{
        $x = 0;
        foreach($passengers as $passenger){
          $reserva_id = $faker->unique()->ean8;
          app('App\Http\Controllers\PasajeroController')->store($passenger, $request->session()->get('asientosIda')[$x]);
          usleep(100000);
          app('App\Http\Controllers\AsientoController')->confirmSeat($request->session()->get('asientosIda')[$x]);
          $reserva = new Reserva;
          $data = ['totalAPagar' => intVal($request->session()->get('vuelo_total_pagar')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id, 'asiento_id' => $request->session()->get('asientosIda')[$x]];
          $reserva->fill($data);
          $reserva->save();
          $x++;
          $request->session()->push('reservaId', $reserva_id);
        }
        dd('solo hizo de ida.');
        return view('buyFinished', ['tipoVuelo' => 'Solo ida', 'cOrigen' => $request->session()->get('ida_ciudad_origen'), 'cDestino' => $request->session()->get('ida_ciudad_destino'),
                                    'pasajeros' => $request->session()->get('totalPasajeros'), 'reserva' => $request->session()->get('reservaId')]);
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
}
