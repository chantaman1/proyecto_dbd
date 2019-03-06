<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
  protected $table = 'seguros';
    protected $tipo;
    protected $precio;
    protected $descripcion;
    protected $aseguradora_id;
    protected $activo;

  protected $fillable = [
      'tipo', 'precio', 'descripcion', 'activo', 'aseguradora_id',
  ];

  public function pasajeros(){
      return $this->belongsToMany('app\Pasajero');
  }

  public function aseguradora(){
      return $this->belongsTo('app\Aseguradora');
  }
}
