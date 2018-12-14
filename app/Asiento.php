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

  //atributos que pueden ser rellenables
  protected $fillable=[
    'numero', 'tipo', 'disponibilidad', 'precio',
  ];

  public function vuelo()
  {
      return $this->belongsTo('App\Vuelo');
  }

  public function pasajero()
  {
      return $this->hasOne('App\Pasajero');
  }
}
