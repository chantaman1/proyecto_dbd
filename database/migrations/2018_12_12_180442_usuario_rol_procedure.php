<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioRolProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE FUNCTION public.pc_insert_rol_usuario(userId integer) RETURNS void AS $$
        BEGIN
                INSERT INTO usuario_rols (´id_usuario´, ´id_rol´, ´create_at´, ´updated_at´) VALUES (userId, 1, now(), null);
        END;
        $$ LANGUAGE plpgsql;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS pc_insert_rol_usuario');
    }
}
