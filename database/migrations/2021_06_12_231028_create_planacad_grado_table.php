<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanacadGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planacad_grado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('grado')->nullable();
            $table->unsignedBigInteger('plan')->nullable();
            $table->foreign('grado')->references('id')->on('grado');
            $table->foreign('plan')->references('id')->on('plan_academico');
            $table->string('tipo_cal')->nullable();
            $table->string('modo_criterio')->nullable();
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
        Schema::dropIfExists('planacad_grado');
    }
}
