<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    protected $table = 'Orgao';

    protected $fillable = [
        'nome',
    ];
    protected $timestamp = false;
}
