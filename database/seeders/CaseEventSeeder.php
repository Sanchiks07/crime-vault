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
                    'description' => 'Karen Sparks was attacked in her home in Seattle and survived.',
                ],
                [
                    'title' => 'Lynda Ann Healy Disappearance',
                    'event_type' => 'disappearance',
                    'event_date' => '1974-02-01',
                    'location' => 'Seattle, Washington, USA',
                    'latitude' => 47.6062,
                    'longitude' => -122.3321,
                    'description' => 'Lynda Ann Healy disappeared from her residence in Seattle.',
                ],
                [
                    'title' => 'Ted Bundy First Arrested',
                    'event_type' => 'arrest',
                    'event_date' => '1975-08-16',
                    'location' => 'Granger, Utah, USA',
                    'latitude' => 40.6966,
                    'longitude' => -111.9878,
                    'description' => 'Bundy was arrested after police stopped his Volkswagen and discovered suspicious items inside the vehicle.',
                ],
                [
                    'title' => 'Bundy Escapes from Custody',
                    'event_type' => 'escape',
                    'event_date' => '1977-12-31',
                    'location' => 'Glenwood Springs, Colorado, USA',
                    'latitude' => 39.5505,
                    'longitude' => -107.3248,
                    'description' => 'Bundy escaped from the Garfield County Jail and fled Colorado.',
                ],
                [
                    'title' => 'Chi Omega Murders',
                    'event_type' => 'murder',
                    'event_date' => '1978-01-15',
                    'location' => 'Tallahassee, Florida, USA',
                    'latitude' => 30.4383,
                    'longitude' => -84.2807,
                    'description' => 'Bundy attacked women at the Chi Omega sorority house at Florida State University, killing Margaret Bowman and Lisa Levy.',
                ],
                [
                    'title' => 'Ted Bundy Captured',
                    'event_type' => 'arrest',
                    'event_date' => '1978-02-15',
                    'location' => 'Pensacola, Florida, USA',
                    'latitude' => 30.4213,
                    'longitude' => -87.2169,
                    'description' => 'Bundy was arrested by police after being stopped while driving a stolen Volkswagen Beetle.',
                ],
            ]);
        }

        $zodiac = SerialKiller::where('nickname', 'Zodiac Killer')->first();

        if ($zodiac) {
            $zodiac->events()->createMany([
                [
                    'title' => 'Lake Herman Road Murders',
                    'event_type' => 'murder',
                    'event_date' => '1968-12-20',
                    'location' => 'Benicia, California, USA',
                    'latitude' => 38.0494,
                    'longitude' => -122.1586,
                    'description' => 'David Faraday and Betty Lou Jensen were killed near Lake Herman Road.',
                ],
                [
                    'title' => 'Blue Rock Springs Attack',
                    'event_type' => 'attack',
                    'event_date' => '1969-07-04',
                    'location' => 'Vallejo, California, USA',
                    'latitude' => 38.1041,
                    'longitude' => -122.2566,
                    'description' => 'Darlene Ferrin was killed and Michael Mageau survived an attack at Blue Rock Springs Park.',
                ],
                [
                    'title' => 'Lake Berryessa Attack',
                    'event_type' => 'attack',
                    'event_date' => '1969-09-27',
                    'location' => 'Lake Berryessa, California, USA',
                    'latitude' => 38.5025,
                    'longitude' => -122.1047,
                    'description' => 'Bryan Hartnell and Cecelia Shepard were attacked near Lake Berryessa. Hartnell survived.',
                ],
                [
                    'title' => 'Paul Stine Murder',
                    'event_type' => 'murder',
                    'event_date' => '1969-10-11',
                    'location' => 'San Francisco, California, USA',
                    'latitude' => 37.7887,
                    'longitude' => -122.4560,
                    'description' => 'Taxi driver Paul Stine was killed in the Presidio Heights neighborhood of San Francisco.',
                ],
            ]);
        }

        $ripper = SerialKiller::where('nickname', 'Jack the Ripper')->orWhere('name', 'Jack the Ripper')->first();

        if ($ripper) {
            $ripper->events()->createMany([
                [
                    'title' => 'Mary Ann Nichols Murder',
                    'event_type' => 'murder',
                    'event_date' => '1888-08-31',
                    'location' => 'Whitechapel, London, England',
                    'latitude' => 51.5195,
                    'longitude' => -0.0612,
                    'description' => 'Mary Ann Nichols was killed in Whitechapel and is generally regarded as the first of the canonical five victims.',
                ],
                [
                    'title' => 'Annie Chapman Murder',
                    'event_type' => 'murder',
                    'event_date' => '1888-09-08',
                    'location' => 'Spitalfields, London, England',
                    'latitude' => 51.5207,
                    'longitude' => -0.0754,
                    'description' => 'Annie Chapman was killed in the backyard of 29 Hanbury Street.',
                ],
                [
                    'title' => 'Elizabeth Stride Murder',
                    'event_type' => 'murder',
                    'event_date' => '1888-09-30',
                    'location' => 'Whitechapel, London, England',
                    'latitude' => 51.5139,
                    'longitude' => -0.0658,
                    'description' => 'Elizabeth Stride was killed in Dutfield\'s Yard during the night later associated with two murders.',
                ],
                [
                    'title' => 'Catherine Eddowes Murder',
                    'event_type' => 'murder',
                    'event_date' => '1888-09-30',
                    'location' => 'City of London, England',
                    'latitude' => 51.5133,
                    'longitude' => -0.0771,
                    'description' => 'Catherine Eddowes was killed in Mitre Square less than an hour after Elizabeth Stride.',
                ],
                [
                    'title' => 'Mary Jane Kelly Murder',
                    'event_type' => 'murder',
                    'event_date' => '1888-11-09',
                    'location' => 'Spitalfields, London, England',
                    'latitude' => 51.5192,
                    'longitude' => -0.0745,
                    'description' => 'Mary Jane Kelly was killed in her room at Miller\'s Court and is generally regarded as the final canonical victim.',
                ],
            ]);
        }

        $gacy = SerialKiller::where('name', 'John Wayne Michael Gacy')->orWhere('nickname', 'The Killer Clown')->first();

        if ($gacy) {
            $gacy->events()->createMany([
                [
                    'title' => 'Timothy McCoy Murder',
                    'event_type' => 'murder',
                    'event_date' => '1972-01-03',
                    'location' => 'Chicago, Illinois, USA',
                    'latitude' => 41.8781,
                    'longitude' => -87.6298,
                    'description' => 'Sixteen-year-old Timothy McCoy was killed by John Wayne Gacy and is generally regarded as his first known murder victim.',
                ],
                [
                    'title' => 'Robert Piest Disappears',
                    'event_type' => 'disappearance',
                    'event_date' => '1978-12-11',
                    'location' => 'Des Plaines, Illinois, USA',
                    'latitude' => 42.0334,
                    'longitude' => -87.8834,
                    'description' => 'Fifteen-year-old Robert Piest disappeared after leaving work to speak with Gacy about a possible job.',
                ],
                [
                    'title' => 'Gacy Arrested',
                    'event_type' => 'arrest',
                    'event_date' => '1978-12-21',
                    'location' => 'Des Plaines, Illinois, USA',
                    'latitude' => 42.0334,
                    'longitude' => -87.8834,
                    'description' => 'Gacy was arrested as investigators uncovered evidence connecting him to numerous disappearances and murders.',
                ],
                [
                    'title' => 'Gacy Convicted',
                    'event_type' => 'conviction',
                    'event_date' => '1980-03-12',
                    'location' => 'Cook County, Illinois, USA',
                    'latitude' => 41.7377,
                    'longitude' => -87.6976,
                    'description' => 'Gacy was convicted of 33 murders.',
                ],
            ]);
        }

        $dahmer = SerialKiller::where('name', 'Jeffrey Dahmer')->orWhere('nickname', 'The Milwaukee Cannibal / Monster')->first();

        if ($dahmer) {
            $dahmer->events()->createMany([
                [
                    'title' => 'Steven Hicks Murder',
                    'event_type' => 'murder',
                    'event_date' => '1978-06-18',
                    'location' => 'Bath Township, Ohio, USA',
                    'latitude' => 41.1889,
                    'longitude' => -81.6368,
                    'description' => 'Steven Hicks became Dahmer\'s first known murder victim.',
                ],
                [
                    'title' => 'Dahmer Arrested',
                    'event_type' => 'arrest',
                    'event_date' => '1991-07-22',
                    'location' => 'Milwaukee, Wisconsin, USA',
                    'latitude' => 43.0389,
                    'longitude' => -87.9065,
                    'description' => 'Police arrested Dahmer after Tracy Edwards escaped from his apartment and led officers back to the residence.',
                ],
                [
                    'title' => 'Evidence and Victims Discovered',
                    'event_type' => 'discovery',
                    'event_date' => '1991-07-23',
                    'location' => 'Milwaukee, Wisconsin, USA',
                    'latitude' => 43.0389,
                    'longitude' => -87.9065,
                    'description' => 'Investigators recovered extensive evidence and human remains from Dahmer\'s apartment.',
                ],
                [
                    'title' => 'Dahmer Sentenced',
                    'event_type' => 'conviction',
                    'event_date' => '1992-02-17',
                    'location' => 'Milwaukee, Wisconsin, USA',
                    'latitude' => 43.0389,
                    'longitude' => -87.9065,
                    'description' => 'Dahmer received multiple life sentences for the murders committed in Wisconsin.',
                ],
            ]);
        }

        $hillside = SerialKiller::where('name', 'Kenneth Bianchi & Angelo Buono Jr.')->orWhere('nickname', 'The Hillside Stranglers')->first();

        if ($hillside) {
            $hillside->events()->createMany([
                [
                    'title' => 'Hillside Strangler Murders Begin',
                    'event_type' => 'murder',
                    'event_date' => '1977-10-17',
                    'location' => 'Los Angeles, California, USA',
                    'latitude' => 34.0522,
                    'longitude' => -118.2437,
                    'description' => 'The series of murders attributed to Kenneth Bianchi and Angelo Buono began in Los Angeles.',
                ],
                [
                    'title' => 'Bodies Discovered on Hillsides',
                    'event_type' => 'discovery',
                    'event_date' => '1977-11-01',
                    'location' => 'Los Angeles, California, USA',
                    'latitude' => 34.0522,
                    'longitude' => -118.2437,
                    'description' => 'The discovery of victims on hillsides around Los Angeles contributed to the Hillside Strangler name used by investigators and the press.',
                ],
                [
                    'title' => 'Kenneth Bianchi Arrested',
                    'event_type' => 'arrest',
                    'event_date' => '1979-01-12',
                    'location' => 'Bellingham, Washington, USA',
                    'latitude' => 48.7519,
                    'longitude' => -122.4787,
                    'description' => 'Kenneth Bianchi was arrested following the murders of two women in Bellingham, Washington.',
                ],
                [
                    'title' => 'Angelo Buono Convicted',
                    'event_type' => 'conviction',
                    'event_date' => '1983-11-18',
                    'location' => 'Los Angeles, California, USA',
                    'latitude' => 34.0522,
                    'longitude' => -118.2437,
                    'description' => 'Angelo Buono was convicted for his role in the Hillside Strangler murders.',
                ],
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

        $villisca = UnsolvedCase::where('name', 'Villisca Axe Murders')->first();

        if ($villisca) {
            $villisca->events()->createMany([
                [
                    'title' => 'Villisca Axe Murders',
                    'event_type' => 'murder',
                    'event_date' => '1912-06-10',
                    'location' => 'Villisca, Iowa, USA',
                    'latitude' => 40.9308,
                    'longitude' => -94.9761,
                    'description' => 'Eight people, including six members of the Moore family and two young guests, were killed inside the Moore residence.',
                ],
                [
                    'title' => 'Victims Discovered',
                    'event_type' => 'discovery',
                    'event_date' => '1912-06-10',
                    'location' => 'Villisca, Iowa, USA',
                    'latitude' => 40.9308,
                    'longitude' => -94.9761,
                    'description' => 'The victims were discovered inside the Moore family home on the morning following the murders.',
                ],
            ]);
        }

        $girlScouts = UnsolvedCase::where('name', 'Oklahoma Girl Scout Murders')->first();

        if ($girlScouts) {
            $girlScouts->events()->createMany([
                [
                    'title' => 'Oklahoma Girl Scout Murders',
                    'event_type' => 'murder',
                    'event_date' => '1977-06-13',
                    'location' => 'Camp Scott, Mayes County, Oklahoma, USA',
                    'latitude' => 36.1934,
                    'longitude' => -95.1677,
                    'description' => 'Three Girl Scouts were killed during their first night at Camp Scott in northeastern Oklahoma.',
                ],
                [
                    'title' => 'Gene Leroy Hart Charged',
                    'event_type' => 'investigation',
                    'event_date' => '1977-06-23',
                    'location' => 'Mayes County, Oklahoma, USA',
                    'latitude' => 36.3034,
                    'longitude' => -95.2353,
                    'description' => 'Gene Leroy Hart was charged with three counts of first-degree murder in connection with the killings.',
                ],
                [
                    'title' => 'Gene Leroy Hart Captured',
                    'event_type' => 'arrest',
                    'event_date' => '1978-04-06',
                    'location' => 'Cookson Hills, Oklahoma, USA',
                    'latitude' => 35.8500,
                    'longitude' => -94.6500,
                    'description' => 'Gene Leroy Hart was captured after having remained a fugitive during the investigation.',
                ],
            ]);
        }

        $keddie = UnsolvedCase::where('name', 'Keddie Cabin Murders')->first();

        if ($keddie) {
            $keddie->events()->createMany([
                [
                    'title' => 'Keddie Cabin Murders',
                    'event_type' => 'murder',
                    'event_date' => '1981-04-11',
                    'location' => 'Keddie, California, USA',
                    'latitude' => 40.0063,
                    'longitude' => -120.9577,
                    'description' => 'Sue Sharp, John Sharp and Dana Wingate were killed in Cabin 28 in Keddie. Tina Sharp disappeared during the same incident.',
                ],
                [
                    'title' => 'Murders Discovered',
                    'event_type' => 'discovery',
                    'event_date' => '1981-04-12',
                    'location' => 'Keddie, California, USA',
                    'latitude' => 40.0063,
                    'longitude' => -120.9577,
                    'description' => 'The victims inside Cabin 28 were discovered the following morning, and Tina Sharp was found to be missing.',
                ],
                [
                    'title' => 'Tina Sharp Remains Discovered',
                    'event_type' => 'discovery',
                    'event_date' => '1984-04-22',
                    'location' => 'Butte County, California, USA',
                    'latitude' => 39.6254,
                    'longitude' => -121.5370,
                    'description' => 'Human remains later identified as Tina Sharp were discovered in Butte County.',
                ],
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
