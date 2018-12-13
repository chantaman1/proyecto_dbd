<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'numero', 'capacidad', 'disponibilidad', 'tipo_cama', 'categoria', 'precio'
  ];

  public function reservas()
  {
      return $this->belongsToMany('App\Reserva');
  }

  public function paquetes()
  {
      return $this->belongsToMany('App\Paquete');
  }

  public function hotel()
  {
      return $this->belongsTo('App\Hotel');
  }
}
