<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamp('diagnostico')->nullable();
            $table->timestamp('begin')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamp('real')->nullable();
            $table->timestamp('seguimiento')->nullable();
            $table->string('indicador')->nullable();
            $table->string('meta')->nullable();
            $table->text('recursos')->nullable();
            $table->text('objetivos')->nullable();
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('estadoproyecto_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('objetivo_id')->nullable();
            $table->unsignedBigInteger('year')->nullable();;
            $table->boolean('measuring');
            $table->boolean('satisfactorio');
            $table->timestamps();

            $table->foreign('grupo_id')->references('id')->on('grupos');//->onDelete("cascade");
            $table->foreign('estadoproyecto_id')->references('id')->on('estado_proyectos');
            $table->foreign('user_id')->references('id')->on('users');//->onDelete("cascade");
            $table->foreign('objetivo_id')->references('id')->on('objetivos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
