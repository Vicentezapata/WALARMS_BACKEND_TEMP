<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlarmaActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarma_acts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idAlarma')->unsigned();
            $table->bigInteger('codResp')->unsigned();
            $table->dateTime('fechaHoraCierre');
            $table->bigInteger('idEvento')->unsigned();
            $table->string('evidencia');
            $table->string('estado');
            $table->string('comentario');
            $table->foreign('idAlarma')->references('id')->on('e_alarmas');
            $table->foreign('idEvento')->references('id')->on('act_eventos');
            $table->foreign('codResp')->references('codResp')->on('resp_alarmas');
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
        Schema::dropIfExists('alarma_acts');
    }
}
