<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaPorCobrarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_por_cobrar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_concepto')->nullable();
            $table->foreign('id_concepto')->references('id')->on('concepto');
            $table->string('alumno')->nullable();
            $table->foreign('alumno')->references('id')->on('alumno') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('estado',15)->nullable();
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
        Schema::dropIfExists('cuenta_por_cobrar');
    }
}
