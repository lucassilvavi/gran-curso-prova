<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banca extends Model
{
    protected $table = 'Banca';

    protected $fillable = [
        'nome',
    ];
    protected $timestamp = false;
}
