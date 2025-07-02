<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use SoftDeletes;

    protected $table = 'autores';

    protected $fillable = [
        'nome',
        'biografia',
        'nacionalidade',
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
