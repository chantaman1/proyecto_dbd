<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $primaryKey = 'id';

  protected $fillable = [
      'tipo', 'precio', 'descripcion'
  ];

  public function paquetes(){
      return $this->belongsToMany('app\Paquete');
  }

}
