<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamp('begin')->nullable();
            $table->timestamp('end')->nullable();
            $table->unsignedBigInteger('proyecto_id');
            $table->unsignedBigInteger('estadotarea_id');
            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('proceso_id');
            $table->timestamps();
            $table->text('url')->nullable();
            
            $table->foreign('proceso_id')->references('id')->on('procesos');//->onDelete("cascade");
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete("cascade");;
            $table->foreign('estadotarea_id')->references('id')->on('estado_tareas');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
