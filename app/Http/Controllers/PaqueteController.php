<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paquete;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paquetes = Paquete::All();
        return $paquetes;
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
        $paquete = new Paquete;
        $paquete->fill($request->all());
        $paquete->save();
        return $paquete;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paquete = Paquete::find($id);
        if($paquete != NULL){
            return $paquete;
        }
        else{
            return "Paquete no existe.";
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
        $paquete = Paquete::find($id);
        if($paquete != NULL){
          $paquete->fill($request->all());
          $paquete->save();
          return $paquete;
        }
        else{
          return "No puede modificar un paquete no existente.";
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
      $paquete = Paquete::find($id);
      if($paquete != NULL){
          $paquete->delete();
          return "Paquete eliminado.";
      }
      else{
          return "Paquete no existente.";
      }
    }

    public function start()
    {
      $paquete = Paquete::All();
      return view('package')->with('paquetes', $paquete);
    }
}
