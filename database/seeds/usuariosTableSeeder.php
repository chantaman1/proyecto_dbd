<?php

use Illuminate\Database\Seeder;

class usuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Usuario::class, 20)->create();
    }
}
