<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servicio;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::All();
        return $servicios;
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
      $servicio = new Servicio;
      $servicio->fill($request->all());
      $servicio->save();
      return $servicio;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);
        if($servicio != NULL){
            return $servicio;
        }
        else{
            return "Servicio no existente.";
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
      $servicio = Servicio::find($id);
      if($servicio != NULL){
        $servicio->fill($request->all());
        $servicio->save();
        return $servicio;
      }
      else{
        return "No puede modificar un servicio no existente.";
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
      $servicio = Servicio::find($id);
      if($servicio != NULL){
          $servicio->delete();
          return "Servicio eliminado.";
      }
      else{
          return "Servicio no existente.";
      }
    }
}
