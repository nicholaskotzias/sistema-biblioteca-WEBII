<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'isbn',
        'descricao',
        'ano_publicacao',
        'categoria_id',
        'autor_id',
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function exemplares()
    {
        return $this->hasMany(Exemplar::class);
    }
}
