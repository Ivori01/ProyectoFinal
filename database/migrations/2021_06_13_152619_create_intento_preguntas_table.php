<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntentoPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intento_preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_intento')->nullable();
            $table->foreign('id_intento')->references('id')->on('intentos')->onDelete('cascade');
            $table->unsignedBigInteger('id_pregunta')->nullable();
            $table->foreign('id_pregunta')->references('id')->on('pregunta_fija')->onDelete('cascade');
            $table->tinyInteger('orden_pregunta')->nullable();
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
        Schema::dropIfExists('intento_preguntas');
    }
}
