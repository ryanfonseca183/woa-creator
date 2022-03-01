<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaColunasVisualizacoesECurtidasEmTrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabalho', function (Blueprint $table) {
            $table->unsignedInteger('visualizacoes')->default(0);
            $table->unsignedInteger('curtidas')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabalho', function (Blueprint $table) {
            $table->dropColumn(['visualizacoes', 'curtidas']);
        });
    }
}
