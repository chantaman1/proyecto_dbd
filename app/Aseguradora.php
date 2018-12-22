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
    protected $webpage;
    protected $activo;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'pais', 'webpage', 'activo',
  ];

  public function seguros()
  {
      return $this->hasMany('App\Seguro');
  }
}
