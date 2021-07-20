<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraAlarmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_alarmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idEvento')->unsigned();
            $table->foreign('idEvento')->references('id')->on('alarma-acts');
            $table->string('respNomEvent');
            $table->string('fecha');
            $table->string('hora');
            $table->string('estado');
            $table->bigInteger('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');
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
        Schema::dropIfExists('bitacora_alarmas');
    }
}
