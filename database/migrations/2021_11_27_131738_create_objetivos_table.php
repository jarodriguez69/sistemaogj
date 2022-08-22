<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('tracing');
            $table->timestamp('begin')->nullable();
            $table->timestamp('end')->nullable();
            $table->unsignedBigInteger('operativa_id');
            $table->unsignedBigInteger('estadoobjetivo_id');
            $table->unsignedBigInteger('tipoobjetivo_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('meta')->default(0);
            $table->boolean('esporcentaje');
            $table->timestamps();

            $table->foreign('operativa_id')->references('id')->on('operativas');//->onDelete("cascade");
            $table->foreign('estadoobjetivo_id')->references('id')->on('estado_objetivos'); 
            $table->foreign('tipoobjetivo_id')->references('id')->on('tipo_objetivos'); 
            $table->foreign('user_id')->references('id')->on('users');//->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetivos');
    }
}
