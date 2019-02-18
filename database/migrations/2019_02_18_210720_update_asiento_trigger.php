<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAsientoTrigger extends Migration
{
  public function up()
  {

    DB::statement('
    CREATE OR REPLACE FUNCTION actualizarAsientos()
    RETURNS trigger AS
    $$
    BEGIN
      IF(NEW.disponibilidad) THEN
        UPDATE vuelos
        SET asientos = asientos + 1
        WHERE NEW.disponibilidad = TRUE AND NEW.vuelo_id = vuelos.id;
        RETURN NULL;
      ELSE
        UPDATE vuelos
        SET asientos = asientos - 1
        WHERE NEW.disponibilidad = FALSE AND NEW.vuelo_id = vuelos.id;
        RETURN NULL;
      END IF;
    END
    $$ LANGUAGE plpgsql;
    ');

    DB::unprepared('
      CREATE TRIGGER tg_vuelos_actualizar_asiento
      AFTER UPDATE ON asientos
      FOR EACH ROW
      EXECUTE PROCEDURE actualizarAsientos()');
  }

  public function down()
  {
      Schema::dropIfExists('tg_vuelos_actualizar_asiento');
  }
}
