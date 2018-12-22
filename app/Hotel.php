<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  protected $table = 'hotels';
    protected $nombre;
    protected $direccion;
    protected $telefono;
    protected $ciudad;
    protected $calificacion;
    protected $direccion_web;
    protected $activo;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'calificacion', 'direccion_web', 'activo',
  ];

  public function habitacions()
  {
      return $this->hasMany('App\Habitacion');
  }
}
