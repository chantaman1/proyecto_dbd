<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Metodo_pago;
class Metodo_pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodo_pagos = Metodo_pago::All();
        return $metodo_pagos;
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
        $metodo_pago = new Metodo_pago;
        $metodo_pago->fill($request->all());
        $metodo_pago->save();
        return $metodo_pago;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metodo_pago = Metodo_pago::find($id);
        if($metodo_pago != NULL){
            return $metodo_pago;
        }
        else{
            return "Metodo de pago no existe.";
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
        $metodo_pago = Metodo_pago::find($id);
        if($metodo_pago != NULL){
          $metodo_pago->fill($request->all());
          $metodo_pago->save();
          return $metodo_pago;
        }
        else{
          return "No puede modificar un metodo de pago no existente.";
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
      $metodo_pago = Metodo_pago::find($id);
      if($metodo_pago != NULL){
          $metodo_pago->delete();
          return "Metodo de pago eliminado.";
      }
      else{
          return "Metodo de pago no existente.";
      }
    }
}
