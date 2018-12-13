<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre', 'direccion', 'telefono', 'ciudad', 'pais', 'direccion_web'
  ];

  public function seguros()
  {
      return $this->hasMany('App\Seguro');
  }
}
