<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operativas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('ajuste')->nullable();
            $table->text('replanificacion')->nullable();
            $table->boolean('enabled');
            $table->unsignedBigInteger('estrategica_id');
            $table->timestamps();

            $table->foreign('estrategica_id')->references('id')->on('estrategicas');//->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operativas');
    }
}
