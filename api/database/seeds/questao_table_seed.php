<?php

use App\Models\Assunto;
use App\Models\Banca;
use App\Models\Orgao;
use App\Models\Questao;
use Illuminate\Database\Seeder;

class questao_table_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getQuestoes() as $questao) {
            Questao::firstOrCreate([
                'nome' => $questao['nome'],
                'orgao_id' => Orgao::firstOrCreate(['nome' => $questao['orgao']])->id,
                'banca_id' => Banca::firstOrCreate(['nome' => $questao['banca']])->id,
                'assunto_id' => Assunto::firstOrCreate(['nome' => $questao['assunto']])->id,
            ]);
        }
    }

    private function getQuestoes()
    {
        return [
            [
                'nome' => 'Questão 1',
                'orgao' => 'PF',
                'banca' => 'ESAF',
                'assunto' => 'Português',

            ],
            [
                'nome' => 'Questão 2',
                'orgao' => 'PF',
                'banca' => 'CESPE',
                'assunto' => 'Português',
            ],
            [
                'nome' => 'Questão 3',
                'orgao' => 'PC-DF',
                'banca' => 'IADES',
                'assunto' => 'Raciocínio Lógico - RLM',

            ],
            [
                'nome' => 'Questão 4',
                'orgao' => 'PC-DF',
                'banca' => 'IADES',
                'assunto' => 'Raciocínio Lógico - RLM',
            ],
            [
                'nome' => 'Questão 5',
                'orgao' => 'TCU',
                'banca' => 'CESPE',
                'assunto' => 'Verbo',

            ],
            [
                'nome' => 'Questão 6',
                'orgao' => 'TCU',
                'banca' => 'ESAF',
                'assunto' => 'Verbo',
            ],
        ];
    }
}
