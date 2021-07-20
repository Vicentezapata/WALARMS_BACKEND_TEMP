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
            $table->foreign('idAlarma')->references('id')->on('e-alarmas');
            $table->bigInteger('idEvento')->unsigned();
            $table->foreign('idEvento')->references('id')->on('act-eventos');
            $table->dateTime('fechaHoraCierre');
            $table->string('glosaCierre');
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
