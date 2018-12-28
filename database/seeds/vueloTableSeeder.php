<?php

use Illuminate\Database\Seeder;

class vueloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vuelo::class, 100)->create();
    }
}
