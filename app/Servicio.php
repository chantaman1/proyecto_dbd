<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = 'servicio';
    protected $tipo;
    protected $precio;
    protected $descripcion;

  protected $fillable = [
      'tipo', 'precio', 'descripcion',
  ];

  public function paquetes(){
      return $this->belongsToMany('app\Paquete');
  }

}
