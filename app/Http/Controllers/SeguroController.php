<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seguro;
use App\Pasajero;
class SeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguros = Seguro::All();
        return view('seleccionarSeguro')->with('seguros', $seguros);
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
        $seguro = new Seguro;
        $seguro->fill($request->all());
        $seguro->save();
        return $seguro;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seguro = Seguro::find($id);
        if($seguro != NULL){
            return $seguro;
        }
        else{
            return "Seguro no existente.";
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
        $seguro = Seguro::find($id);
        if($seguro != NULL){
          $seguro->fill($request->all());
          $seguro->save();
          return $seguro;
        }
        else{
          return "No puede modificar un seguro no existente.";
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
      $seguro = Seguro::find($id);
      if($seguro != NULL){
          $seguro->delete();
          return "Seguro eliminado.";
      }
      else{
          return "Seguro no existente.";
      }
    }

    public function asignacion_pasajero_seguro(Request $request){
      $request->session()->put('seguro_id',$request->get('id'));
      return view('asignacion_pasajero_seguro');
    }

    public function finalizar_pago_seguro(Request $request){
      $seguro = Seguro::find($request->session()->get('seguro_id'));
      $pasajero = Pasajero::find($request->session()->get('seguro_pasajero_id'));
      $seguro->pasajeros()->attach([$pasajero->id]);
      $detalle = (object)['numero_tarjeta'=>$request->get('numero'), 'cvv'=>$request->get('cvv'),'nombre'=>$request->get('nombre')];
      return view('comprobante_pago_seguro')->with('seguro',$seguro)->with('pasajero',$pasajero)->with('detalle',$detalle);
    }
}
