<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vuelo;
use App\Seguro;
use App\Vehiculo;
use App\Asiento;
use App\Aseguradora;
use App\Compania_alquiler;
use App\Hotel;
use App\Habitacion;
use App\Aerolinea;

class administrationController extends Controller
{
    public function index(Request $request){
      $vuelosActivos = Vuelo::where('fecha', '>=' ,date("d/m/Y"))->get();
      $vuelosInactivos = Vuelo::where('fecha', '<' ,date("d/m/Y"))->get();
      $aerolineas = Aerolinea::All();
      $aseguradoras = Aseguradora::where('activo', true)->get();
      $companiasAlquiler = Compania_alquiler::where('activo', true)->get();
      $hoteles = Hotel::where('activo', true)->get();
      $asientos = Asiento::where('disponibilidad', true)->get();
      $seguros = Seguro::All();
      $vehiculos = Vehiculo::where('disponibilidad', true)->get();
      $habitaciones = Habitacion::where('disponibilidad', true)->get();

      $cant_vuelosActivos = $vuelosActivos->count();
      $cant_vuelosInactivos = $vuelosInactivos->count();
      $cant_aerolineas = $aerolineas->count();
      $cant_aseguradoras = $aseguradoras->count();
      $cant_alquiler = $companiasAlquiler->count();
      $cant_hoteles = $hoteles->count();
      $cant_asientos = $asientos->count();
      $cant_seguros = $seguros->count();
      $cant_vehiculos = $vehiculos->count();
      $cant_habitaciones = $habitaciones->count();
      return view('Administration/admMain', ['vueloActivos' => $cant_vuelosActivos, 'vueloInactivos' => $cant_vuelosInactivos,
                                             'aseguradoras' => $cant_aseguradoras, 'companias' => $cant_alquiler,
                                             'hoteles' => $cant_hoteles, 'asientos' => $cant_asientos,
                                             'seguros' => $cant_seguros, 'vehiculos' => $cant_vehiculos,
                                             'habitaciones' => $cant_habitaciones, 'aerolineas' => $cant_aerolineas]);
    }
}
