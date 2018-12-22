<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compania_alquiler extends Model
{
  protected $table = 'compania_alquilers';
    protected $nombre;
    protected $direccion;
    protected $telefono;
    protected $ciudad;
    protected $pais;
    protected $webpage;
    protected $activo;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'pais', 'webpage', 'activo',
  ];

  public function vehiculos()
  {
      return $this->hasMany('App\Vehiculo');
  }
}
