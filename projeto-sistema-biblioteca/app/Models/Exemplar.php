<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exemplar extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'livro_id',
        'codigo_exemplar',
        'status',
        'localizacao',
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function emprestimo()
    {
        return $this->hasOne(Emprestimo::class);
    }
}
