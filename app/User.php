<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
       protected $nombre;
       protected $apellido_paterno;
       protected $apellido_materno;
       protected $fecha_nacimiento;
       protected $direccion;
       protected $telefono;
       protected $email;
       protected $nacionalidad;
       protected $pasaporte;
       protected $verified;
       protected $email_token;

       protected $fillable = [
           'nombre', 'apellido_paterno', 'apellido_materno',
           'password', 'fecha_nacimiento', 'direccion',
           'telefono', 'email', 'nacionalidad', 'pasaporte', 'facebook_id',
           'verified', 'email_token',
       ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
      protected $hidden = [
          'password', 'remember_token',
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
