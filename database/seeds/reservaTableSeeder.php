<?php

use Illuminate\Database\Seeder;

class reservaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Reserva::class, 20)->create();
    }
}
