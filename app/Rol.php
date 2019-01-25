<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
      protected $tipo;

    protected $fillable = [
        'tipo',
    ];

    public function usuarios(){
        return $this->belongsToMany('app\User');
    }
}
