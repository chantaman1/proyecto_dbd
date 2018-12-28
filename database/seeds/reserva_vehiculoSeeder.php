<?php

use Illuminate\Database\Seeder;

class reserva_vehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('reserva_vehiculo')->insert(
          [
            'reserva_id' => App\Reserva::select('id')->inRandomOrder()->first()->id,
            'vehiculo_id' => App\Vehiculo::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
