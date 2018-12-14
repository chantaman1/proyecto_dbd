<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania_alquiler extends Model
{
  protected $table = 'compania_alquiler';
  protected $nombre;
  protected $direccion;
  protected $telefono;
  protected $ciudad;
  protected $pais;
  protected $direccion_web;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'pais', 'direccion_web',
  ];

  public function vehiculos()
  {
      return $this->hasMany('App\Vehiculo');
  }
}
