<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
      protected $nombre;
      protected $apellido_paterno;
      protected $apellido_materno;
      protected $password;
      protected $fecha_nacimiento;
      protected $direccion;
      protected $telefono;
      protected $correo;
      protected $nacionalidad;
      protected $pasaporte;

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
