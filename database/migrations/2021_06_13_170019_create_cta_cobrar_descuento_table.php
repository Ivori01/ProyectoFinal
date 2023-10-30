<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtaCobrarDescuentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cta_cobrar_descuento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cta_cobrar')->nullable();
            $table->foreign('id_cta_cobrar')->references('id')->on('cuenta_por_cobrar');
            $table->unsignedBigInteger('descuento')->nullable();
            $table->foreign('descuento')->references('id')->on('descuento');
            $table->char('estado',15)->nullable();
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
        Schema::dropIfExists('cta_cobrar_descuento');
    }
}
