<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanAcademicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_academico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',200)->nullable();
            $table->string('nivel')->nullable();
            $table->foreign('nivel')->references('id')->on('nivel');
            $table->char('estado',11)->nullable();
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
        Schema::dropIfExists('plan_academico');
    }
}
