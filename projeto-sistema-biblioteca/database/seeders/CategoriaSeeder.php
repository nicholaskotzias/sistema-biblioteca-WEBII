<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Faker\Factory as Faker;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Categoria::create([
                'nome' => $faker->unique()->word(),
                'descricao' => $faker->sentence(10),
            ]);
        }
    }
}
