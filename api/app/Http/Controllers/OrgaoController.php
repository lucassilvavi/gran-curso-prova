<?php

namespace App\Http\Controllers;

use App\Models\Orgao;

class OrgaoController extends Controller
{
    public function show()
    {
        $orgao = app(Orgao::class);
        return response()->json($orgao->all(), 200);
    }
}
