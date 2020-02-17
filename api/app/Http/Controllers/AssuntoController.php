<?php

namespace App\Http\Controllers;

use App\Models\Questao;
use App\Repository\AssuntoRepository;

class AssuntoController extends Controller
{
    public function show(int $idBanca, int $idOrgao)
    {
        $assuntos = (app(AssuntoRepository::class));
        return $assuntos->getArvore($idBanca, $idOrgao);
    }
}
