<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaPagoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariospagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigopago')->unsigned();
            $table->integer('codigousuario')->unsigned();

            $table->foreign('codigopago')->references('codigopago')->on('pagos')->onDelete('cascade');
            $table->foreign('codigousuario')->references('codigousuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuariospagos');
    }
}
