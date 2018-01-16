<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncabezadoPlanificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IBERPLAS.EncabezadoPlanificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ordenproduccion')
            $table->integer('cantidadproducida')
            $table->string('pedido');
            $table->string('maquina');
            $table->integer('piezaxhora');
            $table->integer('piezaxturno');
            $table->integer('cantidadturnos');
            $table->datetime('fechaplanificada');
            $table->integer('turnosplanificados');
            $table->string('usuariocreacion');
            $table->string('usuariomodificacion');
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
