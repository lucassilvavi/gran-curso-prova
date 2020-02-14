<?php

namespace App\Http\Controllers;

use App\Models\Banca;

class BancaController extends Controller
{

    public function show()
    {
        $bancaModel = app(Banca::class);
        return response()->json($bancaModel->all(), 200);
    }
}
