<?php

use App\Models\Assunto;
use Illuminate\Database\Seeder;

class assunto_table_seed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getAssuntosPai() as $arrAssunto) {
            Assunto::firstOrCreate($arrAssunto);
        }
        foreach ($this->getAssuntosFilho() as $filhos) {
            Assunto::firstOrCreate($filhos);
        }
    }

    private function getAssuntosPai()
    {
        return [
            [
                'nome' => 'Assunto 1',
            ],
            [
                'nome' => 'Assunto 2',
            ],
            [
                'nome' => 'Assunto 3',
            ],
            [
                'nome' => 'Assunto 4',
            ],
        ];
    }

    private function getAssuntosFilho()
    {
        return [
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 1',])->id,
                'nome' => 'Assunto 5',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 5',])->id,
                'nome' => 'Assunto 6',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 5',])->id,
                'nome' => 'Assunto 7',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 5',])->id,
                'nome' => 'Assunto 8',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 4',])->id,
                'nome' => 'Assunto 9',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 5',])->id,
                'nome' => 'Assunto 10',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 5',])->id,
                'nome' => 'Assunto 11',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 10',])->id,
                'nome' => 'Assunto 12',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 10',])->id,
                'nome' => 'Assunto 13',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 12',])->id,
                'nome' => 'Assunto 14',
            ],
            [
                'assunto_pai_id' => Assunto::firstOrCreate(['nome' => 'Assunto 4',])->id,
                'nome' => 'Assunto 14',
            ],
        ];
    }
}
