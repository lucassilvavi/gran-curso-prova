<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $table = 'Assunto';

    protected $fillable = [
        'nome', 'id_pai',
    ];
    protected $timestamp = false;

    public function pai()
    {
        return $this->hasOneThrough(
            Assunto::class,
            Assunto::class,
            'id',
            'id_pai',
            'id_pai',
            'id'
        );
    }

    public function filhos()
    {
        return $this->belongsToMany(
            Assunto::class,
            'rl_arvore_assunto',
            'id_assunto_pai',
            'id_assunto_filho'
        );
    }

    public function questoes($arrParam = [])
    {
        $questoes = $this->hasMany(
            Questao::class,
            'id_assunto',
            'id_assunto'
        );
        if ($arrParam) {
            $questoes->where($arrParam);
        }
        return $questoes;
    }

    public function quantidadeQuestoes($arrParam = [])
    {
        $quantidadeQuestoes = $this->questoes($arrParam)->count();
        $filhos = $this->filhos()->get();
        if ($filhos->isNotEmpty()) {
            foreach ($filhos as $filho) {
                $quantidadeQuestoes += $filho->quantidadeQuestoes($arrParam);
            }
        }
        return $quantidadeQuestoes;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAssuntosRaiz($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->doesntHave('pai');
    }


}
