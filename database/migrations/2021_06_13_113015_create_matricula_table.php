<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha')->useCurrent();
            $table->string('id_alumno')->nullable();
            $table->foreign('id_alumno')->references('id')->on('alumno') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('id_seccion')->nullable();
            $table->foreign('id_seccion')->references('id')->on('seccion');
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
        Schema::dropIfExists('matricula');
    }
}
