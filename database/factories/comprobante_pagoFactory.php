<?php

use Faker\Generator as Faker;

$factory->define(App\Comprobante_pago::class, function (Faker $faker) {
  $metodos_pago = App\Metodo_pago::all()->count();
  $reserva = App\Reserva::get()->random();
    return [
        'total_pagado' => $reserva->totalAPagar,
        'descripcion_pago' => $faker->text,
        'metodo_pago_id' => $faker->numberBetween($min = 1, $max = $metodos_pago),
        'reserva_id' => $reserva->id,
    ];
});
