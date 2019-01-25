<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuditoriaTrigger extends Migration
{

  public function up()
  {
    DB::statement('
    CREATE OR REPLACE FUNCTION creacionUsuarioAuditoria()
    RETURNS trigger AS
    $$
    DECLARE result TEXT;
    BEGIN
      SELECT CONCAT(transaccions.descripcion, users.email) INTO result FROM transaccions, users WHERE transaccions.id = 1 AND users.id = NEW.id;
      INSERT INTO auditorias (tipo_transaccion, user_id, transaccion_id) VALUES (result, NEW.id, 1);
      RETURN NEW;
    END
    $$ LANGUAGE plpgsql;
    ');

    DB::unprepared('
      CREATE TRIGGER tg_usuario_insert_auditoria
      AFTER INSERT ON users
      FOR EACH ROW
      EXECUTE PROCEDURE creacionUsuarioAuditoria()');
  }


  public function down()
  {
      Schema::dropIfExists('tg_usuario_insert_auditoria');
  }
}
