<?php

use Illuminate\Database\Seeder;

class paquete_reservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('paquete_reserva')->insert(
          [
            'paquete_id' => App\Paquete::select('id')->inRandomOrder()->first()->id,
            'reserva_id' => App\Reserva::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
