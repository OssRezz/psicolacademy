<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('asignatura_id');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->string('estado')->default(1);
            $table->timestamps();

            $table->foreign('profesor_id')->references('id')->on('profesores');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases');
    }
};
