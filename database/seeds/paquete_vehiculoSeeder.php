<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class paquete_vehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      for($i = 0; $i < 50; $i++){
        DB::table('paquete_vehiculo')->insert(
          [
            'fecha_inicio' => $faker->date,
            'hora_inicio' => $faker->time($format = 'H:i:s'),
            'fecha_termino' => $faker->date,
            'hora_termino' => $faker->time($format = 'H:i:s'),
            'paquete_id' => App\Paquete::select('id')->inRandomOrder()->first()->id,
            'vehiculo_id' => App\Vehiculo::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
