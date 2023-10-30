<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('trimestre')->nullable();
            $table->foreign('trimestre')->references('id')->on('plangrado_trimestre');
            $table->unsignedBigInteger('curso')->nullable();
            $table->foreign('curso')->references('id')->on('seccion_docente_curso')->onDelete('cascade');
            $table->string('descripcion')->nullable();
            $table->string('alumno')->nullable();
            $table->foreign('alumno')->references('id')->on('alumno') ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('observaciones');
    }
}
