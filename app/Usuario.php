<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  //El usuario hace muchas reservas
  public function reservas()
  {
      return $this->hasMany('App\Reserva', 'reservable');
  }
}
