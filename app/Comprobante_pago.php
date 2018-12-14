<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante_pago extends Model
{
  protected $table = 'comprobante_pagos';
    protected $total_pagado;
    protected $descripcion_pago;
    protected $fecha;
    protected $hora;

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
