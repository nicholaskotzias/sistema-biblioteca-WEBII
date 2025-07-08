<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Autor;
use App\Models\Categoria;
use Faker\Factory as Faker;

class LivroSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        $autores = Autor::pluck('id')->toArray();
        $categorias = Categoria::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            Livro::create([
                'titulo' => $faker->sentence(3),
                'isbn' => $faker->unique()->isbn13(),
                'descricao' => $faker->paragraph(4),
                'ano_publicacao' => $faker->year(),
                'autor_id' => $faker->randomElement($autores),
                'categoria_id' => $faker->randomElement($categorias),
            ]);
        }
    }
}
