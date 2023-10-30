<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('evaluacion_id')->nullable();
            $table->foreign('evaluacion_id')->references('id')->on('evaluacion')->onDelete('cascade');
            $table->string('alumno_id')->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumno') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->dateTime('hora_inicio')->nullable();
            $table->dateTime('hora_fin')->nullable();
            $table->tinyInteger('numero')->nullable();
            $table->char('estado',10)->nullable();
    
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
        Schema::dropIfExists('intentos');
    }
}
