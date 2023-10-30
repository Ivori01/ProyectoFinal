<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_tarea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ruta')->nullable();
            $table->unsignedBigInteger('tarea')->nullable();
            $table->foreign('tarea')->references('id')->on('tarea');
            $table->string('nombre')->nullable();
            $table->char('ext',10)->nullable();
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
        Schema::dropIfExists('archivo_tarea');
    }
}
