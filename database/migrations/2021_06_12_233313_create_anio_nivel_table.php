<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnioNivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anio_nivel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('anio')->nullable();
            $table->string('nivel')->nullable();
            $table->unsignedBigInteger('plan')->nullable();
            $table->foreign('anio')->references('id')->on('anio_academico');
            $table->foreign('nivel')->references('id')->on('nivel');
            $table->foreign('plan')->references('id')->on('plan_academico');
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
        Schema::dropIfExists('anio_nivel');
    }
}
