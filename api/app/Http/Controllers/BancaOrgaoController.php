<?php


namespace App\Http\Controllers;

use App\Models\Orgao;

class BancaOrgaoController extends Controller
{
    public function show(int $id)
    {
        $orgaoModel = app(Orgao::class);
        $orgaoModel = $orgaoModel->find($id);
        return response()->json($orgaoModel->bancas()->get(), 200);

    }
}
