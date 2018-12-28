<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
  protected $table = 'transaccions';
  
    protected $descripcion;

  protected $fillable = [
      'descripcion',
  ];

  public function auditoria()
  {
      return $this->hasMany('App\Auditoria');
  }

}
