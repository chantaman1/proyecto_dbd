<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
      protected $totalAPagar;
      protected $estado_pago;
      protected $user_id;
      protected $reserva;

    //atributos que pueden ser rellenables
    protected $fillable=[
      'totalAPagar', 'estado_pago', 'user_id', 'reserva',
    ];

    //la reserva tiene un comprobante de pago
    public function comprobante_pago()
    {
        return $this->hasOne('App\Comprobante_pago');
    }

    //la reserva tiene muchas habitaciones y la habitacion muchas reservas
    public function habitacions()
    {
        return $this->belongsToMany('App\Habitacion')->withPivot('fecha_inicio','fecha_termino');
    }

    //la reserva tiene muchos vehiculos y el vehiculo muchas reservas
    public function vehiculos()
    {
        return $this->belongsToMany('App\Vehiculo')->withPivot('hora_inicio','fecha_inicio','hora_termino','fecha_termino');
    }

    //la reserva tiene muchos paquetes y el paquete muchas reservas
    public function paquetes()
    {
        return $this->belongsToMany('App\Paquete')->withPivot('fecha_inicio', 'fecha_termino');
    }

    //la reserva tiene muchos vuelos y el vuelo muchas reservas
    public function asientos()
    {
        return $this->belongsToMany('App\Asiento');
    }

    //la reserva pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
}
