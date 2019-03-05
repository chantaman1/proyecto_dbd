<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Habitacion;
class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitacions = Habitacion::All();
        return $habitacions;
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
        $habitacion = new Habitacion;
        $habitacion->fill($request->all());
        $habitacion->save();
        return $habitacion;
    }

    public function iniciarReserva(Request $request){
        $habitacion = Habitacion::find($request->get('id'));
        if($habitacion != NULL){
          $request->session()->put('reserva_habitacion_id', $request->get('id'));
          $request->session()->put('reserva_habitacion_precio', $habitacion->precio);
          return view('habitacion-compra', ['capacidad' => $habitacion->capacidad, 'precio' => $habitacion->precio, 'categoria' => $habitacion->categoria, 'tipo_cama' => $habitacion->tipo_cama]);
        }
        else{
          return redirect('/hoteles');
        }
    }

    public function reservarHabitacion($id){
      $habitacion = Habitacion::find($id);
      $habitacion->disponibilidad = false;
      $habitacion->save();
      return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        if($habitacion != NULL){
            return $habitacion;
        }
        else{
            return "Habitacion no existe.";
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
        $habitacion = Habitacion::find($id);
        if($habitacion != NULL){
          $habitacion->fill($request->all());
          $habitacion->save();
          return $habitacion;
        }
        else{
          return "No puede modificar una habitacion no existente.";
        }
    }

    public function getById(Request $request){
      $habitaciones = Habitacion::where('hotel_id', $request->get('id'))->get();
      return $habitaciones;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $habitacion = Habitacion::find($id);
      if($habitacion != NULL){
          $habitacion->delete();
          return "Habitacion eliminada.";
      }
      else {
          return "ID de habitacion no existe.";
      }
    }
}
