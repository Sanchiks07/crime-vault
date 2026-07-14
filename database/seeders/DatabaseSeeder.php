<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SerialKillerSeeder::class,
            VictimSeeder::class,
            UnsolvedCaseSeeder::class,
            ResourceSeeder::class
        ]);
    }
}
