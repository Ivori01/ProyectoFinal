<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('idnota');
            $table->char('nota',5)->nullable();
            $table->unsignedBigInteger('criterio')->nullable();
            $table->foreign('criterio')->references('id')->on('curso_criterio');
            $table->unsignedBigInteger('id_matricula')->nullable();
            $table->foreign('id_matricula')->references('id')->on('matricula');
            $table->unsignedBigInteger('trimestre')->nullable();
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
        Schema::dropIfExists('notas');
    }
}
