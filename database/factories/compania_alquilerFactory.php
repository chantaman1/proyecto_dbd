<?php

use Faker\Generator as Faker;

$factory->define(App\Compania_alquiler::class, function (Faker $faker) {
    $data = App\Paquete::inRandomOrder()->first();
    return [
        'nombre' => $faker->company,
        'direccion' => $faker->address,
        'telefono' => $faker->phoneNumber,
        'ciudad' => $data->ciudad_destino,
        'pais' => $data->pais_destino,
        'webpage' => 'www.examplecompany.com',
        'activo' => true,
    ];
});
