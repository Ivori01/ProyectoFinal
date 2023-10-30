<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlangradoTrimestreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plangrado_trimestre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_grado')->nullable();
            $table->unsignedBigInteger('trimestre')->nullable();
            $table->foreign('plan_grado')->references('id')->on('planacad_grado');
            $table->foreign('trimestre')->references('id')->on('trimestre');
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
        Schema::dropIfExists('plangrado_trimestre');
    }
}
