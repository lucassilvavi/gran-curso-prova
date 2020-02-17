<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRlOrgaoBancaCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rl_orgao_banca', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('banca_id')->unsigned();;
            $table->integer('orgao_id')->unsigned();;


            $table->foreign('banca_id')
                ->references('id')->on('banca');
            $table->foreign('orgao_id')
                ->references('id')->on('orgao');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rl_orgao_banca');
    }
}
