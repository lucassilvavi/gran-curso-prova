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
            $table->integer('banca_id')->unsigned();
            $table->integer('orgao_id')->unsigned();
            $table->integer('assunto_id')->unsigned();

            $table->foreign('orgao_id')
                ->references('id')->on('orgao');
            $table->foreign('banca_id')
                ->references('id')->on('banca');
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
