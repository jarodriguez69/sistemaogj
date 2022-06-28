<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamp('begin')->nullable();
            $table->timestamp('end')->nullable();
            $table->unsignedBigInteger('objetivo_id');
            $table->unsignedBigInteger('estadoactividad_id');
            $table->unsignedBigInteger('porcentaje')->default(0);
            // $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('objetivo_id')->references('id')->on('objetivos')->onDelete("cascade");
            $table->foreign('estadoactividad_id')->references('id')->on('estado_actividades');
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
        Schema::dropIfExists('actividades');
    }
}
