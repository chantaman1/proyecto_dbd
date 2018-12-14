<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
  protected $table = 'aerolinea';
  protected $nombre;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre',
  ];

  public function vuelos()
  {
      return $this->hasMany('App\Vuelo');
  }
}
