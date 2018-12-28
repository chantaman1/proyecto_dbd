<?php

use Illuminate\Database\Seeder;

class habitacion_reservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('habitacion_reserva')->insert(
          [
            'habitacion_id' => App\Habitacion::select('id')->inRandomOrder()->first()->id,
            'reserva_id' => App\Reserva::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
