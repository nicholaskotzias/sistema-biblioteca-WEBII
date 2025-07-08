<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserAlunoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'),
                'tipo' => 'aluno',
            ]);

            Aluno::create([
                'user_id' => $user->id,
                'matricula' => $faker->unique()->numerify('2023#####'),
                'curso' => $faker->randomElement(['TADS', 'Engenharia', 'Administração']),
                'data_nascimento' => $faker->date('Y-m-d', '2005-01-01'),
            ]);
        }
    }
}
