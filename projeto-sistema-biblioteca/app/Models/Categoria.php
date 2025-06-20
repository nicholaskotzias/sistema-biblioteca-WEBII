<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
