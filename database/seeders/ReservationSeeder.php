<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('reservations')->insert([
                [
                    'id_user' => $faker->numberBetween(1, 10),
                    'fecha_inicio' => $faker->dateTimeBetween('now', '+1 month'), 
                    'fecha_final' => $faker->dateTimeBetween('+1 hour', '+2 hours'),
                    'id_pista' => $faker->numberBetween(1, 5)
                ]
            ]);
        }
    }
}
