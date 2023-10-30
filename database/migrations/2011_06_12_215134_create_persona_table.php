<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nrodocumento')->unique();
            $table->char('tipodocumento',3)->nullable(false);
            $table->string('nombres',50)->nullable(false);
            $table->string('apellidos',50)->nullable(false);
            $table->char('genero',1)->nullable(false);
            $table->date('fechanacimiento')->nullable(false);
            $table->string('direccion',90)->nullable();
            $table->char('telefono',8)->nullable();
            $table->char('celular',13)->nullable();
            $table->string('correo',40)->nullable(false);
            $table->string('foto')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp',15)->nullable();
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
        Schema::dropIfExists('persona');
    }
}
