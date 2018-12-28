<?php

use Illuminate\Database\Seeder;

class paquete_servicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('paquete_servicio')->insert(
          [
            'paquete_id' => App\Paquete::select('id')->inRandomOrder()->first()->id,
            'servicio_id' => App\Servicio::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }  
    }
}
