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
        Schema::create('Questoes', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('nome');
            $table->text('descricao');
            $table->text('id_orgao');
            $table->text('id_assunto');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Questoes');
    }
}
