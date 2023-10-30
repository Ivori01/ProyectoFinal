<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriterioevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterioevaluacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',200)->nullable();
            $table->string('descripcion',225)->nullable();
            $table->char('estado',11)->nullable();
            $table->unsignedBigInteger('curso')->nullable();
            $table->foreign('curso')->references('id')->on('curso');
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
        Schema::dropIfExists('criterioevaluacion');
    }
}
