<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantillaPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantilla_pago', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            
                $table->unsignedBigInteger('grado_id');
                $table->foreign('grado_id')->references('id')->on('grado');
                $table->year('anio');
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
        Schema::dropIfExists('plantilla_pago');
    }
}
