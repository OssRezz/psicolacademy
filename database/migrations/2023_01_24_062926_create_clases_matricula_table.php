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
        Schema::create('clases_matricula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clase_id');
            $table->unsignedBigInteger('matricula_id');
            $table->timestamps();

            $table->foreign('clase_id')->references('id')->on('clases');
            $table->foreign('matricula_id')->references('id')->on('matriculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases_matricula');
    }
};
