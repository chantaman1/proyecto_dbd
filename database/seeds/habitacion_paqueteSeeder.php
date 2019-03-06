<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class habitacion_paqueteSeeder extends Seeder
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
        DB::table('habitacion_paquete')->insert(
          [
            'dias' => 7,
            'noches' => 8,
            'habitacion_id' => App\Habitacion::select('id')->inRandomOrder()->first()->id,
            'paquete_id' => App\Paquete::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
