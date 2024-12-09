<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CourtSeeder;
use Database\Seeders\ReservationSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            CourtSeeder::class,        
            ReservationSeeder::class,   
        ]);
    }
}
