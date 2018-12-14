<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  protected $table = 'hotel';
  protected $nombre;
  protected $direccion;
  protected $telefono;
  protected $ciudad;
  protected $calificacion;
  protected $direccion_web;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'calificacion', 'direccion_web',
  ];

  public function habitacions()
  {
      return $this->hasMany('App\Habitacion');
  }
}
