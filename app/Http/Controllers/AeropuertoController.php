<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aeropuerto;
class AeropuertoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aeropuertos = Aeropuerto::All();
      return $aeropuertos;
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
        $aeropuerto = new Aeropuerto;
        $aeropuerto->fill($request->all());
        $aeropuerto->save();
        return $aeropuerto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $aeropuerto = Aeropuerto::find($id);
      if($aeropuerto != NULL){
        return $aeropuerto;
      }
      else{
        return "Aeropuerto especificado no existe.";
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
        $aeropuerto = Aeropuerto::find($id);
        if($aeropuerto != NULL){
          $aeropuerto->fill($request->all());
          $aeropuerto->save();
          return $aeropuerto;
        }
        else{
          return "No puede modificar un aeropuerto no existente.";
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
        $aeropuerto = Aeropuerto::find($id);
        if($aeropuerto != NULL){
            $aeropuerto->delete();
            return "Aeropuerto eliminado.";
        }
        else{
            return "Aeropuerto no existe.";
        }
    }
}
