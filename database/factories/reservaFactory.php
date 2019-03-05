<?php

use Faker\Generator as Faker;

$factory->define(App\Reserva::class, function (Faker $faker) {
  $count_usuarios = App\User::all()->count();
    return [
        'totalAPagar' => $faker->numberBetween($min = 400000, $max = 800000),
        'estado_pago' => "pagado",
        'user_id' => $faker->numberBetween($min = 1, $max = $count_usuarios),
        'reserva' => $faker->unique()->ean8,
    ];
});
