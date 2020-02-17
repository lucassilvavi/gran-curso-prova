<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    protected $table = 'orgao';

    protected $fillable = [
        'nome',
    ];
    public $timestamps = false;

}
