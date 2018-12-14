<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metodo_pago extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'nombre','tipo',
  ];

  public function usuarios()
  {
      return $this->belongsToMany('App\Usuario');
  }

  public function comprobante_pagos()
  {
      return $this->hasMany('App\Comprobante_pago');
  }
}
