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
        Schema::create('Rl_orgao_banca', function (Blueprint $table) {

            $table->integer('id_banca');
            $table->integer('id_orgao');


            $table->foreign('id_banca')
                ->references('id')->on('Banca');
            $table->foreign('id_orgao')
                ->references('id')->on('Orgao');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Rl_orgao_banca');
    }
}
