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
      if($request->session()->get('usuario_rol') === 'administrador'){
        $vuelosActivos = Vuelo::where('fecha', '>=' ,date("d/m/Y"))->get();
        $vuelosInactivos = Vuelo::where('fecha', '<' ,date("d/m/Y"))->get();
        $aerolineas = Aerolinea::All();
        $aseguradoras = Aseguradora::where('activo', true)->get();
        $companiasAlquiler = Compania_alquiler::where('activo', true)->get();
        $hoteles = Hotel::All();
        $asientos = Asiento::where('disponibilidad', true)->get();
        $seguros = Seguro::All();
        $vehiculos = Vehiculo::where('disponibilidad', true)->get();
        $habitacionesDisponibles = Habitacion::where('disponibilidad', true)->get();
        $habitacionesOcupadas = Habitacion::where('disponibilidad', false)->get();

        $cant_vuelosActivos = $vuelosActivos->count();
        $cant_vuelosInactivos = $vuelosInactivos->count();
        $cant_aerolineas = $aerolineas->count();
        $cant_aseguradoras = $aseguradoras->count();
        $cant_alquiler = $companiasAlquiler->count();
        $cant_hoteles = $hoteles->count();
        $cant_asientos = $asientos->count();
        $cant_seguros = $seguros->count();
        $cant_vehiculos = $vehiculos->count();
        $cant_habitaciones = $habitacionesDisponibles->count();
        $cant_habitacionesOcupadas = $habitacionesOcupadas->count();
        $cant_total_habitaciones = $cant_habitaciones + $cant_habitacionesOcupadas;
        return view('Administration/admMain', ['vueloActivos' => $cant_vuelosActivos, 'vueloInactivos' => $cant_vuelosInactivos,
                                               'aseguradoras' => $cant_aseguradoras, 'companias' => $cant_alquiler,
                                               'hoteles' => $cant_hoteles, 'asientos' => $cant_asientos,
                                               'seguros' => $cant_seguros, 'vehiculos' => $cant_vehiculos,
                                               'habitacionesDisp' => $cant_habitaciones, 'aerolineas' => $cant_aerolineas,
                                               'habitacionesOcu' => $cant_habitacionesOcupadas, 'totalHabitaciones' => $cant_total_habitaciones]);
      }
      else{
        return redirect('/vuelos');
      }
    }

    public function adminAerolineasView(Request $request){
        $aerolineas = Aerolinea::All();
        return view('Administration/admAerolineas', ['aerolineas' => $aerolineas, 'regErr' => '']);
    }

    public function adminAerolineasAdd(Request $request){
        $aerolinea = new Aerolinea;
        $aerolinea->fill(['nombre' => $request->get('aerolinea'), 'created_at' => now()]);
        $created = $aerolinea->save();
        $aerolineas = Aerolinea::All();
        if($created){
          return view('Administration/admAerolineas', ['aerolineas' => $aerolineas, 'regErr' => 'Aerolinea '.$request->get('aerolinea').' agregada correctamente.']);
        }
        else{
          return view('Administration/admAerolineas', ['aerolineas' => $aerolineas, 'regErr' => 'Error al agregar aerolinea.']);
        }
    }

    public function adminAerolineasDelete(Request $request){
        $aerolinea = Aerolinea::where('nombre', $request->get('eliminarAero'))->first();
        $deleted = $aerolinea->delete();
        $aerolineas = Aerolinea::All();
        if($deleted){
          return view('Administration/admAerolineas', ['aerolineas' => $aerolineas, 'regErr' => 'Aerolinea '.$request->get('eliminarAero').' eliminada correctamente.']);
        }
        else{
          return view('Administration/admAerolineas', ['aerolineas' => $aerolineas, 'regErr' => 'Aerolinea '.$request->get('eliminarAero').' no se pudo eliminar.']);
        }
    }

    public function adminVueloView(Request $request){
      $aerolineas = Aerolinea::All();
      return view('Administration/admVuelos', ['aerolineas' => $aerolineas, 'regErr' => '']);
    }

    public function adminVueloAdd(Request $request){
      $paisOrigen = $request->get('countryOrigin');
      $paisDestino = $request->get('countryDestiny');
      $ciudadOrigen = $request->get('cityOrigin');
      $ciudadDestino = $request->get('cityDestiny');

      $codigoVuelo = $request->get('flightCode');
      $horaVuelo = $request->get('flightTime');
      $fechaVuelo = $request->get('flightDate');
      $asientos = $request->get('seats');
      $aerolinea = $request->get('flightAirline');

      if($paisOrigen == NULL || $paisDestino == NULL || $ciudadOrigen == NULL || $ciudadDestino == NULL || $codigoVuelo == NULL || $horaVuelo == NULL || $fechaVuelo == NULL || $asientos == NULL || $aerolinea == NULL){
        return view('Administration/admVuelos', ['aerolineas' => $aerolineas, 'regErr' => 'Uno o mas campos no han sido llenados.']);
      }
      else{
        $getAirline = Aerolinea::where('nombre', $aerolinea)->first();
        $vuelo = new Vuelo;
        $vuelo->fill(['tipo' => 'ida', 'pais_origen' => $paisOrigen, 'ciudad_origen' => $ciudadOrigen,
                      'pais_destino' => $paisDestino, 'ciudad_destino' => $ciudadDestino, 'codigo' => $codigoVuelo,
                      'fecha' => $fechaVuelo, 'hora' => $horaVuelo, 'asientos' => 0, 'aerolinea_id' => $getAirline->id,
                      'created_at' => now()]);
        $created = $vuelo->save();
        $aerolineas = Aerolinea::All();
        if($created){
          $request->session()->put('add_vuelo_asientos', $asientos);
          $request->session()->put('add_vuelo_id', $vuelo->id);
          return view('Administration/admAsientos', ['asientos' => $asientos, 'regErr' => 'Vuelo agregado correctamente.']);
        }
        else{
          return view('Administration/admVuelos', ['aerolineas' => $aerolineas, 'regErr' => 'Error agregando vuelo.']);
        }
      }
    }

    public function adminAsientoAdd(Request $request){
        $ecoCantidad = $request->get('ecoQuantity');
        $ecoPrecio = $request->get('ecoPrice');
        $ecoPreCantidad = $request->get('ecoPremiumQuantity');
        $ecoPrePrecio = $request->get('ecoPremiumPrice');
        $businessCantidad = $request->get('businessQuantity');
        $businessPrecio = $request->get('businessPrice');

        if($ecoCantidad == NULL || $ecoPrecio == NULL || $ecoPreCantidad == NULL || $ecoPrePrecio == NULL || $businessCantidad == NULL || $businessPrecio == NULL){
          return view('Administration/admAsientos', ['asientos' => $request->session()->get('add_vuelo_asientos'), 'regErr' => 'Uno o mas campos no han sido llenados.']);
        }
        else{
          $x = 0;
          $codigoActual = 1;
          while($x < $ecoCantidad){
            $seat = new Asiento;
            $seat->fill(['tipo' => 'Economico', 'disponibilidad' => true, 'comprado' => false,
                         'precio' => $ecoPrecio, 'codigo' => $codigoActual, 'vuelo_id' => $request->session()->get('add_vuelo_id')]);
            $seat->save();
            $x++;
            $codigoActual++;
          }
          $x = 0;
          while($x < $ecoPreCantidad){
            $seat = new Asiento;
            $seat->fill(['tipo' => 'Economico Premium', 'disponibilidad' => true, 'comprado' => false,
                         'precio' => $ecoPrePrecio, 'codigo' => $codigoActual, 'vuelo_id' => $request->session()->get('add_vuelo_id')]);
            $seat->save();
            $x++;
            $codigoActual++;
          }
          $x = 0;
          while($x < $businessCantidad){
            $seat = new Asiento;
            $seat->fill(['tipo' => 'Business Premium', 'disponibilidad' => true, 'comprado' => false,
                         'precio' => $businessPrecio, 'codigo' => $codigoActual, 'vuelo_id' => $request->session()->get('add_vuelo_id')]);
            $seat->save();
            $x++;
            $codigoActual++;
          }
          return view('Administration/admAsientos', ['asientos' => $request->session()->get('add_vuelo_asientos'), 'regErr' => 'Se han agregado los asientos al vuelo.']);
        }
    }

    public function adminHotelView(Request $request){
      $hoteles = Hotel::All();
      return view('Administration/admHoteles', ['hoteles' => $hoteles, 'regErr' => '', 'regErr2' => '']);
    }

    public function adminHotelAdd(Request $request){
      $hotelNombre = $request->get('name');
      $hotelDireccion = $request->get('address');
      $hotelTelefono = $request->get('phone');
      $hotelPais = $request->get('country');
      $hotelCiudad = $request->get('city');
      $hotelWeb = $request->get('web');

      if($hotelNombre == NULL || $hotelDireccion == NULL || $hotelTelefono == NULL || $hotelPais == NULL || $hotelCiudad == NULL || $hotelWeb == NULL){
        $hoteles = Hotel::All();
        return view('Administration/admHoteles', ['hoteles' => $hoteles, 'regErr' => '', 'regErr2' => 'Uno o mas campos no han sido llenados.']);
      }
      else{
        $hotel = new Hotel;
        $hotel->fill(['nombre' => $hotelNombre, 'direccion' => $hotelDireccion,
                      'telefono' => $hotelTelefono, 'ciudad' => $hotelCiudad,
                      'pais' => $hotelPais, 'webpage' => $hotelWeb,
                      'created_at' => now(), 'calificacion' => 5, 'activo' => false]);
        $created = $hotel->save();
        if($created){
          $hoteles = Hotel::All();
          return view('Administration/admHoteles', ['hoteles' => $hoteles, 'regErr2' => 'Hotel '.$request->get('hotelName').' agregado correctamente. Agregue habitaciones para que se active el hotel.', 'regErr' => '']);
        }
        else{
          $hoteles = Hotel::All();
          return view('Administration/admHoteles', ['hoteles' => $hoteles, 'regErr2' => 'Error: hotel no se pudo agregar.', 'regErr' => '']);
        }
      }
    }

    public function adminHotelDisable(Request $request){
      $hotel = Hotel::where('nombre', $request->get('disableHotel'))->first();
      if($hotel->activo){
        $hotel->activo = false;
        $hotel->save();
        $hoteles = Hotel::All();
        return view('Administration/admHoteles', ['hoteles' => $hoteles, 'regErr' => 'Hotel '.$request->get('disableHotel').' se ha desactivado.', 'regErr2' => '']);
      }
      else{
        $hotel->activo = true;
        $hotel->save();
        $hoteles = Hotel::All();
        return view('Administration/admHoteles', ['hoteles' => $hoteles, 'regErr' => 'Hotel '.$request->get('disableHotel').' se ha activado.', 'regErr2' => '']);
      }
    }

    public function adminHabitacionView(Request $request){
      $hoteles = Hotel::All();
      return view('Administration/admHabitaciones', ['hoteles' => $hoteles, 'regErr' => '']);
    }

    public function adminHabitacionHotelView(Request $request){
      $hotel = Hotel::where('id', $request->get('hotel'))->first();
      $habitaciones = Habitacion::where('hotel_id', $hotel->id)->get();
      $request->session()->put('add_hotel_id', $hotel->id);
      $request->session()->put('add_hotel_nombre', $hotel->nombre);
      return view('Administration/admHabitacionHotel', ['habitaciones' => $habitaciones, 'hotel' => $hotel->nombre, 'regErr' => '', 'regErr2' => '']);
    }

    public function adminHabitacionHotelDisable(Request $request){
      $habitacion = Habitacion::where('id', $request->get('habitacionId'))->first();
      if($habitacion->activo){
        $habitacion->activo = false;
        $habitacion->save();
        $habitaciones = Habitacion::where('hotel_id', $request->session()->get('add_hotel_id'))->get();
        return view('Administration/admHabitacionHotel', ['habitaciones' => $habitaciones, 'hotel' => $request->session()->get('add_hotel_nombre'), 'regErr' => 'La habitacion se ha desactivado.', 'regErr2' => '']);
      }
      else{
        $habitacion->activo = true;
        $habitacion->save();
        $habitaciones = Habitacion::where('hotel_id', $request->session()->get('add_hotel_id'))->get();
        return view('Administration/admHabitacionHotel', ['habitaciones' => $habitaciones, 'hotel' => $request->session()->get('add_hotel_nombre'), 'regErr' => 'La habitacion se ha activado.', 'regErr2' => '']);
      }
    }

    public function adminHabitacionHotelAdd(Request $request){
      $habNumero = $request->get('number');
      $habCapacidad = $request->get('capacity');
      $habPrecio = $request->get('price');
      $habCama = $request->get('bed');
      $habCategoria = $request->get('category');

      if($habNumero == NULL || $habCapacidad == NULL || $habPrecio == NULL || $habCama == NULL || $habCategoria == NULL){
        $habitaciones = Habitacion::where('hotel_id', $request->session()->get('add_hotel_id'))->get();
        return view('Administration/admHabitacionHotel', ['habitaciones' => $habitaciones, 'hotel' => $request->session()->get('add_hotel_nombre'), 'regErr' => '', 'regErr2' => 'Uno o mas campos estan vacios.']);
      }
      else{
        $habitacion = new Habitacion;
        $habitacion->fill(['numero' => $habNumero, 'capacidad' => $habCapacidad,
                           'disponibilidad' => true, 'tipo_cama' => $habCama,
                           'categoria' => $habCategoria, 'precio' => $habPrecio,
                           'activo' => true, 'hotel_id' => $request->session()->get('add_hotel_id'),
                           'created_at' => now()]);
        $created = $habitacion->save();
        if($created){
          $hotel = Hotel::where('id', $request->session()->get('add_hotel_id'))->first();
          $hotel->activo = true;
          $hotel->save();
          $habitaciones = Habitacion::where('hotel_id', $request->session()->get('add_hotel_id'))->get();
          return view('Administration/admHabitacionHotel', ['habitaciones' => $habitaciones, 'hotel' => $request->session()->get('add_hotel_nombre'), 'regErr' => '', 'regErr2' => 'Habitación agregada correctamente al hotel '.$request->session()->get('add_hotel_nombre')]);
        }
        else{
          $habitaciones = Habitacion::where('hotel_id', $request->session()->get('add_hotel_id'))->get();
          return view('Administration/admHabitacionHotel', ['habitaciones' => $habitaciones, 'hotel' => $request->session()->get('add_hotel_nombre'), 'regErr' => '', 'regErr2' => 'Error: Habitación no se pudo agregar.']);
        }
      }
    }

    public function adminAutomotoraView(Request $request){
      $automotoras = Compania_alquiler::All();
      return view('Administration/admAutomotora', ['automotoras' => $automotoras, 'regErr' => '', 'regErr2' => '']);
    }

    public function adminAutomotoraDisable(Request $request){
      $automotora = Compania_alquiler::where('id', $request->get('automotoraId'))->first();
      if($automotora->activo){
        $automotora->activo = false;
        $automotora->save();
        $automotoras = Compania_alquiler::All();
        return view('Administration/admAutomotora', ['automotoras' => $automotoras, 'regErr' => 'Automotora '.$automotora->nombre.' ha sido desactivada.', 'regErr2' => '']);
      }
      else{
        $automotora->activo = true;
        $automotora->save();
        $automotoras = Compania_alquiler::All();
        return view('Administration/admAutomotora', ['automotoras' => $automotoras, 'regErr' => 'Automotora '.$automotora->nombre.' ha sido activada.', 'regErr2' => '']);
      }
    }

    public function adminAutomotoraAdd(Request $request){
      $autoNombre = $request->get('name');
      $autoDireccion = $request->get('address');
      $autoTelefono = $request->get('phone');
      $autoWeb = $request->get('webpage');
      $autoCiudad = $request->get('city');
      $autoPais = $request->get('country');

      if($autoNombre == NULL || $autoDireccion == NULL || $autoTelefono == NULL || $autoWeb == NULL || $autoCiudad == NULL || $autoPais == NULL){
        $automotoras = Compania_alquiler::All();
        return view('Administration/admAutomotora', ['automotoras' => $automotoras, 'regErr' => '', 'regErr2' => 'Uno o mas campos están vacios.']);
      }
      else{
        $automotora = new Compania_alquiler;
        $automotora->fill(['nombre' => $autoNombre, 'direccion' => '$autoDireccion',
                           'telefono' => $autoTelefono, 'ciudad' => $autoCiudad,
                           'pais' => $autoPais, 'webpage' => $autoWeb, 'activo' => false,
                           'created_at' => now()]);
        $created = $automotora->save();
        if($created){
          $automotoras = Compania_alquiler::All();
          return view('Administration/admAutomotora', ['automotoras' => $automotoras, 'regErr' => '', 'regErr2' => 'Automotora '.$autoNombre.' agregada correctamente.']);
        }
        else{
          $automotoras = Compania_alquiler::All();
          return view('Administration/admAutomotora', ['automotoras' => $automotoras, 'regErr' => '', 'regErr2' => 'Automotora '.$autoNombre.' no se pudo agregar.']);
        }
      }
    }

    public function adminVehiculoView(Request $request){
      return view('Administration/admVehiculo');
    }
}
