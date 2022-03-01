<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaTrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabalho', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ocupacao_id');
            $table->foreign('ocupacao_id')->references('id')->on('ocupacao');
            $table->string('titulo', 45);
            $table->string('descricao')->nullable();
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
        Schema::dropIfExists('trabalho');
    }
}
