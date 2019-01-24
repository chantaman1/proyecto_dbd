<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehiculo;
use App\Compania_alquiler;
class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::All();
        return $vehiculos;
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
      $vehiculo = new Vehiculo;
      $vehiculo->fill($request->all());
      $vehiculo->save();
      return $vehiculo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        if($vehiculo != NULL){
          return $vehiculo;
        }
        else{
          return "El vehiculo no existe.";
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
      $vehiculo = Vehiculo::find($id);
      if($vehiculo != NULL){
        $vehiculo->fill($request->all());
        $vehiculo->save();
        return $vehiculo;
      }
      else{
        return "No puede modificar un vehiculo no existente.";
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
      $vehiculo = Vehiculo::find($id);
      if($vehiculo != NULL){
        $vehiculo->delete();
        return "Vehiculo eliminado.";
      }
      else{
        return "Vehiculo no existente.";
      }
    }

    public function filter(Request $request){
      $alquiler = Compania_alquiler::where('ciudad', $request->get('ciudad'))->first();
      $vehiculos = Vehiculo::where('compania_alquiler_id', $alquiler->id)->get();
    return view('vehicle-list')->with('vehiculos', $vehiculos);
  }
}
