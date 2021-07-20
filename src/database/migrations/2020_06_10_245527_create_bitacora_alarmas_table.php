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
            $table->bigInteger('idAlarmaAct')->unsigned();
            $table->foreign('idAlarmaAct')->references('id')->on('alarma-acts');
            $table->date('fecha');
            $table->time('hora');
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
