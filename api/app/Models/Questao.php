<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $table = 'questoes';

    protected $fillable = [
        'nome','descricao','rl_orgao_banca_id'
    ];
    protected $timestamp = false;


    public function orgao()
    {
        return $this->hasOne(
            Orgao::class,
            'orgao_id',
            'orgao_id'
        );
    }

    public function banca()
    {
        return $this->hasOne(
            Banca::class,
            'banca_id',
            'banca_id'
        );
    }

    public function assunto()
    {
        return $this->hasOne(
            Assunto::class,
            'assunto_id',
            'assunto_id'
        );
    }
}
