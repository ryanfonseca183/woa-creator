<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TornaColunasNaoObrigatoriasEmUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nome_artistico', 180)->nullable()->change();
            $table->string('avatar')->nullable()->change();
            $table->string('cidade', 45)->nullable()->change();
            $table->string('estado', 45)->nullable()->change();
            $table->string('descricao')->nullable()->change();
            $table->string('url_facebook')->nullable()->change();
            $table->string('url_instagram')->nullable()->change();
            $table->string('url_twitter')->nullable()->change();
            $table->string('celular', 15)->nullable()->change();
            $table->string('nome')->nullable(false)->change();
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
            $table->string('nome_artistico', 180)->nullable(false)->change();
            $table->string('avatar')->nullable(false)->change();
            $table->string('cidade', 45)->nullable(false)->change();
            $table->string('estado', 45)->nullable(false)->change();
            $table->string('descricao')->nullable(false)->change();
            $table->string('url_facebook')->nullable(false)->change();
            $table->string('url_instagram')->nullable(false)->change();
            $table->string('url_twitter')->nullable(false)->change();
            $table->string('celular', 15)->nullable(false)->change();
            $table->string('nome')->nullable()->change();
        });
    }
}
