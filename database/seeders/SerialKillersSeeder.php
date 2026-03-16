<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SerialKillersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('serial_killers')->insert([
            // 1st case
            [
                'name' => 'Theodore Robert Bundy',
                'nickname' => 'Ted Bundy',
                'age' => 42,
                'country' => 'USA',
                'victims' => json_encode([
                    'killed' => json_encode([
                        'claimed' => 30,
                        'confirmed' => 20,
                    ]),
                    'wounded' => 0,
                ])
            ],

            // 2nd case
            [
                'name' => 'Unknown',
                'nickname' => 'Zodiac Killer',
                'age' => 'N/A',
                'country' => 'USA',
                'victims' => json_encode([
                    'killed' => json_encode([
                        'claimed' => 37,
                        'confirmed' => 5,
                    ]),
                    'wounded' => 2,
                ])
            ],

            // 3rd case
            [
                'name' => 'Unknown',
                'nickname' => 'Jack the Ripper',
                'age' => 'N/A',
                'country' => 'UK',
                'victims' => json_encode([
                    'killed' => json_encode([
                        'claimed' => 5,
                        'confirmed' => 0,
                    ]),
                    'wounded' => 0,
                ])
            ],

            // 4th case
            [
                'name' => 'John Wayne Michael Gacy',
                'nickname' => 'The Killer Clown',
                'age' => 52,
                'country' => 'USA',
                'victims' => json_encode([
                    'killed' => json_encode([
                        'claimed' => '45+',
                        'confirmed' => 33,
                    ]),
                    'wounded' => 1,
                ])
            ],

            // 5th case
            [
                'name' => 'Jeffrey Dahmer',
                'nickname' => 'The Milwaukee Cannibal / The Milwaukee Monster',
                'age' => 34,
                'country' => 'USA',
                'victims' => json_encode([
                    'killed' => json_encode([
                        'claimed' => 17,
                        'confirmed' => 17,
                    ]),
                    'wounded' => 1,
                ])
            ],
        ]);
    }
}
