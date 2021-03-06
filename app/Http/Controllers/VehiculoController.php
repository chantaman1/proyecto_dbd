<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehiculo;
use App\Compania_alquiler;
use Carbon\Carbon;
use Auth;
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

    public function start(){
      $ciudades = Compania_alquiler::distinct()->get(['ciudad']);
      return view('autos')->with('ciudades',$ciudades);
    }

    public function filter(Request $request){
        $vehiculos = Vehiculo::join('compania_alquilers','vehiculos.compania_alquiler_id','=','compania_alquilers.id')
          ->where('compania_alquilers.ciudad', $request->get('ciudad'))
          ->where('vehiculos.disponibilidad', true)
          ->select('vehiculos.*')
          ->get();
        $request->session()->put('vehiculo_ciudad', $request->get('ciudad'));
        $request->session()->put('vehiculo_fecha_retiro', $request->get('fecha_retiro'));
        $request->session()->put('vehiculo_fecha_devolucion', $request->get('fecha_devolucion'));
        return view('vehicle-list')->with('vehiculos', $vehiculos);
  }

    public function buy_vehicle(Request $request){
      if(Auth::check()){
        $vehiculo = Vehiculo::find($request->get('id'));
        $request->session()->put('vehiculo_id', $request->get('id'));
        $format = 'd/m/Y';
        $fecha1 = Carbon::createFromFormat($format, $request->session()->get('vehiculo_fecha_retiro'));
        $fecha2 = Carbon::createFromFormat($format, $request->session()->get('vehiculo_fecha_devolucion'));
        $dias = $fecha2->diffInDays($fecha1);
        $total = $vehiculo->precio*$dias;
        $request->session()->put('vehiculo_total_pago', $total);
        $detalle = (object)['ciudad'=> $request->session()->get('vehiculo_ciudad'),
                            'fecha_retiro' => $request->session()->get('vehiculo_fecha_retiro'),
                            'fecha_devolucion' => $request->session()->get('vehiculo_fecha_devolucion'),
                            'total' => $total];
        return view('reservar_vehiculo')->with('vehiculo',$vehiculo)->with('data',$detalle);
     }
      else{
        return redirect('/login');
      }
    }
}
