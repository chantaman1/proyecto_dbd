<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'numero', 'capacidad', 'disponibilidad', 'tipo_cama', 'categoria', 'precio',
  ];

  public function habitacions()
  {
      return $this->hasMany('App\Hotel');
  }
}
