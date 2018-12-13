<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'codigo', 'tipo', 'ciudad_origen', 'pais_origen', 'ciudad_destino'
    'pais_destino', 'fecha', 'hora'
  ];

  public function reservas()
  {
      return $this->belongsToMany('App\Reserva');
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
