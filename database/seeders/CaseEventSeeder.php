<?php

namespace Database\Seeders;

use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CaseEventSeeder extends Seeder
{
    public function run(): void
    {
        // Serial killer events
        $this->seedCase(
            SerialKiller::where('nickname', 'Ted Bundy')->first(),
            [
                ['Karen Sparks Attack', 'attack', '1974-01-04', 'Seattle, Washington, USA', 47.6062, -122.3321, 'Karen Sparks was attacked in her home in Seattle and survived.'],
                ['Lynda Ann Healy Disappearance', 'disappearance', '1974-02-01', 'Seattle, Washington, USA', 47.6062, -122.3321, 'Lynda Ann Healy disappeared from her residence in Seattle.'],
                ['Ted Bundy First Arrested', 'arrest', '1975-08-16', 'Granger, Utah, USA', 40.6966, -111.9878, 'Bundy was arrested after police stopped his Volkswagen and discovered suspicious items inside the vehicle.'],
                ['Bundy Escapes from Custody', 'escape', '1977-12-31', 'Glenwood Springs, Colorado, USA', 39.5505, -107.3248, 'Bundy escaped from the Garfield County Jail and fled Colorado.'],
                ['Chi Omega Murders', 'murder', '1978-01-15', 'Tallahassee, Florida, USA', 30.4383, -84.2807, 'Bundy attacked women at the Chi Omega sorority house at Florida State University, killing Margaret Bowman and Lisa Levy.'],
                ['Ted Bundy Captured', 'arrest', '1978-02-15', 'Pensacola, Florida, USA', 30.4213, -87.2169, 'Bundy was arrested by police after being stopped while driving a stolen Volkswagen Beetle.'],
            ]
        );

        $this->seedCase(
            SerialKiller::where('nickname', 'Zodiac Killer')->first(),
            [
                ['Lake Herman Road Murders', 'murder', '1968-12-20', 'Benicia, California, USA', 38.0494, -122.1586, 'David Faraday and Betty Lou Jensen were killed near Lake Herman Road.'],
                ['Blue Rock Springs Attack', 'attack', '1969-07-04', 'Vallejo, California, USA', 38.1041, -122.2566, 'Darlene Ferrin was killed and Michael Mageau survived an attack at Blue Rock Springs Park.'],
                ['Lake Berryessa Attack', 'attack', '1969-09-27', 'Lake Berryessa, California, USA', 38.5025, -122.1047, 'Bryan Hartnell and Cecelia Shepard were attacked near Lake Berryessa. Hartnell survived.'],
                ['Paul Stine Murder', 'murder', '1969-10-11', 'San Francisco, California, USA', 37.7887, -122.4560, 'Taxi driver Paul Stine was killed in the Presidio Heights neighborhood of San Francisco.'],
            ]
        );

        $this->seedCase(
            SerialKiller::where('nickname', 'Jack the Ripper')
                ->orWhere('name', 'Jack the Ripper')
                ->first(),
            [
                ['Mary Ann Nichols Murder', 'murder', '1888-08-31', 'Whitechapel, London, England', 51.5195, -0.0612, 'Mary Ann Nichols was killed in Whitechapel and is generally regarded as the first of the canonical five victims.'],
                ['Annie Chapman Murder', 'murder', '1888-09-08', 'Spitalfields, London, England', 51.5207, -0.0754, 'Annie Chapman was killed in the backyard of 29 Hanbury Street.'],
                ['Elizabeth Stride Murder', 'murder', '1888-09-30', 'Whitechapel, London, England', 51.5139, -0.0658, "Elizabeth Stride was killed in Dutfield's Yard during the night later associated with two murders."],
                ['Catherine Eddowes Murder', 'murder', '1888-09-30', 'City of London, England', 51.5133, -0.0771, 'Catherine Eddowes was killed in Mitre Square less than an hour after Elizabeth Stride.'],
                ['Mary Jane Kelly Murder', 'murder', '1888-11-09', 'Spitalfields, London, England', 51.5192, -0.0745, "Mary Jane Kelly was killed in her room at Miller's Court and is generally regarded as the final canonical victim."],
            ]
        );

        $this->seedCase(
            SerialKiller::where('name', 'John Wayne Michael Gacy')
                ->orWhere('nickname', 'The Killer Clown')
                ->first(),
            [
                ['Timothy McCoy Murder', 'murder', '1972-01-03', 'Chicago, Illinois, USA', 41.8781, -87.6298, 'Sixteen-year-old Timothy McCoy was killed by John Wayne Gacy and is generally regarded as his first known murder victim.'],
                ['Robert Piest Disappears', 'disappearance', '1978-12-11', 'Des Plaines, Illinois, USA', 42.0334, -87.8834, 'Fifteen-year-old Robert Piest disappeared after leaving work to speak with Gacy about a possible job.'],
                ['Gacy Arrested', 'arrest', '1978-12-21', 'Des Plaines, Illinois, USA', 42.0334, -87.8834, 'Gacy was arrested as investigators uncovered evidence connecting him to numerous disappearances and murders.'],
                ['Gacy Convicted', 'conviction', '1980-03-12', 'Cook County, Illinois, USA', 41.7377, -87.6976, 'Gacy was convicted of 33 murders.'],
            ]
        );

        $this->seedCase(
            SerialKiller::where('name', 'Jeffrey Dahmer')
                ->orWhere('nickname', 'The Milwaukee Cannibal / Monster')
                ->first(),
            [
                ['Steven Hicks Murder', 'murder', '1978-06-18', 'Bath Township, Ohio, USA', 41.1889, -81.6368, "Steven Hicks became Dahmer's first known murder victim."],
                ['Dahmer Arrested', 'arrest', '1991-07-22', 'Milwaukee, Wisconsin, USA', 43.0389, -87.9065, 'Police arrested Dahmer after Tracy Edwards escaped from his apartment and led officers back to the residence.'],
                ['Evidence and Victims Discovered', 'discovery', '1991-07-23', 'Milwaukee, Wisconsin, USA', 43.0389, -87.9065, "Investigators recovered extensive evidence and human remains from Dahmer's apartment."],
                ['Dahmer Sentenced', 'conviction', '1992-02-17', 'Milwaukee, Wisconsin, USA', 43.0389, -87.9065, 'Dahmer received multiple life sentences for the murders committed in Wisconsin.'],
            ]
        );

        $this->seedCase(
            SerialKiller::where('name', 'Kenneth Bianchi & Angelo Buono Jr.')
                ->orWhere('nickname', 'The Hillside Stranglers')
                ->first(),
            [
                ['Hillside Strangler Murders Begin', 'murder', '1977-10-17', 'Los Angeles, California, USA', 34.0522, -118.2437, 'The series of murders attributed to Kenneth Bianchi and Angelo Buono began in Los Angeles.'],
                ['Bodies Discovered on Hillsides', 'discovery', '1977-11-01', 'Los Angeles, California, USA', 34.0522, -118.2437, 'The discovery of victims on hillsides around Los Angeles contributed to the Hillside Strangler name used by investigators and the press.'],
                ['Kenneth Bianchi Arrested', 'arrest', '1979-01-12', 'Bellingham, Washington, USA', 48.7519, -122.4787, 'Kenneth Bianchi was arrested following the murders of two women in Bellingham, Washington.'],
                ['Angelo Buono Convicted', 'conviction', '1983-11-18', 'Los Angeles, California, USA', 34.0522, -118.2437, 'Angelo Buono was convicted for his role in the Hillside Strangler murders.'],
            ]
        );

        // Unsolved case events
        $this->seedCase(
            UnsolvedCase::where('name', 'Black Dahlia')->first(),
            [
                ['Elizabeth Short Found', 'discovery', '1947-01-15', 'Los Angeles, California, USA', 34.0194, -118.3283, 'The body of Elizabeth Short was discovered in Los Angeles.'],
            ]
        );

        $this->seedCase(
            UnsolvedCase::where('name', 'Villisca Axe Murders')->first(),
            [
                ['Villisca Axe Murders', 'murder', '1912-06-10', 'Villisca, Iowa, USA', 40.9308, -94.9761, 'Eight people, including six members of the Moore family and two young guests, were killed inside the Moore residence.'],
                ['Victims Discovered', 'discovery', '1912-06-10', 'Villisca, Iowa, USA', 40.9308, -94.9761, 'The victims were discovered inside the Moore family home on the morning following the murders.'],
            ]
        );

        $this->seedCase(
            UnsolvedCase::where('name', 'Oklahoma Girl Scout Murders')->first(),
            [
                ['Oklahoma Girl Scout Murders', 'murder', '1977-06-13', 'Camp Scott, Mayes County, Oklahoma, USA', 36.1934, -95.1677, 'Three Girl Scouts were killed during their first night at Camp Scott in northeastern Oklahoma.'],
                ['Gene Leroy Hart Charged', 'investigation', '1977-06-23', 'Mayes County, Oklahoma, USA', 36.3034, -95.2353, 'Gene Leroy Hart was charged with three counts of first-degree murder in connection with the killings.'],
                ['Gene Leroy Hart Captured', 'arrest', '1978-04-06', 'Cookson Hills, Oklahoma, USA', 35.8500, -94.6500, 'Gene Leroy Hart was captured after having remained a fugitive during the investigation.'],
            ]
        );

        $this->seedCase(
            UnsolvedCase::where('name', 'Keddie Cabin Murders')->first(),
            [
                ['Keddie Cabin Murders', 'murder', '1981-04-11', 'Keddie, California, USA', 40.0063, -120.9577, 'Sue Sharp, John Sharp and Dana Wingate were killed in Cabin 28 in Keddie. Tina Sharp disappeared during the same incident.'],
                ['Murders Discovered', 'discovery', '1981-04-12', 'Keddie, California, USA', 40.0063, -120.9577, 'The victims inside Cabin 28 were discovered the following morning, and Tina Sharp was found to be missing.'],
                ['Tina Sharp Remains Discovered', 'discovery', '1984-04-22', 'Butte County, California, USA', 39.6254, -121.5370, 'Human remains later identified as Tina Sharp were discovered in Butte County.'],
            ]
        );

        $this->seedCase(
            UnsolvedCase::where('name', 'Boy in the Box')->first(),
            [
                ['Child Discovered', 'discovery', '1957-02-25', 'Philadelphia, Pennsylvania, USA', 40.0832, -75.0418, 'An unidentified young boy was discovered in a cardboard box in Philadelphia.'],
                ['Joseph Augustus Zarelli Identified', 'investigation', '2022-12-08', 'Philadelphia, Pennsylvania, USA', 39.9526, -75.1652, 'Authorities publicly identified the child as Joseph Augustus Zarelli after decades without a confirmed identity.'],
            ]
        );
    }

    private function seedCase(?Model $case, array $events): void
    {
        if (!$case) {
            return;
        }

        foreach ($events as $event) {
            [
                $title,
                $type,
                $date,
                $location,
                $latitude,
                $longitude,
                $description
            ] = $event;

            $case->events()->firstOrCreate(
                [
                    'title' => $title,
                    'event_date' => $date,
                ],
                [
                    'event_type' => $type,
                    'location' => $location,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'description' => $description,
                ]
            );
        }
    }
}
