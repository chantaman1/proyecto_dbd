<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
  protected $table = 'habitacion';
  protected $numero;
  protected $capacidad;
  protected $disponibilidad;
  protected $tipo_cama;
  protected $categoria;
  protected $precio;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'numero', 'capacidad', 'disponibilidad', 'tipo_cama', 'categoria', 'precio',
  ];

  public function reservas()
  {
      return $this->belongsToMany('App\Reserva')->withPivot('fecha_inicio','fecha_termino');
  }

  public function paquetes()
  {
      return $this->belongsToMany('App\Paquete')->withPivot('fecha_inicio','fecha_termino');
  }

  public function hotel()
  {
      return $this->belongsTo('App\Hotel');
  }
}
