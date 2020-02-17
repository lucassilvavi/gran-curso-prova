<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableQuestoesCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questoes', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('nome');
            $table->text('descricao');
            $table->integer('rl_orgao_banca_id');
            $table->integer('assunto_id');

            $table->foreign('rl_orgao_banca_id')
                ->references('id')->on('rl_orgao_banca');
            $table->foreign('assunto_id')
                ->references('id')->on('assunto');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questoes');
    }
}
