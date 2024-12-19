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
            $fecha_inicio->setTime($fecha_inicio->format('H'), 0);
    
            $fecha_final = (clone $fecha_inicio)->modify('+1 hour');
    
            DB::table('reservations')->insert([
                'id_user' => $faker->numberBetween(1, 10),
                'fecha_inicio' => $fecha_inicio,
                'fecha_final' => $fecha_final,
                'id_pista' => $faker->numberBetween(1, 8),
            ]);
        }
    
        DB::table('reservations')->insert([
            [
                'id_user' => 11,
                'fecha_inicio' => $faker->dateTimeBetween('now', '+1 month')->setTime(0, 0),
                'fecha_final' => (clone $fecha_inicio)->modify('+1 hour'),
                'id_pista' => $faker->numberBetween(1, 8),
            ],
            [
                'id_user' => 11,
                'fecha_inicio' => $faker->dateTimeBetween('now', '+1 month')->setTime(0, 0),
                'fecha_final' => (clone $fecha_inicio)->modify('+1 hour'),
                'id_pista' => $faker->numberBetween(1, 8),
            ]
        ]);
    }
    
}
