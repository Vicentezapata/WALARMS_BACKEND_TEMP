<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('act_eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idCabEvento')->unsigned();
            $table->foreign('idCabEvento')->references('id')->on('cabecera-eventos');
            $table->bigInteger('idActividad')->unsigned();
            $table->foreign('idActividad')->references('id')->on('actividades');
            $table->dateTime('fechaHoraIE');
            $table->dateTime('fechaHoraFE');
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
        Schema::dropIfExists('act_eventos');
    }
}