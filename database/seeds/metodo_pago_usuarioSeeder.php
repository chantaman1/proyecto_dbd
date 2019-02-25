<?php

use Illuminate\Database\Seeder;

class metodo_pago_usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('metodo_pago_usuario')->insert(
          [
            'metodo_pago_id' => App\Metodo_pago::select('id')->inRandomOrder()->first()->id,
            'user_id' => App\User::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
