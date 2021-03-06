<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
  protected $table = 'paquetes';
    protected $pais_destino;
    protected $ciudad_destino;
    protected $precio;
    protected $descuento;
    protected $cupos;
    protected $disponibilidad;
    protected $posee_vehiculo;
    protected $posee_hotel;
    protected $posee_seguro;
    protected $vuelo_id;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'pais_destino','ciudad_destino', 'precio', 'descuento', 'cupos', 'disponibilidad',
    'posee_vehiculo', 'posee_hotel', 'posee_seguro', 'image', 'vuelo_id'
  ];

  public function vuelo()
  {
      return $this->belongsTo('App\Vuelo');
  }

  public function reservas()
  {
      return $this->belongsToMany('App\Reserva')->withPivot('fecha_inicio', 'fecha_termino');
  }

  public function vehiculos()
  {
      return $this->belongsToMany('App\Vehiculo')->withPivot('dias', 'noches');
  }

  public function habitacions()
  {
      return $this->belongsToMany('App\Habitacion')->withPivot('dias', 'noches');
  }

  public function servicios()
  {
      return $this->belongsToMany('App\Servicio');
  }
}
