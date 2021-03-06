<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\Habitacion;
use Carbon\Carbon;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::All();
        return $hotels;
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
        $hotel = new Hotel;
        $hotel->fill($request->all());
        $hotel->save();
        return $hotel;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);
        if($hotel != NULL){
            return $hotel;
        }
        else{
            return "Hotel no existe.";
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
        $hotel = Hotel::find($id);
        if($hotel != NULL){
          $hotel->fill($request->all());
          $hotel->save();
          return $hotel;
        }
        else{
          return "No puede modificar un hotel no existente.";
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
      $hotel = Hotel::find($id);
      if($hotel != NULL){
          $hotel->delete();
          return "Hotel eliminado.";
      }
      else{
          return "Hotel no existente.";
      }
    }

    public function start(){
      $ciudades = Hotel::distinct()->get(['ciudad']);
      return view('hotel')->with('ciudades',$ciudades);
    }

    public function search(Request $request){
      $hoteles_validos = array();
      foreach (Hotel::all() as $hotel) {
        if($hotel->$ciudad == $request->$ciudad){
            $hoteles_validos[] = $hotel->$id;
        }
      }
    }

    public function getAllRooms(Request $request){
      $capacidad = $request->session()->get('hotel_cant_adultos')+$request->session()->get('hotel_cant_ninos');
      $habitacions = Habitacion::where([
        'hotel_id' => $request->get('id'),
        'capacidad' => $capacidad,
        'disponibilidad' => true
        ])->get();
      return view('habitacion-list')->with('habitacions',$habitacions);
    }

    public function filter(Request $request){
      $hotels = Hotel::where([
        'ciudad' => $request->get('ciudad'),
        'activo' => true
        ])->get();
      $format = 'd/m/Y';
      $fecha1 = Carbon::createFromFormat($format, $request->get('fecha_inicio'));
      $fecha2 = Carbon::createFromFormat($format, $request->get('fecha_fin'));
      $request->session()->put('hotel_date_inicio', $fecha1);
      $request->session()->put('hotel_date_fin', $fecha2);
      $request->session()->put('hotel_fecha_inicio', $request->get('fecha_inicio'));
      $request->session()->put('hotel_fecha_fin', $request->get('fecha_fin'));
      $request->session()->put('hotel_cant_adultos', $request->get('adults'));
      $request->session()->put('hotel_cant_ninos', $request->get('children'));
      $request->session()->put('hotel_ciudad', $request->get('ciudad'));
      return view('hotel-list')->with('hotels', $hotels);
  }
}
