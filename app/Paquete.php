<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
  protected $table = 'paquete';
    protected $pais_destino;
    protected $ciudad_destino;
    protected $precio;
    protected $descuento;
    protected $disponibilidad;
    protected $posee_vehiculo;
    protected $posee_hotel;
    protected $posee_seguro;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'pais_destino','ciudad_destino', 'precio', 'descuento', 'disponibilidad',
    'posee_vehiculo', 'posee_hotel', 'posee_seguro',
  ];

  public function vuelo()
  {
      return $this->belongsTo('App\Vuelo');
  }

  public function reservas()
  {
      return $this->belongsToMany('App\Reserva');
  }

  public function vehiculos()
  {
      return $this->belongsToMany('App\Vehiculo')->withPivot('hora_inicio','fecha_inicio','hora_termino','fecha_termino');
  }

  public function habitacions()
  {
      return $this->belongsToMany('App\Habitacion')->withPivot('fecha_inicio','fecha_termino');
  }

  public function servicios()
  {
      return $this->belongsToMany('App\Servicio');
  }
}
