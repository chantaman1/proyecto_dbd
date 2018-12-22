<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
  protected $table = 'aseguradoras';
    protected $nombre;
    protected $direccion;
    protected $telefono;
    protected $ciudad;
    protected $pais;
    protected $direccion_web;
    protected $activo;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'pais', 'direccion_web', 'activo',
  ];

  public function seguros()
  {
      return $this->hasMany('App\Seguro');
  }
}
