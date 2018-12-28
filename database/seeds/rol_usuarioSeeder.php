<?php

use Illuminate\Database\Seeder;

class rol_usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 50; $i++){
        DB::table('rol_usuario')->insert(
          [
            'rol_id' => App\Rol::select('id')->inRandomOrder()->first()->id,
            'usuario_id' => App\Usuario::select('id')->inRandomOrder()->first()->id,
          ]
        );
      }
    }
}
