<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetallePlanificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IBERPLAS.DetallePlanificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Encabplanificador_id');
            $table->string('Calendarioplanificador_id');
            $table->integer('numero');
            $table->integer('correlativo');
            $table->integer('turno');
            $table->datetime('Fechainicio');
            $table->datetime('FechaFin');
            $table->integer('cantidadaproducir');
            $table->string('usuariocreacion');
            $table->string('usuariomodifica');
            $table->timestamps();
        });
    }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
