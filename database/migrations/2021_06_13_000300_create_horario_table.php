<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->bigIncrements('idhorario');
            $table->string('dia',15)->nullable();
            $table->time('horainicio')->nullable();
            $table->time('horafin')->nullable();
            $table->unsignedBigInteger('seccion_docente_curso')->nullable();
            $table->foreign('seccion_docente_curso')->references('id')->on('seccion_docente_curso');
            $table->unsignedBigInteger('seccion')->nullable();
            $table->foreign('seccion')->references('id')->on('seccion');
            $table->string('color',100)->nullable();
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
        Schema::dropIfExists('horario');
    }
}
