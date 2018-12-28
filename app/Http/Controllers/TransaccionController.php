<?php

namespace App\Http\Controllers;

use App\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $transaccion = Transaccion::All();
      return $transaccion;
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
        $transaccion = new Transaccion;
        $transaccion->fill($request->all());
        $transaccion->save();
        return $transaccion;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function show(transaccion $transaccion)
    {
        $transaccion = Transaccion::find($id);
        if($transaccion != NULL){
            return $transaccion;
        }
        else{
            return "Transaccion no existente.";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function edit(transaccion $transaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaccion $transaccion)
    {
        $transaccion = Transaccion::find($id);
        if($transaccion != NULL){
          $transaccion->fill($request->all());
          $transaccion->save();
          return $transaccion;
        }
        else{
          return "No puede modificar una transaccion no existente.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaccion  $transaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaccion $transaccion)
    {
      $transaccion = Transaccion::find($id);
      if($transaccion != NULL){
          $transaccion->delete();
          return "Transaccion eliminado.";
      }
      else{
          return "Transaccion no existente.";
      }
    }
}
