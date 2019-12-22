<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('boletas_id');
            $table->decimal('precio',12,2);
            $table->decimal('peso',12,2);
            $table->decimal('total',12,2);
            $table->integer('tarifa_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletas_detalles');
    }
}
