<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use App\Models\CaseEvent;

class CaseEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaseEvent::query()->delete();
        
        // Serial killer events
        $bundy = SerialKiller::where('nickname', 'Ted Bundy')->first();

        if ($bundy) {
            $bundy->events()->createMany([
                [
                    'title' => 'Karen Sparks Attack',
                    'event_type' => 'attack',
                    'event_date' => '1974-01-04',
                    'location' => 'Seattle, Washington, USA',
                    'latitude' => 47.6062,
                    'longitude' => -122.3321,
                    'description' => 'Karen Sparks was attacked in her home in Seattle and survived.'
                ],
                [
                    'title' => 'Lynda Ann Healy Disappearance',
                    'event_type' => 'disappearance',
                    'event_date' => '1974-02-01',
                    'location' => 'Seattle, Washington, USA',
                    'latitude' => 47.6062,
                    'longitude' => -122.3321,
                    'description' => 'Lynda Ann Healy disappeared from her residence in Seattle.'
                ],
                [
                    'title' => 'Ted Bundy Arrested',
                    'event_type' => 'arrest',
                    'event_date' => '1975-08-16',
                    'location' => 'Granger, Utah, USA',
                    'latitude' => 40.6966,
                    'longitude' => -111.9878,
                    'description' => 'Bundy was arrested after being stopped by police in Utah.'
                ]
            ]);
        }

        $zodiac = SerialKiller::where('nickname', 'Zodiac Killer')->first();

        if ($zodiac) {
            $zodiac->events()->createMany([
                [
                    'title' => 'Lake Herman Road Attack',
                    'event_type' => 'murder',
                    'event_date' => '1968-12-20',
                    'location' => 'Benicia, California, USA',
                    'latitude' => 38.0494,
                    'longitude' => -122.1586,
                    'description' => 'David Faraday and Betty Lou Jensen were killed near Lake Herman Road.'
                ],
                [
                    'title' => 'Blue Rock Springs Attack',
                    'event_type' => 'attack',
                    'event_date' => '1969-07-04',
                    'location' => 'Vallejo, California, USA',
                    'latitude' => 38.1041,
                    'longitude' => -122.2566,
                    'description' => 'Darlene Ferrin was killed and Michael Mageau survived an attack at Blue Rock Springs Park.'
                ]
            ]);
        }

        // Unsolved case events
        $blackDahlia = UnsolvedCase::where('name', 'Black Dahlia')->first();

        if ($blackDahlia) {
            $blackDahlia->events()->createMany([
                [
                    'title' => 'Elizabeth Short Found',
                    'event_type' => 'discovery',
                    'event_date' => '1947-01-15',
                    'location' => 'Los Angeles, California, USA',
                    'latitude' => 34.0194,
                    'longitude' => -118.3283,
                    'description' => 'The body of Elizabeth Short was discovered in Los Angeles.'
                ]
            ]);
        }

        $boyInTheBox = UnsolvedCase::where('name', 'Boy in the Box')->first();

        if ($boyInTheBox) {
            $boyInTheBox->events()->createMany([
                [
                    'title' => 'Child Discovered',
                    'event_type' => 'discovery',
                    'event_date' => '1957-02-25',
                    'location' => 'Philadelphia, Pennsylvania, USA',
                    'latitude' => 40.0832,
                    'longitude' => -75.0418,
                    'description' => 'An unidentified young boy was discovered in a cardboard box in Philadelphia.'
                ],
                [
                    'title' => 'Joseph Augustus Zarelli Identified',
                    'event_type' => 'investigation',
                    'event_date' => '2022-12-08',
                    'location' => 'Philadelphia, Pennsylvania, USA',
                    'latitude' => 39.9526,
                    'longitude' => -75.1652,
                    'description' => 'Authorities publicly identified the child as Joseph Augustus Zarelli after decades without a confirmed identity.'
                ]
            ]);
        }
    }
}
