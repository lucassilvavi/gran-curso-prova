<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RlOrgaoBanca extends Model
{
    protected $table = 'rl_orgao_banca';

    protected $fillable = [
        'banca_id', 'orgao_id',
    ];
    protected $timestamp = false;

}
