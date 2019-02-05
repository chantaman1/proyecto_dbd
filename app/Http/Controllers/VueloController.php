<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vuelo;
class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->initializeFlightData($request);
        return view('flight');
    }

    public function getFlightByDate($date){
        $vuelos = Vuelo::where('fecha', '=', $date)->get();
        return $vuelos;
    }

    public function getFlightByDestination($city){
        $vuelos = Vuelo::where('ciudad_destino', '=', $city)->get();
        return $vuelos;
    }

    public function getFlights(Request $request){
      if($request->session()->get('pasoActual') == 0){
        if($request->get('origen') == NULL || $request->get('destino') == NULL || $request->get('fecha_origen') == NULL){
          return redirect('/');
        }
        else if($request->get('fecha_regreso') != NULL){
          $request->session()->put('idaVuelta', true);
          $request->session()->put('fecha_regreso', $request->get('fecha_regreso'));
          $request->session()->put('fecha_ida', $request->get('fecha_origen'));
          $request->session()->put('ida_ciudad_origen', $request->get('origen'));
          $request->session()->put('ida_ciudad_destino', $request->get('destino'));
          $request->session()->put('vuelta_ciudad_origen', $request->get('destino'));
          $request->session()->put('vuelta_ciudad_destino', $request->get('origen'));
          $vuelos = Vuelo::where([
            'ciudad_origen' => $request->get('origen'),
            'ciudad_destino' => $request->get('destino'),
            'fecha' => $request->get('fecha_origen')
          ])->get();
          return view('flightResult')->with('vuelos', $vuelos);
        }
        else{
          $request->session()->put('fecha_ida', $request->get('fecha_origen'));
          $request->session()->put('ida_ciudad_origen', $request->get('origen'));
          $request->session()->put('ida_ciudad_destino', $request->get('destino'));
          $vuelos = Vuelo::where([
            'ciudad_origen' => $request->get('origen'),
            'ciudad_destino' => $request->get('destino'),
            'fecha' => $request->get('fecha_origen')
          ])->get();
          return view('flightResult')->with('vuelos', $vuelos);
        }
      }
      else{
        $this->getReturnFlight($request);
      }
    }

    public function getReturnFlight(Request $request){
      if($request->session()->get('pasoActual') == 1){
        $vuelos = Vuelo::where([
          'ciudad_origen' => $request->session()->get('vuelta_ciudad_origen'),
          'ciudad_destino' => $request->session()->get('vuelta_ciudad_destino'),
          'fecha' => $request->session()->get('fecha_regreso')
        ])->get();
        return view('flightResult')->with('vuelos', $vuelos);
      }
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
      $vuelo = new Vuelo;
      $vuelo->fill($request->all());
      $vuelo->save();
      return $vuelo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vuelo = Vuelo::find($id);
        if($vuelo != NULL){
          return $vuelo;
        }
        else{
          return "El vuelo no existe.";
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
      $vuelo = Vuelo::find($id);
      if($vuelo != NULL){
        $vuelo->fill($request->all());
        $vuelo->save();
        return $vuelo;
      }
      else{
        return "No puede modificar un vuelo no existente.";
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
      $vuelo = Vuelo::find($id);
      if($vuelo != NULL){
        $vuelo->delete();
        return "Vuelo eliminado.";
      }
      else{
        return "Vuelo no existente.";
      }
    }

    private function initializeFlightData(Request $request){
        //INDICA SI ES VUELO DE IDA O AMBOS.
        $request->session()->put('idaVuelta', false);
        $request->session()->put('pasoActual', 0);
        //DATOS DE LA IDA.
        $request->session()->put('fecha_ida', NULL);
        $request->session()->put('ida_ciudad_origen', NULL);
        $request->session()->put('ida_ciudad_destino', NULL);
        $request->session()->put('ida_asiento_id', NULL);
        $request->session()->put('ida_asiento_codigo', NULL);
        $request->session()->put('ida_asiento_precio', NULL);
        $request->session()->put('ida_asiento_tipo', NULL);
        //DATOS DE LA VUELTA.
        $request->session()->put('fecha_regreso', NULL);
        $request->session()->put('vuelta_ciudad_origen', NULL);
        $request->session()->put('vuelta_ciudad_destino', NULL);
        $request->session()->put('vuelta_asiento_id', NULL);
        $request->session()->put('vuelta_asiento_codigo', NULL);
        $request->session()->put('vuelta_asiento_precio', NULL);
        $request->session()->put('vuelta_asiento_tipo', NULL);
        //DATOS DEL PASAJERO.
        $request->session()->put('nombre', NULL);
        $request->session()->put('apellido_paterno', NULL);
        $request->session()->put('apellido_materno', NULL);
        $request->session()->put('correo', NULL);
        $request->session()->put('fecha_nacimiento', NULL);
        $request->session()->put('telefono', NULL);
        $request->session()->put('nacionalidad', NULL);
        $request->session()->put('pasaporte', NULL);

        return;
    }
}
