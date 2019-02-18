<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PasajeroAsientoTrigger extends Migration
{
  public function up()
  {

    DB::statement('
    CREATE OR REPLACE FUNCTION restarAsiento()
    RETURNS trigger AS
    $$
    BEGIN
      UPDATE asientos
      SET disponibilidad = FALSE
      WHERE NEW.asiento_id = asientos.id;
      RETURN NULL;
    END
    $$ LANGUAGE plpgsql;
    ');

    DB::unprepared('
      CREATE TRIGGER tg_pasajero_restar_asiento
      AFTER INSERT ON pasajeros
      FOR EACH ROW
      EXECUTE PROCEDURE restarAsiento()');
  }

  public function down()
  {
      Schema::dropIfExists('tg_pasajero_restar_asiento');
  }
}
