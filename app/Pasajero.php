<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
  protected $table = 'pasajero';
  protected $nombre;
  protected $apellido_paterno;
  protected $apellido_materno;
  protected $fecha_nacimiento;
  protected $telefono;
  protected $nacionalidad;
  protected $pasaporte;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento',
    'telefono', 'nacionalidad', 'pasaporte',
  ];

  public function asiento()
  {
      return $this->belongsTo('App\Asiento');
  }

  public function seguros()
  {
      return $this->belongsToMany('App\Seguros');
  }
}
