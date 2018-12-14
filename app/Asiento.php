<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

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
