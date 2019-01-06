<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compania_alquiler;
class Compania_alquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compania_alquilers = Compania_alquiler::All();
        return $compania_alquilers;
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
        $compania_alquiler = new Compania_alquiler;
        $compania_alquiler->fill($request->all());
        $compania_alquiler->save();
        return $compania_alquiler;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compania_alquiler = Compania_alquiler::find($id);
        if($compania_alquiler != NULL){
            return $compania_alquiler;
        }
        else{
            return "Compania no existe.";
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
        $compania_alquiler = Compania_alquiler::find($id);
        if($compania_alquiler != NULL){
          $compania_alquiler->fill($request->all());
          $compania_alquiler->save();
          return $compania_alquiler;
        }
        else{
          return "No puede modificar una compañia de alquiler no existente.";
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
      $compania_alquiler = Compania_alquiler::find($id);
      if($compania_alquiler != NULL){
          $compania_alquiler->delete();
          return "Compania de alquiler eliminada.";
      }
      else{
          return "Compania de alquiler no existente.";
      }
    }
}
