<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteNivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_nivel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('docente');
            $table->foreign('docente')->references('id')->on('docente')->onDelete('cascade');
            $table->string('nivel');
            $table->foreign('nivel')->references('id')->on('nivel')->onDelete('cascade');
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
        Schema::dropIfExists('docente_nivel');
    }
}
