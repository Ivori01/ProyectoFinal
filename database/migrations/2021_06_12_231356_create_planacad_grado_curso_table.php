<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanacadGradoCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planacad_grado_curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curso')->nullable();
            $table->unsignedBigInteger('plan_grado')->nullable();
            $table->foreign('curso')->references('id')->on('curso');
            $table->foreign('plan_grado')->references('id')->on('planacad_grado');
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
        Schema::dropIfExists('planacad_grado_curso');
    }
}
