<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exemplar;
use App\Models\Livro;
use Faker\Factory as Faker;

class ExemplarSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        $livros = Livro::all();

        foreach ($livros as $livro) {
            $quantidade = rand(1, 3);

            for ($i = 0; $i < $quantidade; $i++) {
                Exemplar::create([
                    'livro_id' => $livro->id,
                    'codigo_exemplar' => strtoupper(uniqid('EX')),
                    'status' => $faker->randomElement(['DISPONIVEL', 'EMPRESTADO']),
                    'localizacao' => $faker->bothify('Estante ## - Prateleira ?'),
                ]);
            }
        }
    }
}
