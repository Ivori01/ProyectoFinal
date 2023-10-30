<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionDocenteCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_docente_curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curso')->nullable();
            $table->foreign('curso')->references('id')->on('planacad_grado_curso');
            $table->unsignedBigInteger('seccion')->nullable();
            $table->foreign('seccion')->references('id')->on('seccion');
            $table->unsignedBigInteger('docente')->nullable();
            $table->foreign('docente')->references('id')->on('docente');
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
        Schema::dropIfExists('seccion_docente_curso');
    }
}
