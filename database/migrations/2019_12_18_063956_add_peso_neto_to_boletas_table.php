<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPesoNetoToBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boletas', function (Blueprint $table) {
            $table->decimal('peso_neto',12,2);
            $table->decimal('monto_pagar',12,2);
        });
        Schema::table('boletas_detalles', function (Blueprint $table) {
            $table->datetime('pesada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boletas', function (Blueprint $table) {
            //
        });
    }
}
