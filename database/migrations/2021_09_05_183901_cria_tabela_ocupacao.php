<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaOcupacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocupacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id');
            $table->foreign('portfolio_id')->references('id')->on('portfolio');
            $table->string('nome', 45);
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
        Schema::dropIfExists('ocupacao');
    }
}
