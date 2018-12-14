<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
  //llave primaria
  protected $primaryKey = 'id';

  //atributos que pueden ser rellenables
  protected $fillable=[
    'tipo_transaccion', 'fecha', 'hora',
  ];

  //la auditoria pertenece a un usuario
  public function usuario()
  {
      return $this->belongsTo('App\Usuario');
  }
}
