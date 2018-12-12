<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //llave primaria
    protected $primaryKey = 'id';

    //atributos que pueden ser rellenables
    protected $fillable=[
      'fecha', 'hora', 'total_a_pagar', 'estado_pago'
    ];

    //la reserva tiene un comprobante de pago
    public function comprobante_pago()
    {
        return $this->hasOne('App\Comprobante_pago');
    }

    //la reserva tiene muchas habitaciones y la habitacion muchas reservas
    public function habitacions()
    {
        return $this->belongsToMany('App\Habitacion');
    }

    //la reserva tiene muchos vehiculos y el vehiculo muchas reservas
    public function vehiculos()
    {
        return $this->belongsToMany('App\Vehiculo');
    }

    //la reserva tiene muchos paquetes y el paquete muchas reservas
    public function paquetes()
    {
        return $this->belongsToMany('App\Paquete');
    }

    //la reserva tiene muchos vuelos y el vuelo muchas reservas
    public function vuelos()
    {
        return $this->belongsToMany('App\Vuelo');
    }

    //Consigue todos los modelos reservables propios
    public function usuario()
    {
        return $this->belongsTo('App\Usuario','id_usuario');
    }
}
