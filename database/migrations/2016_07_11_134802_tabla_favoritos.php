<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaFavoritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigousuario')->unsigned();
            $table->integer('codigousuariofavorito')->unsigned();
            
            $table->foreign('codigousuario')->references('codigousuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('codigousuariofavorito')->references('codigousuario')->on('usuarios')->onDelete('cascade');
            $table->unique(['codigousuario', 'codigousuariofavorito']);
            
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
        Schema::drop('favoritos');
    }
}
