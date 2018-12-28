<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comprobante_pago;
class Comprobante_pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobante_pagos = Comprobante_pago::All();
        return $comprobante_pagos;
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
        $comprobante_pago = new Comprobante_pago;
        $comprobante_pago->fill($request->all());
        $comprobante_pago->save();
        return $comprobante_pago;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comprobante_pago = Comprobante_pago::find($id);
        if($comprobante_pago != NULL){
            return $comprobante_pago;
        }
        else{
            return "Comprobante de pago no existe.";
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
        $comprobante_pago = Comprobante_pago::find($id);
        if($comprobante_pago != NULL){
          $comprobante_pago->fill($request->all());
          $comprobante_pago->save();
          return $comprobante_pago;
        }
        else{
          return "No puede modificar un comprobante de pago no existente.";
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
      $comprobante_pago = Comprobante_pago::find($id);
      if($comprobante_pago != NULL){
          $comprobante_pago->delete();
          return "Comprobante de pago eliminado.";
      }
      else{
          return "Comprobante de pago no existente.";
      }
    }
}
