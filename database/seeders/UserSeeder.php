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
                'rol' => 'user',
                'email' => $faker->unique()->safeEmail(),
                'number_phone' => $faker->phoneNumber(),
            ]);
        }
        DB::table('users')->insert([
            'nombre' => 'alex',
            'apellido' => 'peris',
            'password' => Hash::make(1234),
            'rol' => 'admin',
            'email' => 'alexperis95@gmail.com',
            'number_phone' => '650979610',
        ]);
    }
}
