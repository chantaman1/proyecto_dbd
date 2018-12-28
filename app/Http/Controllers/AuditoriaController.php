<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Auditoria;

class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditorias = Auditoria::All();
        return $auditorias;
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
        $auditoria = new Auditoria;
        $auditoria->fill($request->all());
        $auditoria->save();
        return $auditoria;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auditoria = Auditoria::find($id);
        if($auditoria != NULL){
            return $auditoria;
        }
        else{
            return "ID de auditoria no existe.";
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
        $auditoria = Auditoria::find($id);
        if($auditoria != NULL){
          $auditoria->fill($request->all());
          $auditoria->save();
          return $auditoria;
        }
        else{
          return "No puede modificar una auditoria no existente.";
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
      $auditoria = Auditoria::find($id);
      if($auditoria != NULL){
          $auditoria->delete();
          return "Registro de auditoria eliminado.";
      }
      else{
          return "Registro no existente.";
      }
    }
}
