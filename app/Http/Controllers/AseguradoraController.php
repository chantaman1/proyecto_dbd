<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aseguradora;
class AseguradoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aseguradoras = Aseguradora::All();
        return $aseguradoras;
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
        $aseguradora = new Aseguradora;
        $aseguradora->fill($request->all());
        $aseguradora->save();
        return $aseguradora;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aseguradora = Aseguradora::find($id);
        if($aseguradora != NULL){
            return $aseguradora;
        }
        else{
            return "Aseguradora no existe.";
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
        $aseguradora = Aseguradora::find($id);
        if($aseguradora != NULL){
          $aseguradora->fill($request->all());
          $aseguradora->save();
          return $aseguradora;
        }
        else{
          return "No puede modificar una aseguradora no existente.";
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
        $aseguradora = Aseguradora::find($id);
        if($aseguradora != NULL){
            $aseguradora->delete();
            return "Aseguradora eliminada.";
        }
        else{
            return "Aseguradora no existe.";
        }
    }
}
