<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante_pago extends Model
{
  protected $table = 'comprobante_pagos';
    protected $total_pagado;
    protected $descripcion_pago;
    protected $reserva_id;
    protected $metodo_pago_id;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'total_pagado','descripcion_pago', 'reserva_id', 'metodo_pago_id',
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
