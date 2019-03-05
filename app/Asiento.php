<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
  protected $table = 'asientos';
    protected $codigo;
    protected $tipo;
    protected $disponibilidad;
    protected $precio;
    protected $comprado;
    protected $vuelo_id;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'codigo', 'tipo', 'disponibilidad', 'precio', 'comprado', 'vuelo_id',
  ];

  public function vuelo()
  {
      return $this->belongsTo('App\Vuelo');
  }

  public function reserva()
  {
      return $this->belongsToMany('App\Reserva');
  }

  public function pasajero()
  {
      return $this->hasOne('App\Pasajero');
  }
}
