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
            $fecha_inicio = $faker->dateTimeBetween('now', '+1 month');
            $fecha_final = (clone $fecha_inicio)->modify('+1 hour');

            DB::table('reservations')->insert([
                'id_user' => $faker->numberBetween(1, 10),
                'fecha_inicio' => $fecha_inicio,
                'fecha_final' => $fecha_final,
                'id_pista' => $faker->numberBetween(1, 8),
            ]);
        }
    }
}
