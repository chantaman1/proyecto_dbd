<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
  protected $table = 'vuelos';
    protected $codigo;
    protected $tipo;
    protected $ciudad_origen;
    protected $pais_origen;
    protected $ciudad_destino;
    protected $pais_destino;
    protected $fecha;
    protected $hora;
    protected $asientos;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'codigo', 'tipo', 'ciudad_origen', 'pais_origen', 'ciudad_destino',
    'pais_destino', 'fecha', 'hora', 'asientos',
  ];

  public function reservas()
  {
      return $this->belongsToMany('App\Reserva')->withPivot('cant_ninos','cant_adultos','cant_infantes');
  }

  public function aerolinea()
  {
      return $this->belongsTo('App\Aerolinea');
  }

  public function aeropuertos()
  {
      return $this->belongsToMany('App\Aeropuerto');
  }

  public function asientos()
  {
      return $this->hasMany('App\Asiento');
  }

  public function paquetes()
  {
      return $this->hasMany('App\Paquete');
  }
}
