<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaColunaDeletedAtNasTabelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolio', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('ocupacao', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('trabalho', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolio', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('ocupacao', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('trabalho', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
