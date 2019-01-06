<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class habitacion_reservaSeeder extends Seeder
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
        DB::table('habitacion_reserva')->insert(
          [
            'fecha_inicio' => $faker->date,
            'fecha_termino' => $faker->date,
            'habitacion_id' => App\Habitacion::select('id')->inRandomOrder()->first()->id,
            'reserva_id' => App\Reserva::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
