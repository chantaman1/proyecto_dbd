<?php

use Illuminate\Database\Seeder;

class comprobante_pagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comprobante_pago::class, 100)->create();
    }
}
