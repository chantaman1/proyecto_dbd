<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolUsuarioTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::unprepared('
        CREATE TRIGGER tg_usuario_insert_rol
        AFTER INSERT ON usuarios
        FOR EACH ROW
        EXECUTE PROCEDURE pc_insert_rol_usuario()');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tg_usuario_insert_rol`');
    }
}