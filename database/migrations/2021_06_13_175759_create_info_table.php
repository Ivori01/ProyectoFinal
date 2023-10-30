<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('mail')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_i')->nullable();
            $table->string('logo_d')->nullable();
            $table->string('nombre')->nullable();
            $table->string('postal')->nullable();
            $table->boolean('restringir_notas')->default(0);
            $table->string('simbolo_moneda')->default('S/.');
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
        Schema::dropIfExists('info');
    }
}
