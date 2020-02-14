<?php


namespace App\Http\Controllers;

use App\Models\Assunto;

class AssuntoController extends Controller
{
    public function show()
    {
       $assuntoModel =  app(Assunto::class);
        return response()->json($assuntoModel, 200);
    }
}
