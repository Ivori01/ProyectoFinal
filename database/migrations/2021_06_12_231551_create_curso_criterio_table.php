<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoCriterioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_criterio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curso')->nullable();
            $table->unsignedBigInteger('criterio')->nullable();
            $table->unsignedBigInteger('trimestre')->nullable();
            $table->float('peso')->default(1);
            $table->foreign('curso')->references('id')->on('planacad_grado_curso');
            $table->foreign('criterio')->references('id')->on('criterioevaluacion');
            $table->foreign('trimestre')->references('id')->on('plangrado_trimestre');
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
        Schema::dropIfExists('curso_criterio');
    }
}
