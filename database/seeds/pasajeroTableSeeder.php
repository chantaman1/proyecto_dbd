<?php

use Illuminate\Database\Seeder;

class pasajeroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pasajero::class, 100)->create();
    }
}
