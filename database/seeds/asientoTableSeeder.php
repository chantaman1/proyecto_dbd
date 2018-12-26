<?php

use Illuminate\Database\Seeder;

class asientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Asiento::class, 500)->create();
    }
}
