<?php

use Illuminate\Database\Seeder;

class habitacion_paqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('habitacion_paquete')->insert(
          [
            'habitacion_id' => App\Habitacion::select('id')->inRandomOrder()->first()->id,
            'paquete_id' => App\Paquete::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
