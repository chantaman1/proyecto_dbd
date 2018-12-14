<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
      protected $tipo;

    protected $fillable = [
        'tipo',
    ];

    public function usuarios(){
        return $this->belongsToMany('app\Usuario');
    }
}
