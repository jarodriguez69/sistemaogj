<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivoDesarrolloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivo_desarrollo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objetivo_id');
            $table->unsignedBigInteger('desarrollo_id');

            $table->foreign('objetivo_id')->references('id')->on('objetivos')->onDelete('cascade');
            $table->foreign('desarrollo_id')->references('id')->on('desarrollos')->onDelete('cascade');

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
        Schema::dropIfExists('objetivo_desarrollo');
    }
}
