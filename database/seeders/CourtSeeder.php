<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CourtSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 8; $i++) {
            DB::table('courts')->insert([
                'nombre' => 'Pista ' . ($i + 1),
                'tipo_pista' => $i % 5 == 0 ? 'Tenis' : 'Padel', 
            ]);
        }      
    }
}
