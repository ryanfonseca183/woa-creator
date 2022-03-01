<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteraTamanhoColunaDescricaoEmTrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabalho', function (Blueprint $table) {
            $table->text('descricao')->nullable()->change();
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
            $table->string('descricao')->nullable()->change();
        });
    }
}
