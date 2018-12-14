<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'total_pagado' => $faker->numberBetween(10000,20000000),
        'descripcion_pago' => $faker->text,
        'fecha' => $faker->date,
        'hora' => $faker->time($format = 'H:i:s'),
    ];
});
