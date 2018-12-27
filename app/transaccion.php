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

}
