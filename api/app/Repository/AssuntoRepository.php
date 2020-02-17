<?php

namespace App\Repository;

use App\Models\Assunto;
use App\Models\Questao;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Object_;

class AssuntoRepository
{
    private $model;

    public function __construct(Assunto $assunto)
    {
        $this->model = $assunto;
    }

    public function getQuestoes(int $assunto_id)
    {
        return (app(Questao::class))
            ->where('assunto_id', $assunto_id)->get();

    }

    public function getPai($idBanca, $idOrgao)
    {
        return (app(Questao::class))
            ->join('assunto', 'assunto.id', 'assunto_id')
            ->where('assunto.assunto_pai_id', null)
            ->where(['banca_id' => $idBanca, 'orgao_id' => $idOrgao])->get();
    }

    public function getfilhos(Collection $assuntos)
    {
        $assuntos->map(function ($item) {
            $item->filhos = $this->model->where('assunto_pai_id', $item->id)->get();
            $item->questao = $this->getQuestoes($item->id);
            $item->qt_questao = count($item->questao);
            if (count($item->filhos) > 0) {
                $this->getfilhos($item->filhos);
            }
        });
    }


    public function getArvore($idBanca, $idOrgao)
    {

        $assuntoPai = $this->getPai($idBanca, $idOrgao);
        $assuntoPai->map(function ($item) {
            $item->qt_questao = count($this->getQuestoes($item->id));
        });
        $this->getfilhos($assuntoPai);

        return $assuntoPai;
    }
}
