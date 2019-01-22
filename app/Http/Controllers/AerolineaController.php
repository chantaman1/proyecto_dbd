<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aerolinea;
class AerolineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aerolineas = Aerolinea::All();
      return view('welcome')->with('data', $aerolineas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aerolinea = new Aerolinea;
        $aerolinea->fill($request->all());
        $aerolinea->save();
        return $aerolinea;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $aerolinea = Aerolinea::find($id);
      if($aerolinea != NULL){
          return $aerolinea;
      }
      else{
          return "ID de aerolinea no existe.";
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
        $aerolinea = Aerolinea::find($id);
        if($aerolinea != NULL){
          $aerolinea->fill($request->all());
          $aerolinea->save();
          return $aerolinea;
        }
        else{
          return "No puede modificar una aerolinea no existente.";
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
        $aerolinea = Aerolinea::find($id);
        if($aerolinea != NULL){
            $aerolinea->delete();
            return "Aerolinea eliminada.";
        }
        else{
            return "No puede eliminar una aerolinea no existente.";
        }
    }
}
