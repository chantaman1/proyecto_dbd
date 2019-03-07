<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class asiento_reservaSeeder extends Seeder
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
          DB::table('asiento_reserva')->insert(
            [
              'asiento_id' => App\Asiento::select('id')->inRandomOrder()->first()->id,
              'reserva_id' => App\Reserva::select('id')->inRandomOrder()->first()->id,
            ]
          );
        }
    }
}
