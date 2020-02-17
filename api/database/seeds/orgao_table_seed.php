<?php


use App\Models\Orgao;
use Illuminate\Database\Seeder;

class orgao_table_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getOrgaos() as $orgao) {
            Orgao::firstOrCreate($orgao);
        }
    }

    private function getOrgaos()
    {
        return [
            [
                'nome' => 'PF'
            ],
            [
                'nome' => 'PC-DF'
            ],
            [
                'nome' => 'TCU'
            ],
        ];
    }
}
