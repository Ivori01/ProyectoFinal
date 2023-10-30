<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_text', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('texto')->nullable();
            $table->unsignedBigInteger('id_pregunta')->nullable();
            $table->foreign('id_pregunta')->references('id')->on('intento_preguntas')->onDelete('cascade');
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
        Schema::dropIfExists('respuesta_text');
    }
}
