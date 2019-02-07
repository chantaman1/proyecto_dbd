<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pasajero;
class PasajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request->get('codigo') == NULL || $request->get('id') == NULL || $request->get('precio') == NULL || $request->get('tipo') == NULL){
        return redirect('/');
      }
      else if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 1){
        $request->session()->put('vuelta_asiento_codigo', $request->get('codigo'));
        $request->session()->put('vuelta_asiento_id', $request->get('id'));
        $request->session()->put('vuelta_asiento_precio', $request->get('precio'));
        $request->session()->put('vuelta_asiento_tipo', $request->get('tipo'));
        $request->session()->put('pasoActual', 2);
        return view('passengerFlight');
      }
      else if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 0){
        $request->session()->put('ida_asiento_codigo', $request->get('codigo'));
        $request->session()->put('ida_asiento_id', $request->get('id'));
        $request->session()->put('ida_asiento_precio', $request->get('precio'));
        $request->session()->put('ida_asiento_tipo', $request->get('tipo'));
        $request->session()->put('pasoActual', 1);
        return redirect('/results');
      }
      else if($request->session()->get('idaVuelta') == false){
        $request->session()->put('ida_asiento_codigo', $request->get('codigo'));
        $request->session()->put('ida_asiento_id', $request->get('id'));
        $request->session()->put('ida_asiento_precio', $request->get('precio'));
        $request->session()->put('ida_asiento_tipo', $request->get('tipo'));
        return view('passengerFlight');
      }
      else{
        return view('index');
      }
    }

    public function saveData(Request $request)
    {
        $request->session()->put('nombre', $request->get('nombre'));
        $request->session()->put('apellido_paterno', $request->get('apellido_paterno'));
        $request->session()->put('apellido_materno', $request->get('apellido_materno'));
        $request->session()->put('correo', $request->get('correo'));
        $request->session()->put('fecha_nacimiento', $request->get('fecha_nacimiento'));
        $request->session()->put('telefono', $request->get('telefono'));
        $request->session()->put('nacionalidad', $request->get('nacionalidad'));
        $request->session()->put('pasaporte', $request->get('pasaporte'));
        if($request->session()->get('idaVuelta')){
          $data = (object)[(object)["tipo_viaje" => "IDA", "nombre" => $request->get('nombre'), "precio" => $request->session()->get('ida_asiento_precio'),
                   "tipo" => $request->session()->get('ida_asiento_tipo'), "codigo" => $request->session()->get('ida_asiento_codigo'),
                   "destino" => $request->session()->get('ida_ciudad_destino'), "origen" => $request->session()->get('ida_ciudad_origen')],
                   (object)["tipo_viaje" => "REGRESO", "nombre" => $request->get('nombre'), "precio" => $request->session()->get('vuelta_asiento_precio'),
                    "tipo" => $request->session()->get('vuelta_asiento_tipo'), "codigo" => $request->session()->get('vuelta_asiento_codigo'),
                    "destino" => $request->session()->get('vuelta_ciudad_destino'), "origen" => $request->session()->get('vuelta_ciudad_origen')]];
          $total = intval($request->session()->get('ida_asiento_precio')) + intval($request->session()->get('vuelta_asiento_precio'));
          return view('buyFlight')->with('data', $data)->with('total', $total);
        }
        else{
          $data = (object)[(object)["tipo_viaje" => "IDA", "nombre" => $request->get('nombre'), "precio" => $request->session()->get('ida_asiento_precio'),
                   "tipo" => $request->session()->get('ida_asiento_tipo'), "codigo" => $request->session()->get('ida_asiento_codigo'),
                   "destino" => $request->session()->get('ida_ciudad_destino'), "origen" => $request->session()->get('ida_ciudad_origen')]];
          $total = intval($request->session()->get('ida_asiento_precio'));
          return view('buyFlight')->with('data', $data)->with('total', $total);
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
        $pasajero = new Pasajero;
        $pasajero->fill(array('nombre' => $request->session()->get('nombre'),
                              'apellido_paterno' => $request->session()->get('apellido_paterno'),
                              'apellido_materno' => $request->session()->get('apellido_materno'),
                              'correo' => $request->session()->get('correo'),
                              'fecha_nacimiento' => $request->session()->get('fecha_nacimiento'),
                              'telefono' => $request->session()->get('telefono'),
                              'nacionalidad' => $request->session()->get('nacionalidad'),
                              'pasaporte' => $request->session()->get('pasaporte'),
                              'asiento_id' => $request->session()->get('asiento_id')));
        $pasajero->save();
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasajero = Pasajero::find($id);
        if($pasajero != NULL){
            return $pasajero;
        }
        else{
            return "Pasajero no existente.";
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
        $pasajero = Pasajero::find($id);
        if($pasajero != NULL){
          $pasajero->fill($request->all());
          $pasajero->save();
          return $pasajero;
        }
        else{
          return "No puede modificar un pasajero no existente.";
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
      $pasajero = Pasajero::find($id);
      if($pasajero != NULL){
          $pasajero->delete();
          return "Pasajero eliminado.";
      }
      else{
          return "Pasajero no existente.";
      }
    }
}
