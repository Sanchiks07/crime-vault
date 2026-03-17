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
                    'killed' => [
                        'name_2' => 'Lynda Ann Healy',
                        'age_2' => 21,
                        'name_3' => 'Donna Gail Manson',
                        'age_3' => 19,
                        'name_4' => 'Susan Elaine Rancourt',
                        'age_4' => 18,
                        'name_5' => 'Roberta Kathleen Parks',
                        'age_5' => 22,
                        'name_6' => 'Brenda Carol Ball',
                        'age_6' => 22,
                        'name_7' => 'Georgann Hawkins',
                        'age_7' => 18,
                        'name_8' => 'Janice Ann Ott',
                        'age_8' => 23,
                        'name_9' => 'Denise Marie Naslund',
                        'age_9' => 19,
                        'name_10' => 'Nancy Wilcox',
                        'age_10' => 16,
                        'name_11' => 'Melissa Anne Smith',
                        'age_11' => 17,
                        'name_12' => 'Laura Ann Aime',
                        'age_12' => 17,
                        'name_14' => 'Debra Jean Kent',
                        'age_14' => 17,
                        'name_15' => 'Caryn Eileen Campbell',
                        'age_15' => 23,
                        'name_16' => 'Julie Lyle Cunningham',
                        'age_16' => 26,
                        'name_17' => 'Denise Lynn Oliverson',
                        'age_17' => 24,
                        'name_18' => 'Lynnette Dawn Culver',
                        'age_18' => 12,
                        'name_19' => 'Susan Curtis',
                        'age_19' => 15,
                        'name_20' => 'Margaret Elizabeth Bowman',
                        'age_20' => 21,
                        'name_21' => 'Lisa Janet Levy',
                        'age_21' => 20,
                        'name_25' => 'Kimberly Dianne Leach',
                        'age_25' => 12,
                    ],
                    'wounded' => [
                        'name_1' => 'Karen Sparks',
                        'age_1' => 18,
                        'name_13' => 'Carol DaRonch',
                        'age_13' => 18,
                        'name_22' => 'Karen Chandler',
                        'age_22' => 21,
                        'name_23' => 'Kathy Kleiner',
                        'age_23' => 21,
                        'name_24' => 'Cheryl Thomas',
                        'age_24' => 21,
                    ]
                ])
            ],

            // 2nd case
            [
                'killer_id' => '2',
                'count' => json_encode([
                    'killed' => [
                        'name_1' => 'David Arthur Faraday',
                        'age_1' => 17,
                        'name_2' => 'Betty Lou Jensen',
                        'age_2' => 16,
                        'name_4' => 'Darlene Elizabeth Ferrin',
                        'age_4' => 22,
                        'name_6' => 'Cecelia Ann Shepard',
                        'age_6' => 22,
                        'name_7' => 'Paul Lee Stine',
                        'age_7' => 29,
                    ],
                    'wounded' => [
                        'name_3' => 'Michael Renault Mageau',
                        'age_3' => 19,
                        'name_5' => 'Bryan Calvin Hartnell',
                        'age_5' => 20,
                    ]
                ])
            ],

            // 3rd case
            [
                'killer_id' => '3',
                'count' => json_encode([
                    'killed' => [
                        'name_1' => 'N/A',
                        'age_1' => 'N/A',
                        'name_2' => 'N/A',
                        'age_2' => 'N/A',
                        'name_3' => 'N/A',
                        'age_3' => 'N/A',
                        'name_4' => 'N/A',
                        'age_4' => 'N/A',
                        'name_5' => 'N/A',
                        'age_5' => 'N/A',
                    ],
                    'wounded' => []
                ])
            ],

            // 4th case
            [
                'killer_id' => '4',
                'count' => json_encode([
                    'killed' => [
                        'name_1' => 'Timothy Jack McCoy',
                        'age_1' => 16,
                        'name_2' => 'John Butkovich',
                        'age_2' => 18,
                        'name_3' => 'Darrell Julius Samson',
                        'age_3' => 18,
                        'name_4' => 'Randall Wayne Reffett',
                        'age_4' => 15,
                        'name_5' => 'Samuel G. Dodd Stapleton',
                        'age_5' => 14,
                        'name_6' => 'Michael Lawrence Bonnin',
                        'age_6' => 17,
                        'name_7' => 'William Huey Carroll Jr.',
                        'age_7' => 16,
                        'name_8' => 'James Byron Haakenson',
                        'age_8' => 16,
                        'name_9' => 'Rick Louis Johnston',
                        'age_9' => 17,
                        'name_10' => 'Kenneth Ray Parker',
                        'age_10' => 16,
                        'name_11' => 'Michael M. Marino',
                        'age_11' => 14,
                        'name_12' => 'William George Bundy',
                        'age_12' => 19,
                        'name_13' => 'Francis Wayne Alexander',
                        'age_13' => 21,
                        'name_14' => 'Gregory John Godzik',
                        'age_14' => 17,
                        'name_15' => 'John Alan Szyc',
                        'age_15' => 19,
                        'name_16' => 'Jon Steven Prestidge',
                        'age_16' => 20,
                        'name_17' => 'Matthew Walter Bowman',
                        'age_17' => 19,
                        'name_18' => 'Robert Edward Gilroy Jr.',
                        'age_18' => 18,
                        'name_19' => 'John Antheney Mowery',
                        'age_19' => 19,
                        'name_20' => 'Russell Lloyd Nelson',
                        'age_20' => 21,
                        'name_21' => 'Robert David Winch',
                        'age_21' => 16,
                        'name_22' => 'Tommy Joseph Boling',
                        'age_22' => 20,
                        'name_23' => 'David Paul Talsma',
                        'age_23' => 19,
                        'name_24' => 'William Wayne Kindred',
                        'age_24' => 19,
                        'name_25' => 'Timothy David O\'Rourke',
                        'age_25' => 20,
                        'name_26' => 'Frank William Landingin',
                        'age_26' => 19,
                        'name_27' => 'James Mazzara',
                        'age_27' => 20,
                        'name_28' => 'Robert Jerome Piest',
                        'age_28' => 15,
                        'name_29' => 'N/A',
                        'age_29' => '17-21',
                        'name_30' => 'N/A',
                        'age_30' => '17-22',
                        'name_31' => 'N/A',
                        'age_31' => '15-24',
                        'name_32' => 'N/A',
                        'age_32' => '23-30',
                        'name_33' => 'N/A',
                        'age_33' => '14-18',
                    ]
                ])
            ],

            // 5th case
            [
                'killer_id' => '5',
                'count' => json_encode([
                    'killed' => [
                        'name_1' => 'Steven Mark Hicks',
                        'age_1' => 18,
                        'name_2' => 'Steven Walter Tuomi',
                        'age_2' => 25,
                        'name_3' => 'James Edward Doxtator',
                        'age_3' => 14,
                        'name_4' => 'Richard Guerrero',
                        'age_4' => 22,
                        'name_5' => 'Anthony Lee Sears',
                        'age_5' => 24,
                        'name_6' => 'Raymond Lamont Smith (a.k.a. Ricky Beeks)',
                        'age_6' => 32,
                        'name_7' => 'Edward Warren Smith',
                        'age_7' => 27,
                        'name_8' => 'Ernest Marquez Miller',
                        'age_8' => 22,
                        'name_9' => 'David Courtney Thomas',
                        'age_9' => 22,
                        'name_10' => 'Curtis Durrell Straughter',
                        'age_10' => 17,
                        'name_11' => 'Errol Lindsey',
                        'age_11' => 19,
                        'name_12' => 'Tony Anthony Hughes',
                        'age_12' => 31,
                        'name_13' => 'Konerak Sinthasomphone',
                        'age_13' => 14,
                        'name_14' => 'Matt Cleveland Turner',
                        'age_14' => 20,
                        'name_15' => 'Jeremiah Benjamin Weinberger',
                        'age_15' => 23,
                        'name_16' => 'Oliver Joseph Lacy',
                        'age_16' => 24,
                        'name_17' => 'Joseph Arthur Bradehoft',
                        'age_17' => 25,
                    ],
                    'wounded' => []
                ])
            ],
        ]);
    }
}
