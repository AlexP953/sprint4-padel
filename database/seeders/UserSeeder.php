<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_ES');
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'nombre' => $faker->firstName(),
                'apellido' => $faker->lastName(),
                'password' => Hash::make('password123'),
                'rol' => $i == 3 ? 'admin' :'user',
                'mail' => $faker->unique()->safeEmail(),
                'number_phone' => $faker->phoneNumber(),
            ]);
        }
    }
}
