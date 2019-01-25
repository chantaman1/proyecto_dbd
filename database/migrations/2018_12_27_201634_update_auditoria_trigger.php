<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAuditoriaTrigger extends Migration
{
  public function up()
  {
    DB::statement('
    CREATE OR REPLACE FUNCTION updateUsuarioAuditoria()
    RETURNS trigger AS
    $$
    DECLARE result TEXT;
    BEGIN
      SELECT CONCAT(transaccions.descripcion, users.email) INTO result FROM transaccions, users WHERE transaccions.id = 2 AND users.id = OLD.id;
      INSERT INTO auditorias (tipo_transaccion, user_id, transaccion_id) VALUES (result, OLD.id, 2);
      RETURN NEW;
    END
    $$ LANGUAGE plpgsql;
    ');

    DB::unprepared('
      CREATE TRIGGER tg_usuario_update_auditoria
      AFTER UPDATE ON users
      FOR EACH ROW
      EXECUTE PROCEDURE updateUsuarioAuditoria()');
  }


  public function down()
  {
      Schema::dropIfExists('tg_usuario_update_auditoria');
  }
}
