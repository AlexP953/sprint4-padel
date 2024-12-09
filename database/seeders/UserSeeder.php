<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
                'rol' => $faker->randomElement(['user', 'admin']), 
                'mail' => $faker->unique()->safeEmail(), 
                'number_phone' => $faker->phoneNumber(), 
            ]);
        }
    }
}
