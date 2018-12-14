<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolUsuarioTrigger extends Migration
{
    /*
    public function up()
    {
      DB::unprepared('
        CREATE TRIGGER tg_usuario_insert_rol
        AFTER INSERT ON usuarios
        FOR EACH ROW
        EXECUTE PROCEDURE pc_insert_rol_usuario()');
    }

    
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tg_usuario_insert_rol`');
    }*/
}
