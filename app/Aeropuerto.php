<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre',
  ];

  public function vuelos()
  {
      return $this->belongsToMany('App\Vuelo');
  }
}
