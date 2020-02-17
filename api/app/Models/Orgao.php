<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    protected $table = 'orgao';

    protected $fillable = [
        'nome',
    ];
    protected $timestamp = false;

    public function bancas()
    {
        return $this->belongsToMany(Banca::class,
            'rl_orgao_banca',
            'orgao_id');
    }
}
