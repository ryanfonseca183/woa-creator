<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaColunasExtrasATabelaUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nome_artistico', 180);
            $table->string('avatar');
            $table->string('cidade', 45);
            $table->string('estado', 45);
            $table->string('descricao');
            $table->string('url_facebook');
            $table->string('url_instagram');
            $table->string('url_twitter');
            $table->string('celular', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nome_artistico', 'avatar', 'cidade', 'estado', 'descricao', 'url_facebook', 'url_instagram', 'url_twitter', 'celular']);
        });
    }
}
