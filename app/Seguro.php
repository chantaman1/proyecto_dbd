<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
  protected $table = 'seguro';
    protected $tipo;
    protected $precio;
    protected $descripcion;

  protected $fillable = [
      'tipo', 'precio', 'descripcion',
  ];

  public function pasajeros(){
      return $this->belongsToMany('app\Pasajero');
  }

  public function aseguradora(){
      return $this->belongsTo('app\Aseguradora');
  }
}
