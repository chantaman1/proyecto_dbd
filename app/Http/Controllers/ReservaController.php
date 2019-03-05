<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserva;
use App\Vehiculo;
use App\Comprobante_pago;
use Faker\Factory as Faker;
use Auth;
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
      $reserva_id = $faker->unique()->ean8;
      foreach($passengers as $passenger){
        app('App\Http\Controllers\PasajeroController')->store($passenger);
        app('App\Http\Controllers\AsientoController')->confirmSeat($passenger->asiento_id);
        $reserva = new Reserva;
        $data = ['totalAPagar' => intVal($passenger->asiento_precio), 'estado_pago' => 'Pagado', 'user_id' => Auth::id(), 'reserva' => $reserva_id, 'asiento_id' => $passenger->asiento_id, 'cant_ninos' => $request->session()->get('cant_ninos'),
                 'cant_adultos' => $request->session()->get('cant_adultos')];
        $reserva->fill($data);
        $reserva->save();
      }
      if($request->session()->get('fecha_regreso') != NULL){
        return view('buyFinished', ['tipoVuelo' => 'Ida y regreso', 'pOrigen' => $request->session()->get('pais_origen'), 'pDestino' => $request->session()->get('pais_destino'),
                                    'cOrigen' => $request->session()->get('ida_ciudad_origen'), 'cDestino' => $request->session()->get('ida_ciudad_destino'),
                                    'pasajeros' => $request->session()->get('totalPasajeros'), 'reserva' => $reserva_id]);
      }
      else{

        return view('buyFinished', ['tipoVuelo' => 'Solo ida', 'pOrigen' => $request->session()->get('pais_origen'), 'pDestino' => $request->session()->get('pais_destino'),
                                    'cOrigen' => $request->session()->get('ida_ciudad_origen'), 'cDestino' => $request->session()->get('ida_ciudad_destino'),
                                    'pasajeros' => $request->session()->get('totalPasajeros'), 'reserva' => $reserva_id]);
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
      $reserva->vehiculos()->attach([$request->session()->get('vehiculo_id')],['fecha_inicio'=>$request->session()->get('vehiculo_fecha_retiro'), 'fecha_termino'=>$request->session()->get('vehiculo_fecha_devolucion')]);
      Vehiculo::find($request->session()->get('vehiculo_id'))->update(['disponibilidad'=> false]);
      return $reserva;
    }

    public function terminarReservaHabitacion(Request $request){
        app('App\Http\Controllers\HabitacionController')->reservarHabitacion($request->session()->get('reserva_habitacion_id'));
        $reserva = new Reserva;
        $data = ['totalAPagar' => intVal($request->session()->get('reserva_habitacion_precio')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id()];
        $reserva->fill($data);
        $reserva->save();
        $reserva->habitacions()->attach([$request->session()->get('hotel_fecha_inicio'), $request->session()->get('hotel_fecha_fin')]);
        return view('reciboHabitacion', ['inicio' => $request->session()->get('hotel_fecha_inicio'), 'fin' => $request->session()->get('hotel_fecha_fin'), 'id_reserva' => $reserva->reserva_id]);
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
