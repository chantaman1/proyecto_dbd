<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  protected $table = 'vehiculo';
    protected $marca;
    protected $modelo;
    protected $año;
    protected $precio;
    protected $cantidad_asientos;
    protected $tipo_transmision;
    protected $descripcion;

  protected $fillable = [
      'marca', 'modelo', 'año', 'precio', 'cantidad_asientos',
      'tipo_transmision', 'descripcion',
  ];

  public function reservas(){
    return $this->belongsToMany('app\Reserva')->withPivot('hora_inicio','fecha_inicio','hora_termino','fecha_termino');
  }

  public function paquetes(){
    return $this->belongsToMany('app\Paquete')->withPivot('hora_inicio','fecha_inicio','hora_termino','fecha_termino');
  }

  public function rols(){
    return $this->belongsToMany('app\Rol');
  }

  public function compania_alquiler(){
    return $this->belongsTo('app\Compania_alquiler');
  }
}
