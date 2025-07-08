<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'matricula',
        'curso',
        'data_nascimento',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
