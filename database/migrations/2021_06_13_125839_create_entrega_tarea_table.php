<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tarea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tarea')->nullable();
            $table->foreign('tarea')->references('id')->on('tarea');
            $table->string('alumno')->nullable();
            $table->foreign('alumno')->references('id')->on('alumno') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('archivo')->nullable();
            $table->char('ext',5)->nullable();
            $table->longText('contenido')->nullable();
            $table->string('archivo_name')->nullable();
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
        Schema::dropIfExists('entrega_tarea');
    }
}
