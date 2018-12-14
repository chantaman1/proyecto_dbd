<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania_alquiler extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'pais', 'direccion_web',
  ];

  public function vehiculos()
  {
      return $this->hasMany('App\Vehiculo');
  }
}
