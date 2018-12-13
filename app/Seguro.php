<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
  //llave primaria
  protected $primaryKey = 'id';
  
  protected $fillable = [
      'tipo', 'precio', 'descripcion'
  ];

  public function pasajeros(){
      return $this->belongsToMany('app\Pasajero');
  }

  public function aseguradora(){
      return $this->belongsTo('app\Aseguradora');
  }
}
