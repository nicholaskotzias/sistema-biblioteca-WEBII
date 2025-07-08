<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emprestimo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'aluno_id',
        'exemplar_id',
        'data_emprestimo',
        'data_devolucao_prevista',
        'data_devolucao_real',
        'status',
    ];

    protected $casts = [
        'data_emprestimo' => 'datetime',
        'data_devolucao_prevista' => 'datetime',
        'data_devolucao_real' => 'datetime',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function exemplar()
    {
        return $this->belongsTo(Exemplar::class);
    }
}
