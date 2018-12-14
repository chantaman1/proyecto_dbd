<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
  protected $table = 'auditorias';
    protected $tipo_transaccion;
    protected $fecha;
    protected $hora;

  //atributos que pueden ser rellenables
  protected $fillable=[
    'tipo_transaccion', 'fecha', 'hora',
  ];

  //la auditoria pertenece a un usuario
  public function usuario()
  {
      return $this->belongsTo(Usuario::class);
  }
}
