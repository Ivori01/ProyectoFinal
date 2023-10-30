<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaFijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_fija', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->mediumText('descripcion')->nullable();
            $table->string('retroalimentacion')->nullable();
            $table->float('puntos')->nullable();
            $table->unsignedBigInteger('tipo')->nullable();
            $table->foreign('tipo')->references('id')->on('tipo_pregunta');
            
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
        Schema::dropIfExists('pregunta_fija');
    }
}
