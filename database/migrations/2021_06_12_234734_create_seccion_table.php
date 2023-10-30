<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('letra',1)->nullable();
            $table->unsignedTinyInteger('capacidad')->nullable();
            $table->string('descripcion',100)->nullable();
            $table->unsignedBigInteger('tutor')->nullable();
            $table->foreign('tutor')->references('id')->on('docente');
            $table->unsignedBigInteger('grado')->nullable();
            $table->foreign('grado')->references('id')->on('grado');
            $table->unsignedBigInteger('anio_nivel')->nullable();
            $table->foreign('anio_nivel')->references('id')->on('anio_nivel');
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
        Schema::dropIfExists('seccion');
    }
}
