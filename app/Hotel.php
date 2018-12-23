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
    protected $pais;
    protected $calificacion;
    protected $webpage;
    protected $activo;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'pais', 'calificacion', 'webpage', 'activo',
  ];

  public function habitacions()
  {
      return $this->hasMany('App\Habitacion');
  }
}
