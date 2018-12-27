<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
  protected $table = 'aeropuertos';
    protected $nombre;
    protected $ciudad;
    protected $direccion;
    protected $pais;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'ciudad', 'direccion', 'pais',
  ];

  public function vuelos()
  {
      return $this->belongsToMany('App\Vuelo');
  }
}
