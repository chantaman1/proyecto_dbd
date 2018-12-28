<?php

use Illuminate\Database\Seeder;


class aeropuerto_vueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('aeropuerto_vuelo')->insert(
          [
            'aeropuerto_id' => App\Aeropuerto::select('id')->inRandomOrder()->first()->id,
            'vuelo_id' => App\Vuelo::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }  
    }
}
