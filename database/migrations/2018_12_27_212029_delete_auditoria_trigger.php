<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteAuditoriaTrigger extends Migration
{
  public function up()
  {
    DB::statement('
    CREATE OR REPLACE FUNCTION deleteUsuarioAuditoria()
    RETURNS trigger AS
    $$
    DECLARE result TEXT;
    BEGIN
      SELECT transaccions.descripcion INTO result FROM transaccions WHERE transaccions.id = 3;
      INSERT INTO auditorias (tipo_transaccion, usuario_id) VALUES (result, 1);
      RETURN NEW;
    END
    $$ LANGUAGE plpgsql;
    ');

    DB::unprepared('
      CREATE TRIGGER tg_usuario_delete_auditoria
      AFTER DELETE ON usuarios
      FOR EACH ROW
      EXECUTE PROCEDURE deleteUsuarioAuditoria()');
  }


  public function down()
  {
      Schema::dropIfExists('tg_usuario_delete_auditoria');
  }
}
