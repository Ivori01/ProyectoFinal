<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlangradtrimAnioFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plangradtrim_anio_fechas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechainicio')->nullable();
            $table->date('fechafin')->nullable();
            $table->unsignedBigInteger('anio_nivel')->nullable();
            $table->foreign('anio_nivel')->references('id')->on('anio_nivel');
            $table->unsignedBigInteger('plangrad_trim')->nullable();
            $table->foreign('plangrad_trim')->references('id')->on('plangrado_trimestre');
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
        Schema::dropIfExists('plangradtrim_anio_fechas');
    }
}
