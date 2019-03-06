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
            'dias' => 7,
            'noches' => 8,
            'paquete_id' => App\Paquete::select('id')->inRandomOrder()->first()->id,
            'vehiculo_id' => App\Vehiculo::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
