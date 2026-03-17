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
                    'killed' => [
                        'claimed' => 30,
                        'confirmed' => 20,
                    ],
                    'wounded' => 0,
                ]),
                'image' => 'ted-bundy.jpg'
            ],

            // 2nd case
            [
                'name' => 'N/A',
                'nickname' => 'Zodiac Killer',
                'age' => 'N/A',
                'country' => 'USA',
                'victims' => json_encode([
                    'killed' => [
                        'claimed' => 37,
                        'confirmed' => 5,
                    ],
                    'wounded' => 2,
                ]),
                'image' => 'zodiac-killer.jpg'
            ],

            // 3rd case
            [
                'name' => 'N/A',
                'nickname' => 'Jack the Ripper',
                'age' => 'N/A',
                'country' => 'UK',
                'victims' => json_encode([
                    'killed' => [
                        'claimed' => 5,
                        'confirmed' => 0,
                    ],
                    'wounded' => 0,
                ]),
                'image' => ''
            ],

            // 4th case
            [
                'name' => 'John Wayne Michael Gacy',
                'nickname' => 'The Killer Clown',
                'age' => 52,
                'country' => 'USA',
                'victims' => json_encode([
                    'killed' => [
                        'claimed' => '45+',
                        'confirmed' => 33,
                    ],
                    'wounded' => 1,
                ]),
                'image' => 'john-wayne-gacy.jpg'
            ],

            // 5th case
            [
                'name' => 'Jeffrey Dahmer',
                'nickname' => 'The Milwaukee Cannibal / Monster',
                'age' => 34,
                'country' => 'USA',
                'victims' => json_encode([
                    'killed' => [
                        'claimed' => 17,
                        'confirmed' => 17,
                    ],
                    'wounded' => 0,
                ]),
                'image' => 'jeffrey-dahmer.jpg'
            ],
        ]);
    }
}
