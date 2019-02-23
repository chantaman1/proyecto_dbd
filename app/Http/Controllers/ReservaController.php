<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserva;
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
      $passengers = $request->session()->get('passengers');
      foreach($passengers as $passenger){
        app('App\Http\Controllers\PasajeroController')->store($passenger);
        app('App\Http\Controllers\AsientoController')->confirmSeat($passenger->asiento_id);
        $reserva = new Reserva;
        $data = ['totalAPagar' => intVal($passenger->asiento_precio), 'estado_pago' => 'Pagado', 'user_id' => Auth::id()];
        $reserva->fill($data);
        $reserva->save();
      }
      return view('index');
    }

    public function reservaPaquete(Request $request){
        $reserva = new Reserva;
        $data = ['totalAPagar' => intVal($request->session()->get('paquete_precio')), 'estado_pago' => 'Pagado', 'user_id' => Auth::id()];
        $reserva->fill($data);
        $reserva->save();
        return $reserva;
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
