<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
  protected $table = 'pasajeros';
    protected $nombre;
    protected $apellido_paterno;
    protected $apellido_materno;
    protected $fecha_nacimiento;
    protected $correo;
    protected $telefono;
    protected $nacionalidad;
    protected $pasaporte;
    protected $asiento_id;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'apellido_paterno', 'apellido_materno', 'correo', 'fecha_nacimiento',
    'telefono', 'nacionalidad', 'pasaporte', 'asiento_id',
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
