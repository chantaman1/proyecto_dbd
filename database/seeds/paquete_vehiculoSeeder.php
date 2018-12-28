<?php

use Illuminate\Database\Seeder;

class paquete_vehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('paquete_vehiculo')->insert(
          [
            'paquete_id' => App\Paquete::select('id')->inRandomOrder()->first()->id,
            'vehiculo_id' => App\Vehiculo::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
