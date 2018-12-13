<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //llave primaria
    protected $primaryKey = 'id';

    protected $fillable = [
        'tipo',
    ];

    public function usuarios(){
        return $this->belongsToMany('app\Usuario');
    }
}
