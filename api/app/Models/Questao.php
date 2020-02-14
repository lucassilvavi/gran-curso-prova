<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $table = 'Questao';

    protected $fillable = [
        'nome','descricao'
    ];
    protected $timestamp = false;


    public function orgao()
    {
        return $this->hasOne(
            Orgao::class,
            'id_orgao',
            'id_orgao'
        );
    }

    public function banca()
    {
        return $this->hasOne(
            Banca::class,
            'id_banca',
            'id_banca'
        );
    }

    public function assunto()
    {
        return $this->hasOne(
            Assunto::class,
            'id_assunto',
            'id_assunto_'
        );
    }
}
