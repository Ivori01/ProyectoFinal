<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_tarea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tarea')->nullable();
            $table->foreign('tarea')->references('id')->on('tarea');
            $table->string('alumno')->nullable();
            $table->foreign('alumno')->references('id')->on('alumno') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('comentario')->nullable();
            $table->char('nota',5)->nullable();
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
        Schema::dropIfExists('revision_tarea');
    }
}
