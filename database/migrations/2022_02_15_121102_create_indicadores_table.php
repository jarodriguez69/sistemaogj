<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('proyectos_procesos');
            $table->string('proyectos_suspendidos');
            $table->string('proyectos_acumulados');
            $table->string('proyectos_terminados');
            $table->string('proyectos_con_medicion');
            $table->string('proyectos_satisfactorio');
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
        Schema::dropIfExists('indicadores');
    }
}
