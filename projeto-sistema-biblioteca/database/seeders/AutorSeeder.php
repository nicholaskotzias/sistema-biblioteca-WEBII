<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;
use Faker\Factory as Faker;

class AutorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 10; $i++) {
            Autor::create([
                'nome' => $faker->name(),
                'biografia' => $faker->paragraph(3),
                'nacionalidade' => $faker->country(),
            ]);
        }
    }
}
