<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VictimsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('victims')->insert([
            // 1st case
            [
                'killer_id' => '1',
                'count' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 0,
                ])
            ],

            // 2nd case
            [
                'killer_id' => '2',
                'count' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 0,
                ])
            ],

            // 3rd case
            [
                'killer_id' => '3',
                'count' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 0,
                ])
            ],

            // 4th case
            [
                'killer_id' => '4',
                'count' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 0,
                ])
            ],

            // 5th case
            [
                'killer_id' => '5',
                'count' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 0,
                ])
            ],
        ]);
    }
}
