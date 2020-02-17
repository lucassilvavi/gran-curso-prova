<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $table = 'assunto';

    protected $fillable = [
        'nome', 'assunto_pai_id',
    ];
    public $timestamps = false;

}
