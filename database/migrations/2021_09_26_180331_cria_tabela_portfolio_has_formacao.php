<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaPortfolioHasFormacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_portfolio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->foreign('curso_id')->references('id')->on('curso');
            $table->unsignedBigInteger('portfolio_id')->nullable();
            $table->foreign('portfolio_id')->references('id')->on('portfolio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_portfolio');
    }
}
