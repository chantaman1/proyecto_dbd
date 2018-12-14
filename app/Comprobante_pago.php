<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante_pago extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'total_pagado','descripcion_pago', 'fecha', 'hora',
  ];

  public function metodo_pago()
  {
      return $this->belongsTo('App\Metodo_pago');
  }

  public function reservas()
  {
      return $this->belongsTo('App\Reserva');
  }
}
