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
        $request->session()->put('asiento_codigo', $request->get('codigo'));
        $request->session()->put('asiento_id', $request->get('id'));
        $request->session()->put('asiento_precio', $request->get('precio'));
        $request->session()->put('asiento_tipo', $request->get('tipo'));
        return view('passengerFlight');
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
        $data = (object)["nombre" => $request->get('nombre'), "precio" => $request->session()->get('asiento_precio'),
                 "tipo" => $request->session()->get('asiento_tipo'), "codigo" => $request->session()->get('asiento_codigo'),
                 "destino" => $request->session()->get('destino')];
        return view('buyFlight')->with('data', $data);
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
