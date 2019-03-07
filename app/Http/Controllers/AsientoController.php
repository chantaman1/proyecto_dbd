<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asiento;
class AsientoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asientos = Asiento::All();
        return $asientos;
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
        $asiento = new Asiento;
        $asiento->fill($request->all());
        $asiento->save();
        return $asiento;
    }

    public function getSeatsByFlightId(Request $request){
      if($request->get('id') == NULL || $request->get('destino') == NULL){
        return redirect('/');
      }
      else{
        $request->session()->put('id_vuelo', $request->get('id'));
        $asientos = Asiento::where('vuelo_id', $request->get('id'))->where('disponibilidad', true)->get();
        return view('seatResult')->with('asientos', $asientos);
      }
    }

    public function getGoFlightSeat(Request $request){
      if($request->session()->get('tipoViaje') == 'both'){
        $request->session()->put('estadoAsiento', 1);
        $asientos = Asiento::where('vuelo_id', $request->session()->get('ida_vuelo_id'))->where('disponibilidad', true)->get();
        return view('seatResult', ['asientos' => $asientos, 'vuelta' => $request->session()->get('tipoViaje')]);
      }
      else{
        $request->session()->put('estadoAsiento', 0);
        $asientos = Asiento::where('vuelo_id', $request->session()->get('ida_vuelo_id'))->where('disponibilidad', true)->get();
        return view('seatResult', ['asientos' => $asientos, 'vuelta' => $request->session()->get('tipoViaje')]);
      }
    }

    public function getBackFlightSeat(Request $request){
      $asientoIdaId = $request->get('id');
      $request->session()->push('asientosIda', $asientoIdaId);
      $this->updateSeat($asientoIdaId);
      $asientos = Asiento::where('vuelo_id', $request->session()->get('vuelta_vuelo_id'))->where('disponibilidad', true)->get();
      return view('seatResult', ['asientos' => $asientos, 'vuelta' => '']);
    }

    public function saveFlightSeats(Request $request){
      $asientoId = $request->get('id');
      if($request->session()->get('estadoAsiento') == 0){
        $request->session()->push('asientosIda', $asientoId);
        $this->updateSeat($asientoId);
        return app('App\Http\Controllers\PasajeroController')->addPassengerView($request);
      }
      else{
        $request->session()->push('asientosRegreso', $asientoId);
        $this->updateSeat($asientoId);
        return app('App\Http\Controllers\PasajeroController')->addPassengerView($request);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asiento = Asiento::find($id);
        if($asiento != NULL){
            return $asiento;
        }
        else{
            return "Asiento no existe.";
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
        $asiento = Asiento::find($id);
        if($asiento != NULL){
          $asiento->fill($request->all());
          $asiento->save();
          return $asiento;
        }
        else{
          return "No puede modificar un asiento no existente.";
        }
    }

    public function updateSeat($id){
      $asiento = Asiento::find($id);
      if($asiento != NULL){
        if($asiento->disponibilidad == true){
          $asiento->disponibilidad = false;
          $asiento->save();
          return $asiento;
        }
        else{
          $asiento->disponibilidad = true;
          $asiento->save();
          return $asiento;
        }
      }
      else{
        return "No puede modificar un asiento no existente.";
      }
    }

    public function confirmSeat($id){
      $asiento = Asiento::find($id);
      if($asiento != NULL){
        if($asiento->disponibilidad == false){
          $asiento->comprado = true;
          $asiento->save();
          return;
        }
      }
    }

    public function resetSeats(){
      $asientos = Asiento::All();
      foreach($asientos as $asiento){
        if($asiento->disponibilidad == false && $asiento->comprado == false){
          $asiento->disponibilidad = true;
          $asiento->save();
        }
      }
      return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $asiento = Asiento::find($id);
      if($asiento != NULL){
          $asiento->delete();
          return "Asiento eliminado.";
      }
      else{
          return "Asiento no existe.";
      }
    }
}
