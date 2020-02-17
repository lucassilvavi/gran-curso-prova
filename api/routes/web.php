<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


use App\Http\Controllers\AssuntoController;

use App\Http\Controllers\OrgaoController;

$router->group(['prefix' => '/api'], function () use ($router) {
    $router->group(['prefix' => 'programa'], function () use ($router) {

        $router->get('banca', 'BancaController@show');
        $router->get('orgao', 'OrgaoController@show');
        $router->get('assunto/banca/{idBanca}/orgao/{idOrgao}', 'AssuntoController@show');

    });
});
