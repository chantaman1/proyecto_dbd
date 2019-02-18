<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AsientoTrigger extends Migration
{

  public function up()
  {

    DB::statement('
    CREATE OR REPLACE FUNCTION contarAsientos()
    RETURNS trigger AS
    $$
    BEGIN
      UPDATE vuelos
      SET asientos = asientos + 1
      WHERE NEW.disponibilidad = TRUE AND NEW.vuelo_id = vuelos.id;
      RETURN NULL;
    END
    $$ LANGUAGE plpgsql;
    ');

    DB::unprepared('
      CREATE TRIGGER tg_vuelos_agregar_asiento
      AFTER INSERT ON asientos
      FOR EACH ROW
      EXECUTE PROCEDURE contarAsientos()');
  }

  public function down()
  {
      Schema::dropIfExists('tg_vuelos_agregar_asiento');
  }
}
