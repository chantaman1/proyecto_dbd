<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolUsuarioTrigger extends Migration
{

    public function up()
    {

      DB::statement('
      CREATE OR REPLACE FUNCTION asignarRol()
      RETURNS trigger AS
      $$
      BEGIN
        INSERT INTO rol_usuario (id_usuario, id_rol) VALUES (NEW.id, 1);
        RETURN NEW;
      END
      $$ LANGUAGE plpgsql;
      ');

      DB::unprepared('
        CREATE TRIGGER tg_usuario_insert_rol
        AFTER INSERT ON usuarios
        FOR EACH ROW
        EXECUTE PROCEDURE asignarRol()');
    }


    public function down()
    {
        Schema::dropIfExists('tg_usuario_insert_rol');
    }
}
