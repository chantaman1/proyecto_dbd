<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser accedidos a traves de http request
  protected $fillable=[
    'fecha', 'hora', 'total_a_pagar', 'estado_pago'
  ];
}
