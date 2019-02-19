<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pasajero;
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
        $request->session()->put('pasoActual', 2);
        return view('passengerFlight');
      }
      else if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 0){
        $request->session()->put('ida_asiento_codigo', $request->get('codigo'));
        $request->session()->put('ida_asiento_id', $request->get('id'));
        $request->session()->put('ida_asiento_precio', $request->get('precio'));
        $request->session()->put('ida_asiento_tipo', $request->get('tipo'));
        $request->session()->put('pasoActual', 1);
        return redirect('/results');
      }
      else if($request->session()->get('idaVuelta') == false){
        $request->session()->put('ida_asiento_codigo', $request->get('codigo'));
        $request->session()->put('ida_asiento_id', $request->get('id'));
        $request->session()->put('ida_asiento_precio', $request->get('precio'));
        $request->session()->put('ida_asiento_tipo', $request->get('tipo'));
        return view('passengerFlight');
      }
      else{
        return view('index');
      }
    }

    public function saveData(Request $request)
    {
      if($request->session()->get('pasajeroActual') > $request->session()->get('totalPasajeros')){
          $total = 0;
          foreach($request->session()->get('passengers') as $passenger){
            if($passenger->tipo_viaje == 'IDA'){
              $this->total = $this->total + intval($passenger->ida_asiento_precio);
            }
            else{
              $this->total = $this->total + intval($passenger->vuelta_asiento_precio);
            }
          }
          return view('buyFlight')->with('data', $request->session()->get('passengers'))->with('total', $total);
      }
      else{
        if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 0){
          $passengerData = (object)['tipo_viaje' => 'IDA', 'nombre' => $request->get('nombre'), 'apellido_paterno' => $request->get('apellido_paterno'),
                                    'apellido_materno' => $request->get('apellido_materno'), 'correo' => $request->get('correo'),
                                    'fecha_nacimiento' => $request->get('fecha_nacimiento'), 'telefono' => $request->get('telefono'),
                                    'nacionalidad' => $request->get('nacionalidad'), 'pasaporte' => $request->get('pasaporte'),
                                    'ida_asiento_id' => $request->session()->get('ida_asiento_id'), 'ida_asiento_codigo' => $request->session()->get('ida_asiento_codigo'),
                                    'ida_asiento_precio' => $request->session()->get('ida_asiento_precio'), 'ida_asiento_tipo' => $request->session()->get('ida_asiento_tipo')];
          $request->session()->push('passengers', $passengerData);
          $request->session()->put('pasajeroActual', $request->session()->get('pasajeroActual') + 1);
          return redirect('/selecAsiento?id='.$request->session()->get('id_vuelo_ida').'&destino='.$request->session()->get('ida_ciudad_destino'));
        }
        else if($request->session()->get('idaVuelta') && $request->session()->get('pasoActual') == 1){
          $passengerData = (object)['tipo_viaje' => 'REGRESO', 'nombre' => $request->get('nombre'), 'apellido_paterno' => $request->get('apellido_paterno'),
                                    'apellido_materno' => $request->get('apellido_materno'), 'correo' => $request->get('correo'),
                                    'fecha_nacimiento' => $request->get('fecha_nacimiento'), 'telefono' => $request->get('telefono'),
                                    'nacionalidad' => $request->get('nacionalidad'), 'pasaporte' => $request->get('pasaporte'),
                                    'vuelta_asiento_id' => $request->session()->get('vuelta_asiento_id'), 'vuelta_asiento_codigo' => $request->session()->get('vuelta_asiento_codigo'),
                                    'vuelta_asiento_precio' => $request->session()->get('vuelta_asiento_precio'), 'vuelta_asiento_tipo' => $request->session()->get('vuelta_asiento_tipo')];
          $request->session()->push('passengers', $passengerData);
          $request->session()->put('pasajeroActual', $request->session()->get('pasajeroActual') + 1);
          return redirect('/selecAsiento?id='.$request->session()->get('id_vuelo_vuelta').'&destino='.$request->session()->get('vuelta_ciudad_destino'));
        }
        else if($request->session()->get('idaVuelta') == false && $request->session()->get('pasoActual') == 0){
          $passengerData = (object)['tipo_viaje' => 'IDA', 'nombre' => $request->get('nombre'), 'apellido_paterno' => $request->get('apellido_paterno'),
                                    'apellido_materno' => $request->get('apellido_materno'), 'correo' => $request->get('correo'),
                                    'fecha_nacimiento' => $request->get('fecha_nacimiento'), 'telefono' => $request->get('telefono'),
                                    'nacionalidad' => $request->get('nacionalidad'), 'pasaporte' => $request->get('pasaporte'),
                                    'ida_asiento_id' => $request->session()->get('ida_asiento_id'), 'ida_asiento_codigo' => $request->session()->get('ida_asiento_codigo'),
                                    'ida_asiento_precio' => $request->session()->get('ida_asiento_precio'), 'ida_asiento_tipo' => $request->session()->get('ida_asiento_tipo')];
          $request->session()->push('passengers', $passengerData);
          $request->session()->put('pasajeroActual', $request->session()->get('pasajeroActual') + 1);
          return redirect('/selecAsiento?id='.$request->session()->get('id_vuelo_ida').'&destino='.$request->session()->get('ida_ciudad_destino'));
        }
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
    public function store(Request $request)
    {
        $pasajero = new Pasajero;
        $pasajero->fill(array('nombre' => $request->session()->get('nombre'),
                              'apellido_paterno' => $request->session()->get('apellido_paterno'),
                              'apellido_materno' => $request->session()->get('apellido_materno'),
                              'correo' => $request->session()->get('correo'),
                              'fecha_nacimiento' => $request->session()->get('fecha_nacimiento'),
                              'telefono' => $request->session()->get('telefono'),
                              'nacionalidad' => $request->session()->get('nacionalidad'),
                              'pasaporte' => $request->session()->get('pasaporte'),
                              'asiento_id' => $request->session()->get('asiento_id')));
        $pasajero->save();
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
