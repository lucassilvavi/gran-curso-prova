<?php


namespace App\Http\Controllers;

use App\Models\RlOrgaoBanca;
use App\Repository\AssuntoRepository;

class AssuntoController extends Controller
{
    public function show(int $idBanca, int $idOrgao)
    {
        $arvoreAssunto = app(AssuntoRepository::class);
        $rlOrgaoBanca = app(RlOrgaoBanca::class);
        $rlOrgaoBanca = ($rlOrgaoBanca
            ->where('banca_id', $idBanca)
            ->where('orgao_id', $idOrgao)
            ->get()
        );
        return response()->json($arvoreAssunto->getArvore($rlOrgaoBanca),200);
    }
}
