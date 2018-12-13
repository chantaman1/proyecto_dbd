<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nombre', 'apellido_paterno', 'apellido_materno',
        'password', 'fecha_nacimiento', 'direccion',
        'telefono', 'correo', 'nacionalidad', 'pasaporte',
    ];

    protected $hidden = [
        'password',
    ];

    public function rols(){
      return $this->belongsToMany('app\Rol');
    }

    //El usuario hace muchas reservas
    public function reservas()
    {
        return $this->hasMany('App\Reserva');
    }
}
