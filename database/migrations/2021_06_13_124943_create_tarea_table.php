<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->text('indicaciones')->nullable();
            $table->dateTime('fecha_ap')->nullable();
            $table->dateTime('fecha_ven')->nullable();
            $table->unsignedBigInteger('sub_cont')->nullable();
            $table->foreign('sub_cont')->references('id')->on('sub_contenido');
            $table->char('nota',5)->nullable();
            
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
        Schema::dropIfExists('tarea');
    }
}
