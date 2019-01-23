<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehiculo;
class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::All();
        return $vehiculos;
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
      $vehiculo = new Vehiculo;
      $vehiculo->fill($request->all());
      $vehiculo->save();
      return $vehiculo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);
        if($vehiculo != NULL){
          return $vehiculo;
        }
        else{
          return "El vehiculo no existe.";
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
      $vehiculo = Vehiculo::find($id);
      if($vehiculo != NULL){
        $vehiculo->fill($request->all());
        $vehiculo->save();
        return $vehiculo;
      }
      else{
        return "No puede modificar un vehiculo no existente.";
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
      $vehiculo = Vehiculo::find($id);
      if($vehiculo != NULL){
        $vehiculo->delete();
        return "Vehiculo eliminado.";
      }
      else{
        return "Vehiculo no existente.";
      }
    }

    public function filter(Request $request){
      $validator = Validator::make($request->all(), [
            'fecha_arriendo' => 'required|date|after:today',
            'fecha_devolucion' => 'required|date|after:fecha_arriendo',
        ]);
    if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }
    $companias_validas = array();
    foreach (Compania_alquiler::all() as $compania) {
      if($compania->$ciudad == $request->$ciudad){
          $companias_validas[] = $compania->$id;
      }
    }

    $id_vehiculos = Vehiculo::whereIn('compania_alquiler_id', $companias)
            ->pluck('id');
    //Se obtienen todos los vehiculos que ya están reservados en la fecha solicitada
    $reservados = Reserva::join('reserva_vehiculo', 'reserva_vehiculo.reserva_id', '=', 'reservas.id')
    ->whereIn('reserva_vehiculo.vehiculo_id',$id_vehiculos)
    ->where('reserva_vehiculo.fecha_inicio','<',$request->$fecha_devolucion)
    ->where('reserva_vehiculo.fecha_termino','>',$request->fecha_arriendo)
    ->pluck('reserva_vehiculo.vehiculo_id')
    //Se obtienen todos los vehiculos que fueron arrendados para un paquete ene la fecha solicitada
    $enpaquetados = Paquete::join('paquete_vehiculo','paquete_vehiculo.paquete_id','=','´paquetes.id')
    ->whereIn('paquete_vehiculo.vehiculo_id',$id_vehiculos)
    ->where('paquete_vehiculo.fecha_inicio','<',$request->$fecha_devolucion)
    ->where('paquete_vehiculo.fecha_termino','>',$request->fecha_arriendo)
    ->pluck('paquete_vehiculo.vehiculo_id')
    //Se filtran los vehiculos disponibles, descartando los ya reservados o que fueron vendidos en un paquete
    $vehiculos_encontrados = Vehiculo::whereIn('id',$id_vehiculos)
    ->whereNotIn('id',$reservados)
    ->whereNotIn('id',$enpaquetados)
    ->get();
  }
}
