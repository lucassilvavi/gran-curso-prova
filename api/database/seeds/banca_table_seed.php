<?php

use App\Models\Banca;
use Illuminate\Database\Seeder;

class banca_table_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getBancas() as $banca) {
            Banca::firstOrCreate($banca);
        }
    }

    private function getBancas()
    {
        return [
            ['nome' => 'CESPE'],
            ['nome' => 'IADES'],
            ['nome' => 'ESAF'],
        ];
    }
}
