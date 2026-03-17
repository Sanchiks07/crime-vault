<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnsolvedCasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unsolved_cases')->insert([
            // 1st case
            [
                'name' => 'Black Dahlia',
                'country' => 'USA',
                'count' => json_encode([
                    'name_1' => 'Elizabeth Short',
                    'age_1' => 22,
                ]),
                'suspects' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 0,
                ]),
                'image' => 'black-dahlia.jpg'
            ],

            // 2nd case
            [
                'name' => 'Villisca Axe Murders',
                'country' => 'USA',
                'count' => json_encode([
                    'name_1' => 'Paul Vernon Moore',
                    'age_1' => 5,
                    'name_2' => 'Arthur Boyd Moore',
                    'age_2' => 7,
                    'name_3' => 'Ina May Stillinger',
                    'age_3' => 8,
                    'name_4' => 'Mary Katherine Moore',
                    'age_4' => 10,
                    'name_5' => 'Lena Gertrude Stillinger',
                    'age_5' => 11,
                    'name_6' => 'Herman Montgomery Moore',
                    'age_6' => 11,
                    'name_7' => 'Saraha Moore',
                    'age_7' => 39,
                    'name_8' => 'Josiah B. Moore',
                    'age_8' => 43,
                ]),
                'suspects' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 0,
                ]),
                'image' => 'villisca-axe-murders.jpg'
            ],

            // 3rd case
            [
                'name' => 'Oklahoma Girl Scout Murders',
                'country' => 'USA',
                'count' => json_encode([
                    'name_1' => 'Lori Lee Farme',
                    'age_1' => 8,
                    'name_2' => 'Michele Heather Guse',
                    'age_2' => 9,
                    'name_3' => 'Doris Denise Milner',
                    'age_3' => 10,
                ]),
                'suspects' => json_encode([
                    'name_1' => 'Gene Leroy Hart',
                    'age_1' => 35,
                ]),
                'image' => 'girl-scout-murders.jpg'
            ],

            // 4th case
            [
                'name' => 'Keddie Cabin Murders',
                'country' => 'USA',
                'count' => json_encode([
                    'name_1' => 'Tina Sharp',
                    'age_1' => 12,
                    'name_2' => 'John Sharp',
                    'age_2' => 15,
                    'name_3' => 'Dana Wingate',
                    'age_3' => 17,
                    'name_4' => 'Glenna Susan Sharp',
                    'age_4' => 36,
                ]),
                'suspects' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 0,
                ]),
                'image' => 'keddie-cabin-murders.jpg'
            ],

            // 5th case
            [
                'name' => 'Boy in the Box',
                'country' => 'USA',
                'count' => json_encode([
                    'name_1' => 'Joseph Augustus Zarelli',
                    'age_1' => 4,
                ]),
                'suspects' => json_encode([
                    'name_1' => 'N/A',
                    'age_1' => 'N/A',
                ]),
                'image' => 'boy-in-the-box.jpg'
            ],
        ]);
    }
}
