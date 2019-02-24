<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class reserva_asientoSeeder extends Seeder
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
        DB::table('reserva_asiento')->insert(
          [
            'cant_ninos' => $faker->numberBetween($min = 0, $max = 4),
            'cant_adultos' => $faker->numberBetween($min = 0, $max = 7),
            'reserva_id' => App\Reserva::select('id')->inRandomOrder()->first()->id,
            'asiento_id' => App\Asiento::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
