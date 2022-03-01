<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenomeiaColunasVisualizacoesECurtidasEmTrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabalho', function (Blueprint $table) {
            $table->renameColumn('visualizacoes', 'total_visualizacoes');
            $table->renameColumn('curtidas', 'total_curtidas');
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
            $table->renameColumn('total_visualizacoes', 'visualizacoes');
            $table->renameColumn('total_curtidas', 'curtidas');
        });
    }
}
