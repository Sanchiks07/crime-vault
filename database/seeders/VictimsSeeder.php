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
                        ['name' => 'Lynda Ann Healy', 'age' => 21],
                        ['name' => 'Donna Gail Manson', 'age' => 19],
                        ['name' => 'Susan Elaine Rancourt', 'age' => 18],
                        ['name' => 'Roberta Kathleen Parks', 'age' => 22],
                        ['name' => 'Brenda Carol Ball', 'age' => 22],
                        ['name' => 'Georgann Hawkins', 'age' => 18],
                        ['name' => 'Janice Ann Ott', 'age_8' => 23],
                        ['name' => 'Denise Marie Naslund', 'age' => 19],
                        ['name' => 'Nancy Wilcox', 'age' => 16],
                        ['name' => 'Melissa Anne Smith', 'age' => 17],
                        ['name' => 'Laura Ann Aime', 'age' => 17],
                        ['name' => 'Debra Jean Kent', 'age' => 17],
                        ['name' => 'Caryn Eileen Campbell', 'age' => 23],
                        ['name' => 'Julie Lyle Cunningham', 'age' => 26],
                        ['name' => 'Denise Lynn Oliverson', 'age' => 24],
                        ['name' => 'Lynnette Dawn Culver', 'age' => 12],
                        ['name' => 'Susan Curtis', 'age' => 15],
                        ['name' => 'Margaret Elizabeth Bowman', 'age' => 21],
                        ['name' => 'Lisa Janet Levy', 'age' => 20],
                        ['name' => 'Kimberly Dianne Leach', 'age' => 12],
                    ],
                    'wounded' => [
                        ['name' => 'Karen Sparks', 'age' => 18],
                        ['name' => 'Carol DaRonch', 'age' => 18],
                        ['name' => 'Karen Chandler', 'age' => 21],
                        ['name' => 'Kathy Kleiner', 'age' => 21],
                        ['name' => 'Cheryl Thomas', 'age' => 21],
                    ]
                ])
            ],

            // 2nd case
            [
                'killer_id' => '2',
                'count' => json_encode([
                    'killed' => [
                        ['name' => 'David Arthur Faraday', 'age' => 17],
                        ['name' => 'Betty Lou Jensen', 'age' => 16],
                        ['name' => 'Darlene Elizabeth Ferrin', 'age' => 22],
                        ['name' => 'Cecelia Ann Shepard', 'age' => 22],
                        ['name' => 'Paul Lee Stine', 'age' => 29],
                    ],
                    'wounded' => [
                        ['name' => 'Michael Renault Mageau', 'age' => 19],
                        ['name' => 'Bryan Calvin Hartnell', 'age' => 20],
                    ]
                ])
            ],

            // 3rd case
            [
                'killer_id' => '3',
                'count' => json_encode([
                    'killed' => [
                        ['name' => 'Unknown', 'age' => 'N/A'],
                        ['name' => 'Unknown', 'age' => 'N/A'],
                        ['name' => 'Unknown', 'age' => 'N/A'],
                        ['name' => 'Unknown', 'age' => 'N/A'],
                        ['name' => 'Unknown', 'age' => 'N/A'],
                    ],
                    'wounded' => []
                ])
            ],

            // 4th case
            [
                'killer_id' => '4',
                'count' => json_encode([
                    'killed' => [
                        ['name' => 'Timothy Jack McCoy', 'age' => 16],
                        ['name' => 'John Butkovich', 'age' => 18],
                        ['name' => 'Darrell Julius Samson', 'age' => 18],
                        ['name' => 'Randall Wayne Reffett', 'age' => 15],
                        ['name' => 'Samuel G. Dodd Stapleton', 'age' => 14],
                        ['name' => 'Michael Lawrence Bonnin', 'age' => 17],
                        ['name' => 'William Huey Carroll Jr.', 'age' => 16],
                        ['name' => 'James Byron Haakenson', 'age_8' => 16],
                        ['name' => 'Rick Louis Johnston', 'age' => 17],
                        ['name' => 'Kenneth Ray Parker', 'age' => 16],
                        ['name' => 'Michael M. Marino', 'age' => 14],
                        ['name' => 'William George Bundy', 'age' => 19],
                        ['name' => 'Francis Wayne Alexander', 'age' => 21],
                        ['name' => 'Gregory John Godzik', 'age' => 17],
                        ['name' => 'John Alan Szyc', 'age' => 19],
                        ['name' => 'Jon Steven Prestidge', 'age' => 20],
                        ['name' => 'Matthew Walter Bowman', 'age' => 19],
                        ['name' => 'Robert Edward Gilroy Jr.', 'age' => 18],
                        ['name' => 'John Antheney Mowery', 'age' => 19],
                        ['name' => 'Russell Lloyd Nelson', 'age' => 21], 
                        ['name' => 'Robert David Winch', 'age' => 16],
                        ['name' => 'Tommy Joseph Boling', 'age' => 20],
                        ['name' => 'David Paul Talsma', 'age' => 19],
                        ['name' => 'William Wayne Kindred', 'age' => 19],
                        ['name' => 'Timothy David O\'Rourke', 'age' => 20],
                        ['name' => 'Frank William Landingin', 'age' => 19],
                        ['name' => 'James Mazzara', 'age' => 20],
                        ['name' => 'Robert Jerome Piest', 'age' => 15],
                        ['name' => 'Unknown', 'age' => '17-21'],
                        ['name' => 'Unknown', 'age' => '17-22'],
                        ['name' => 'Unknown', 'age' => '15-24'],
                        ['name' => 'Unknown', 'age' => '23-30'],
                        ['name' => 'Unknown', 'age' => '14-18'],
                    ],
                    'wounded' => [],
                ])
            ],

            // 5th case
            [
                'killer_id' => '5',
                'count' => json_encode([
                    'killed' => [
                        ['name' => 'Steven Mark Hicks', 'age' => 18],
                        ['name' => 'Steven Walter Tuomi', 'age' => 25],
                        ['name' => 'James Edward Doxtator', 'age' => 14],
                        ['name' => 'Richard Guerrero', 'age' => 22],
                        ['name' => 'Anthony Lee Sears', 'age' => 24],
                        ['name' => 'Raymond Lamont Smith (a.k.a. Ricky Beeks)', 'age' => 32],
                        ['name' => 'Edward Warren Smith', 'age' => 27],
                        ['name' => 'Ernest Marquez Miller', 'age' => 22],
                        ['name' => 'David Courtney Thomas', 'age' => 22],
                        ['name' => 'Curtis Durrell Straughter', 'age' => 17],
                        ['name' => 'Errol Lindsey', 'age' => 19],
                        ['name' => 'Tony Anthony Hughes', 'age' => 31],
                        ['name' => 'Konerak Sinthasomphone', 'age' => 14],
                        ['name' => 'Matt Cleveland Turner', 'age' => 20],
                        ['name' => 'Jeremiah Benjamin Weinberger', 'age' => 23],
                        ['name' => 'Oliver Joseph Lacy', 'age' => 24],
                        ['name' => 'Joseph Arthur Bradehoft', 'age' => 25],
                    ],
                    'wounded' => []
                ])
            ],
        ]);
    }
}
