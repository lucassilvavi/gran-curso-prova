<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('assunto_table_seed');
         $this->call('banca_table_seed');
         $this->call('orgao_table_seed');
         $this->call('questao_table_seed');
    }
}
