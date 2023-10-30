<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('indicaciones')->nullable();
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_fin')->nullable();
            $table->float('duracion')->nullable();
            $table->tinyInteger('intentos')->nullable();
            $table->unsignedBigInteger('subcontenido_id')->nullable();
            $table->foreign('subcontenido_id')->references('id')->on('sub_contenido');
            $table->float('calificacion_max')->nullable();
            $table->tinyInteger('modo_calificacion')->nullable();
            $table->tinyInteger('aleatorio')->nullable();
            $table->tinyInteger('n_preguntas')->nullable();
            $table->tinyInteger('correccion')->nullable();
            
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
        Schema::dropIfExists('evaluacion');
    }
}
