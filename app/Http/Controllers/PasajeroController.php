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
        $request->session()->put('asiento_id', $request->get('id'));
        $request->session()->put('asiento_precio', $request->get('precio'));
        $request->session()->put('asiento_cod', $request->get('cod'));
        return view('passengerFlight');
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
        //$pasajero->fill($request->all());
        $pasajero->fill(array('nombre' => $request->get('nombre'),
                              'apellido_paterno' => $request->get('apellido_paterno'),
                              'apellido_materno' => $request->get('apellido_materno'),
                              'correo' => $request->get('correo'),
                              'fecha_nacimiento' => $request->get('fecha_nacimiento'),
                              'telefono' => $request->get('telefono'),
                              'nacionalidad' => $request->get('nacionalidad'),
                              'pasaporte' => $request->get('pasaporte'),
                              'asiento_id' => $request->session()->get('asiento_id')));
        $pasajero->save();
        $data = (object)["nombre" => $request->get('nombre'), "precio" => $request->session()->get('asiento_precio'),
                 "tipo" => $request->session()->get('asiento_tipo'), "cod" => $request->session()->get('asiento_cod'),
                 "destino" => $request->session()->get('destino'),];
        return view('buyFlight')->with('data', $data);
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
