<?php

namespace App\Repository;

use App\Models\Assunto;
use Illuminate\Database\Eloquent\Collection;

class AssuntoRepository
{
    private $model;

    public function __construct(Assunto $assunto)
    {
        $this->model = $assunto;
    }

    public function getQuestoes(int $id_rl_orgao_banca)
    {
        return $this->model
            ->join('questoes', 'assunto.id', 'questoes.assunto_id')
            ->where('questoes.rl_orgao_banca_id', $id_rl_orgao_banca)
            ->where('assunto_pai_id', null)->get();
    }

    public function getPai(int $idAssunto)
    {
        return $this->model
            ->where('id',$idAssunto)
            ->where('assunto_pai_id',null)
            ->get();
    }

    public function getfilhos(Collection $assuntos)
    {

        $assuntos->map(function ($item){
            $item->filhos = $this->model->where('assunto_pai_id',$item->id)->get();
            if (count($item->filhos) > 0 ){
                $this->getfilhos($item->filhos);
            }
        });

    }

    public function getArvore(Collection $rlOrgaoBanca)
    {
          $rlOrgaoBanca->map(function ($item) {
            $item->questoes = $this->getQuestoes($item->id);
              $item->questoes->map(function ($assunto){
                  $assunto->assuntos = $this->getPai($assunto->id);
                  $this->getfilhos($assunto->assuntos);
              });


        });
       return $rlOrgaoBanca;
    }
}
