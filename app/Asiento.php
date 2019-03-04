<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
  protected $table = 'asientos';
    protected $numero;
    protected $tipo;
    protected $disponibilidad;
    protected $precio;
    protected $comprado;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'numero', 'tipo', 'disponibilidad', 'precio', 'comprado',
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
