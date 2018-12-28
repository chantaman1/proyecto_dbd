<?php

use Illuminate\Database\Seeder;

class pasajero_seguroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('pasajero_seguro')->insert(
          [
            'pasajero_id' => App\Pasajero::select('id')->inRandomOrder()->first()->id,
            'seguro_id' => App\Seguro::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
