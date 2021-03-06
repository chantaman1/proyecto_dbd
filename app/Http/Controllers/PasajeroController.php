<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pasajero;
use App\Asiento;
use App\Seguro;
use Auth;
use Illuminate\Support\Facades\Route;
class PasajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request->get('codigo') == NULL || $request->get('id') == NULL || $request->get('precio') == NULL || $request->get('tipo') == NULL){
        return redirect('/');
      }
      else if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 1){
        $request->session()->put('vuelta_asiento_codigo', $request->get('codigo'));
        $request->session()->put('vuelta_asiento_id', $request->get('id'));
        $request->session()->put('vuelta_asiento_precio', $request->get('precio'));
        $request->session()->put('vuelta_asiento_tipo', $request->get('tipo'));
        $this->updateSeat($request->get('id'));
        if($request->session()->get('pasajeroActual') > $request->session()->get('totalPasajeros')){
          $request->session()->put('pasoActual', 2);
          return view('passengerFlight');
        }
        else{
          return view('passengerFlight');
        }
      }
      else if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 0){
        $request->session()->put('ida_asiento_codigo', $request->get('codigo'));
        $request->session()->put('ida_asiento_id', $request->get('id'));
        $request->session()->put('ida_asiento_precio', $request->get('precio'));
        $request->session()->put('ida_asiento_tipo', $request->get('tipo'));
        $this->updateSeat($request->get('id'));
        if($request->session()->get('pasajeroActual') > $request->session()->get('totalPasajeros')){
          $request->session()->put('pasoActual', 1);
          $request->session()->put('pasajeroActual', 1);
          return redirect('/results');
        }
        else{
          return view('passengerFlight');
        }
      }
      else if($request->session()->get('idaVuelta') == false){
        $request->session()->put('ida_asiento_codigo', $request->get('codigo'));
        $request->session()->put('ida_asiento_id', $request->get('id'));
        $request->session()->put('ida_asiento_precio', $request->get('precio'));
        $request->session()->put('ida_asiento_tipo', $request->get('tipo'));
        $this->updateSeat($request->get('id'));
        return view('passengerFlight');
      }
      else{
        return view('index');
      }
    }

    public function saveData(Request $request)
    {
      if(Auth::check()){
        if($request->session()->get('pasajeroActual') > $request->session()->get('totalPasajeros')){
            $total = 0;
            foreach($request->session()->get('passengers') as $passenger){
              $total = $total + intval($passenger->asiento_precio);
            }
            return view('buyFlight')->with('data', $request->session()->get('passengers'))->with('total', $total);
        }
        else{
          if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 0){
            $passengerData = (object)['tipo_viaje' => 'IDA', 'nombre' => $request->get('nombre'), 'apellido_paterno' => $request->get('apellido_paterno'),
                                      'apellido_materno' => $request->get('apellido_materno'), 'correo' => $request->get('correo'),
                                      'fecha_nacimiento' => $request->get('fecha_nacimiento'), 'telefono' => $request->get('telefono'),
                                      'nacionalidad' => $request->get('nacionalidad'), 'pasaporte' => $request->get('pasaporte'),
                                      'asiento_id' => $request->session()->get('ida_asiento_id'), 'asiento_codigo' => $request->session()->get('ida_asiento_codigo'),
                                      'asiento_precio' => $request->session()->get('ida_asiento_precio'), 'asiento_tipo' => $request->session()->get('ida_asiento_tipo'),
                                      'origen' => $request->session()->get('ida_ciudad_origen'), 'destino' => $request->session()->get('ida_ciudad_destino')];
            $request->session()->push('passengers', $passengerData);
            $request->session()->put('pasajeroActual', $request->session()->get('pasajeroActual') + 1);
            if($request->session()->get('pasajeroActual') > $request->session()->get('totalPasajeros')){
              $request->session()->put('pasoActual', 1);
              $request->session()->put('pasajeroActual', 1);
              return redirect('/results');
            }
            else{
              return redirect('/selecAsiento?id='.$request->session()->get('id_vuelo').'&destino='.$request->session()->get('ida_ciudad_destino'));
            }
          }
          else if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 1){
            $passengerData = (object)['tipo_viaje' => 'REGRESO', 'nombre' => $request->get('nombre'), 'apellido_paterno' => $request->get('apellido_paterno'),
                                      'apellido_materno' => $request->get('apellido_materno'), 'correo' => $request->get('correo'),
                                      'fecha_nacimiento' => $request->get('fecha_nacimiento'), 'telefono' => $request->get('telefono'),
                                      'nacionalidad' => $request->get('nacionalidad'), 'pasaporte' => $request->get('pasaporte'),
                                      'asiento_id' => $request->session()->get('vuelta_asiento_id'), 'asiento_codigo' => $request->session()->get('vuelta_asiento_codigo'),
                                      'asiento_precio' => $request->session()->get('vuelta_asiento_precio'), 'asiento_tipo' => $request->session()->get('vuelta_asiento_tipo'),
                                      'origen' => $request->session()->get('vuelta_ciudad_origen'), 'destino' => $request->session()->get('vuelta_ciudad_destino')];
            $request->session()->push('passengers', $passengerData);
            $request->session()->put('pasajeroActual', $request->session()->get('pasajeroActual') + 1);
            if($request->session()->get('pasajeroActual') > $request->session()->get('totalPasajeros')){
              $total = 0;
              foreach($request->session()->get('passengers') as $passenger){
                $total = $total + intval($passenger->asiento_precio);
              }
              return view('buyFlight')->with('data', $request->session()->get('passengers'))->with('total', $total);
            }
            else{
              return redirect('/selecAsiento?id='.$request->session()->get('id_vuelo').'&destino='.$request->session()->get('vuelta_ciudad_destino'));
            }
          }
          else if($request->session()->get('idaVuelta') == false && $request->session()->get('pasoActual') == 0){
            $passengerData = (object)['tipo_viaje' => 'IDA', 'nombre' => $request->get('nombre'), 'apellido_paterno' => $request->get('apellido_paterno'),
                                      'apellido_materno' => $request->get('apellido_materno'), 'correo' => $request->get('correo'),
                                      'fecha_nacimiento' => $request->get('fecha_nacimiento'), 'telefono' => $request->get('telefono'),
                                      'nacionalidad' => $request->get('nacionalidad'), 'pasaporte' => $request->get('pasaporte'),
                                      'asiento_id' => $request->session()->get('ida_asiento_id'), 'asiento_codigo' => $request->session()->get('ida_asiento_codigo'),
                                      'asiento_precio' => $request->session()->get('ida_asiento_precio'), 'asiento_tipo' => $request->session()->get('ida_asiento_tipo'),
                                      'origen' => $request->session()->get('ida_ciudad_origen'), 'destino' => $request->session()->get('ida_ciudad_destino')];
            $request->session()->push('passengers', $passengerData);
            $request->session()->put('pasajeroActual', $request->session()->get('pasajeroActual') + 1);
            if($request->session()->get('pasajeroActual') > $request->session()->get('totalPasajeros')){
              $total = 0;
              foreach($request->session()->get('passengers') as $passenger){
                $total = $total + intval($passenger->asiento_precio);
              }
              return view('buyFlight')->with('data', $request->session()->get('passengers'))->with('total', $total);
            }
            else{
              return redirect('/selecAsiento?id='.$request->session()->get('id_vuelo').'&destino='.$request->session()->get('ida_ciudad_destino'));
            }
          }
        }
      }
      else{
        return redirect('/login');
      }
    }

    public function addPassengerView(Request $request){
      return view('passengerFlight');
    }

    public function addPassenger(Request $request){
      if($request->session()->get('pasajeroActual') < $request->session()->get('totalPasajeros')){
        $passengerData = (object)['nombre' => $request->get('nombre'), 'apellido_paterno' => $request->get('apellido_paterno'),
                                  'apellido_materno' => $request->get('apellido_materno'), 'correo' => $request->get('correo'),
                                  'fecha_nacimiento' => $request->get('fecha_nacimiento'), 'telefono' => $request->get('telefono'),
                                  'nacionalidad' => $request->get('nacionalidad'), 'pasaporte' => $request->get('pasaporte'),
                                  'seguro' => $request->get('seguro')];
        $request->session()->push('passengers', $passengerData);
        $request->session()->put('pasajeroActual', $request->session()->get('pasajeroActual') + 1);
        return app('App\Http\Controllers\AsientoController')->getGoFlightSeat($request);
      }
      else{
        $passengerData = (object)['nombre' => $request->get('nombre'), 'apellido_paterno' => $request->get('apellido_paterno'),
                                  'apellido_materno' => $request->get('apellido_materno'), 'correo' => $request->get('correo'),
                                  'fecha_nacimiento' => $request->get('fecha_nacimiento'), 'telefono' => $request->get('telefono'),
                                  'nacionalidad' => $request->get('nacionalidad'), 'pasaporte' => $request->get('pasaporte'),
                                  'seguro' => $request->get('seguro')];
        $request->session()->push('passengers', $passengerData);
        $request->session()->put('pasajeroActual', $request->session()->get('pasajeroActual') + 1);
        if($request->session()->get('tipoViaje') == 'both'){
          if($request->session()->get('esPaquete') == 'true'){
            $x = 0;
            $lengthAsientosIda = count($request->session()->get('asientosIda'));
            $lengthAsientosRegreso = count($request->session()->get('asientosRegreso'));
            $dataAsientosIda = array();
            $dataAsientosRegreso = array();
            $totalPagar = 0;
            $totalSeguro = 0;
            while($x < $lengthAsientosIda){
              $asiento = Asiento::find($request->session()->get('asientosIda')[$x]);
              array_push($dataAsientosIda, $asiento);
              $totalPagar = $totalPagar + $asiento->precio;
              $x++;
            }
            $x = 0;
            while($x < $lengthAsientosRegreso){
              $asiento = Asiento::find($request->session()->get('asientosRegreso')[$x]);
              array_push($dataAsientosRegreso, $asiento);
              $totalPagar = $totalPagar + $asiento->precio;
              $x++;
            }
            foreach($request->session()->get('passengers') as $passenger){
              if($passenger->seguro == 'true'){
                $totalSeguro = $totalSeguro + 29990;
              }
            }
            $request->session()->put('seguro_total_pagar', $totalSeguro);
            $request->session()->put('vuelo_total_pagar', $request->session()->get('get_paquete')->precio);
            $request->session()->put('total_pagar', $request->session()->get('get_paquete')->precio + $totalSeguro);
            return view('buyFlight', ['asientosIda' => $dataAsientosIda, 'asientosRegreso' => $dataAsientosRegreso,
                                      'pasajeros' => $request->session()->get('passengers'), 'total' => $request->session()->get('get_paquete')->precio,
                                      'tipoViaje' => $request->session()->get('tipoViaje'), 'totalSeguro' => $totalSeguro,
                                      'totalFinal' => $request->session()->get('get_paquete')->precio + $totalSeguro, 'esPaquete' => 'true']);
          }
          else{
            $x = 0;
            $lengthAsientosIda = count($request->session()->get('asientosIda'));
            $lengthAsientosRegreso = count($request->session()->get('asientosRegreso'));
            $dataAsientosIda = array();
            $dataAsientosRegreso = array();
            $totalPagar = 0;
            $totalSeguro = 0;
            while($x < $lengthAsientosIda){
              $asiento = Asiento::find($request->session()->get('asientosIda')[$x]);
              array_push($dataAsientosIda, $asiento);
              $totalPagar = $totalPagar + $asiento->precio;
              $x++;
            }
            $x = 0;
            while($x < $lengthAsientosRegreso){
              $asiento = Asiento::find($request->session()->get('asientosRegreso')[$x]);
              array_push($dataAsientosRegreso, $asiento);
              $totalPagar = $totalPagar + $asiento->precio;
              $x++;
            }
            foreach($request->session()->get('passengers') as $passenger){
              if($passenger->seguro == 'true'){
                $totalSeguro = $totalSeguro + 29990;
              }
            }
            $request->session()->put('seguro_total_pagar', $totalSeguro);
            $request->session()->put('vuelo_total_pagar', $totalPagar);
            $request->session()->put('total_pagar', $totalPagar + $totalSeguro);
            return view('buyFlight', ['asientosIda' => $dataAsientosIda, 'asientosRegreso' => $dataAsientosRegreso,
                                      'pasajeros' => $request->session()->get('passengers'), 'total' => $totalPagar,
                                      'tipoViaje' => $request->session()->get('tipoViaje'), 'totalSeguro' => $totalSeguro,
                                      'totalFinal' => $totalPagar + $totalSeguro, 'esPaquete' => '']);
          }
        }
        else{
          $x = 0;
          $lengthAsientosIda = count($request->session()->get('asientosIda'));
          $dataAsientosIda = array();
          $dataAsientosRegreso = array();
          $totalPagar = 0;
          $totalSeguro = 0;
          while($x < $lengthAsientosIda){
            $asiento = Asiento::find($request->session()->get('asientosIda')[$x]);
            array_push($dataAsientosIda, $asiento);
            $totalPagar = $totalPagar + $asiento->precio;
            $x++;
          }
          foreach($request->session()->get('passengers') as $passenger){
            if($passenger->seguro == 'true'){
              $totalSeguro = $totalSeguro + 29990;
            }
          }
          $request->session()->put('seguro_total_pagar', $totalSeguro);
          $request->session()->put('vuelo_total_pagar', $totalPagar);
          $request->session()->put('total_pagar', $totalPagar + $totalSeguro);
          return view('buyFlight', ['asientosIda' => $dataAsientosIda, 'asientosRegreso' => $dataAsientosRegreso,
                                    'pasajeros' => $request->session()->get('passengers'), 'total' => $totalPagar,
                                    'tipoViaje' => $request->session()->get('tipoViaje'), 'totalSeguro' => $totalSeguro,
                                    'totalFinal' => $totalPagar + $totalSeguro, 'esPaquete' => '']);
        }
      }
    }

    public function buscar_pasajero(Request $request){
      $pasajero = Pasajero::where('nombre',$request->get('nombre'))
        ->where('apellido_paterno',$request->get('apellido'))
        ->where('pasaporte',$request->get('pasaporte'))->first();
      if($pasajero == NULL){
          return back()->withInput();
      }
      else if(Auth::check() == false){
        return redirect('/login');
      }
      else{
        $seguro = Seguro::find($request->session()->get('seguro_id'));
        $request->session()->put('seguro_pasajero_id', $pasajero->id);
        return view('pago_seguro')->with('pasajero',$pasajero)->with('seguro',$seguro);
      }
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
    public function store($passenger, $asiento_id)
    {
        $pasajero = new Pasajero;
        $pasajero->fill(array('nombre' => $passenger->nombre,
                              'apellido_paterno' => $passenger->apellido_paterno,
                              'apellido_materno' => $passenger->apellido_materno,
                              'correo' => $passenger->correo,
                              'fecha_nacimiento' => $passenger->fecha_nacimiento,
                              'telefono' => $passenger->telefono,
                              'nacionalidad' => $passenger->nacionalidad,
                              'pasaporte' => $passenger->pasaporte,
                              'asiento_id' => $asiento_id));
        $pasajero->save();
        return $pasajero;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasajero = Pasajero::find($id);
        if($pasajero != NULL){
            return $pasajero;
        }
        else{
            return "Pasajero no existente.";
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
        $pasajero = Pasajero::find($id);
        if($pasajero != NULL){
          $pasajero->fill($request->all());
          $pasajero->save();
          return $pasajero;
        }
        else{
          return "No puede modificar un pasajero no existente.";
        }
    }

    public function updateSeat($id){
      $asiento = Asiento::find($id);
      if($asiento != NULL){
        if($asiento->disponibilidad == true){
          $asiento->disponibilidad = false;
          $asiento->save();
          return $asiento;
        }
        else{
          $asiento->disponibilidad = true;
          $asiento->save();
          return $asiento;
        }
      }
      else{
        return "No puede modificar un asiento no existente.";
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
      $pasajero = Pasajero::find($id);
      if($pasajero != NULL){
          $pasajero->delete();
          return "Pasajero eliminado.";
      }
      else{
          return "Pasajero no existente.";
      }
    }
}
