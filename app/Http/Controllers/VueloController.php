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
    public function index()
    {
        $vuelos = Vuelo::All();
        return $vuelos;
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
}
