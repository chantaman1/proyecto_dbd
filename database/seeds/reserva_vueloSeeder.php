<?php

use Illuminate\Database\Seeder;

class reserva_vueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('reserva_vuelo')->insert(
          [
            'reserva_id' => App\Reserva::select('id')->inRandomOrder()->first()->id,
            'vuelo_id' => App\Vuelo::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
