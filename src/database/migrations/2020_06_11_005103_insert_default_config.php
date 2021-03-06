<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDefaultConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            [
                ['name' => 'Admin','email' => 'admin@walarms.cl','password' => 'walarms.2021','type_user' => '1','created_at'=>DB::raw('CURRENT_TIMESTAMP'),'updated_at'=>DB::raw('CURRENT_TIMESTAMP')]
            ]
            );
        DB::table('cabecera_eventos')->insert(
            [
                ['nombre' => 'Tarea','created_at'=>DB::raw('CURRENT_TIMESTAMP'),'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
                ['nombre' => 'Evento','created_at'=>DB::raw('CURRENT_TIMESTAMP'),'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
                ['nombre' => 'Recordatorio','created_at'=>DB::raw('CURRENT_TIMESTAMP'),'updated_at'=>DB::raw('CURRENT_TIMESTAMP')]
            ]
            );
        DB::table('resp_alarmas')->insert(
            [
                ['nombre' => 'Sin finalizar','created_at'=>DB::raw('CURRENT_TIMESTAMP'),'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
                ['nombre' => 'Finalizada','created_at'=>DB::raw('CURRENT_TIMESTAMP'),'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
                ['nombre' => 'Cancelada','created_at'=>DB::raw('CURRENT_TIMESTAMP'),'updated_at'=>DB::raw('CURRENT_TIMESTAMP')],
                ['nombre' => 'Pospuesta','created_at'=>DB::raw('CURRENT_TIMESTAMP'),'updated_at'=>DB::raw('CURRENT_TIMESTAMP')]
            ]
            );

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
