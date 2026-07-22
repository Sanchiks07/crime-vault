<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VictimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('victims')->insert([
            // 1st case
            [
                'killer_id' => 1,
                'count' => json_encode([
                    'killed' => [
                        [
                            'name' => 'Lynda Ann Healy',
                            'age' => 21,
                            'occupation' => 'University Student',
                            'location' => 'Seattle, Washington',
                            'date' => 'February 1, 1974',
                            'summary' => 'A University of Washington student and weather reporter who became Ted Bundy\'s first confirmed murder victim after disappearing from her shared home.'
                        ],
                        [
                            'name' => 'Donna Gail Manson',
                            'age' => 19,
                            'occupation' => 'College Student',
                            'location' => 'Olympia, Washington',
                            'date' => 'March 12, 1974',
                            'summary' => 'An Evergreen State College student who disappeared while walking to a jazz concert. Her body has never been conclusively recovered.'
                        ],
                        [
                            'name' => 'Susan Elaine Rancourt',
                            'age' => 18,
                            'occupation' => 'College Student',
                            'location' => 'Ellensburg, Washington',
                            'date' => 'April 17, 1974',
                            'summary' => 'A Central Washington State College student who disappeared after attending an evening class.'
                        ],
                        [
                            'name' => 'Roberta Kathleen Parks',
                            'age' => 22,
                            'occupation' => 'College Student',
                            'location' => 'Corvallis, Oregon',
                            'date' => 'May 6, 1974',
                            'summary' => 'An Oregon State University student who vanished while walking to her dormitory.'
                        ],
                        [
                            'name' => 'Brenda Carol Ball',
                            'age' => 22,
                            'occupation' => 'Student',
                            'location' => 'Burien, Washington',
                            'date' => 'June 1, 1974',
                            'summary' => 'Disappeared after leaving a local tavern. Her remains were later discovered on Taylor Mountain.'
                        ],
                        [
                            'name' => 'Georgann Hawkins',
                            'age' => 18,
                            'occupation' => 'University Student',
                            'location' => 'Seattle, Washington',
                            'date' => 'June 11, 1974',
                            'summary' => 'A University of Washington student abducted while walking through an alley near her sorority house.'
                        ],
                        [
                            'name' => 'Janice Ann Ott',
                            'age' => 23,
                            'occupation' => 'Probation Caseworker',
                            'location' => 'Lake Sammamish, Washington',
                            'date' => 'July 14, 1974',
                            'summary' => 'Abducted from Lake Sammamish State Park after being approached by a man introducing himself as "Ted."'
                        ],
                        [
                            'name' => 'Denise Marie Naslund',
                            'age' => 19,
                            'occupation' => 'College Student',
                            'location' => 'Lake Sammamish, Washington',
                            'date' => 'July 14, 1974',
                            'summary' => 'Kidnapped from Lake Sammamish State Park only hours after Janice Ott disappeared.'
                        ],
                        [
                            'name' => 'Nancy Wilcox',
                            'age' => 16,
                            'occupation' => 'High School Student',
                            'location' => 'Holladay, Utah',
                            'date' => 'October 2, 1974',
                            'summary' => 'Disappeared while walking home. Bundy later confessed to her murder.'
                        ],
                        [
                            'name' => 'Melissa Anne Smith',
                            'age' => 17,
                            'occupation' => 'High School Student',
                            'location' => 'Midvale, Utah',
                            'date' => 'October 18, 1974',
                            'summary' => 'The daughter of a local police chief who disappeared after leaving a pizza restaurant.'
                        ],
                        [
                            'name' => 'Laura Ann Aime',
                            'age' => 17,
                            'occupation' => 'High School Student',
                            'location' => 'Lehi, Utah',
                            'date' => 'October 31, 1974',
                            'summary' => 'Last seen after leaving a Halloween party. DNA evidence later confirmed Bundy as her killer.'
                        ],
                        [
                            'name' => 'Debra Jean Kent',
                            'age' => 17,
                            'occupation' => 'High School Student',
                            'location' => 'Bountiful, Utah',
                            'date' => 'November 8, 1974',
                            'summary' => 'Disappeared after leaving a school play. Only small remains were ever recovered.'
                        ],
                        [
                            'name' => 'Caryn Eileen Campbell',
                            'age' => 23,
                            'occupation' => 'Registered Nurse',
                            'location' => 'Snowmass, Colorado',
                            'date' => 'January 12, 1975',
                            'summary' => 'Disappeared from a ski resort hotel while on vacation with her fiancé.'
                        ],
                        [
                            'name' => 'Julie Lyle Cunningham',
                            'age' => 26,
                            'occupation' => 'Ski Resort Employee',
                            'location' => 'Vail, Colorado',
                            'date' => 'March 15, 1975',
                            'summary' => 'Vanished while walking to her apartment after work. Her body has never been recovered.'
                        ],
                        [
                            'name' => 'Denise Lynn Oliverson',
                            'age' => 24,
                            'occupation' => 'Administrative Assistant',
                            'location' => 'Grand Junction, Colorado',
                            'date' => 'April 6, 1975',
                            'summary' => 'Disappeared while riding her bicycle to her parents\' home.'
                        ],
                        [
                            'name' => 'Lynnette Dawn Culver',
                            'age' => 12,
                            'occupation' => 'Middle School Student',
                            'location' => 'Pocatello, Idaho',
                            'date' => 'May 6, 1975',
                            'summary' => 'Abducted from her school grounds. Bundy later confessed to her murder.'
                        ],
                        [
                            'name' => 'Susan Curtis',
                            'age' => 15,
                            'occupation' => 'High School Student',
                            'location' => 'Provo, Utah',
                            'date' => 'June 28, 1975',
                            'summary' => 'Disappeared after attending a youth conference at Brigham Young University.'
                        ],
                        [
                            'name' => 'Margaret Elizabeth Bowman',
                            'age' => 21,
                            'occupation' => 'University Student',
                            'location' => 'Tallahassee, Florida',
                            'date' => 'January 15, 1978',
                            'summary' => 'One of two Florida State University students murdered during Bundy\'s attack on the Chi Omega sorority house.'
                        ],
                        [
                            'name' => 'Lisa Janet Levy',
                            'age' => 20,
                            'occupation' => 'University Student',
                            'location' => 'Tallahassee, Florida',
                            'date' => 'January 15, 1978',
                            'summary' => 'Killed during the Chi Omega sorority house attack that led to Bundy\'s eventual conviction.'
                        ],
                        [
                            'name' => 'Kimberly Dianne Leach',
                            'age' => 12,
                            'occupation' => 'Middle School Student',
                            'location' => 'Lake City, Florida',
                            'date' => 'February 9, 1978',
                            'summary' => 'Abducted from her school and became Bundy\'s final confirmed victim before his arrest.'
                        ],
                    ],

                    'wounded' => [
                        [
                            'name' => 'Karen Sparks',
                            'age' => 18,
                            'occupation' => 'University Student',
                            'location' => 'Seattle, Washington',
                            'date' => 'January 4, 1974',
                            'summary' => 'Survived a brutal assault in her home but suffered permanent brain injuries.'
                        ],
                        [
                            'name' => 'Carol DaRonch',
                            'age' => 18,
                            'occupation' => 'Student',
                            'location' => 'Murray, Utah',
                            'date' => 'November 8, 1974',
                            'summary' => 'Escaped after Bundy impersonated a police officer and attempted to kidnap her. Her testimony was crucial in his conviction.'
                        ],
                        [
                            'name' => 'Karen Chandler',
                            'age' => 21,
                            'occupation' => 'University Student',
                            'location' => 'Tallahassee, Florida',
                            'date' => 'January 15, 1978',
                            'summary' => 'Seriously injured during Bundy\'s attack inside the Chi Omega sorority house.'
                        ],
                        [
                            'name' => 'Kathy Kleiner',
                            'age' => 21,
                            'occupation' => 'University Student',
                            'location' => 'Tallahassee, Florida',
                            'date' => 'January 15, 1978',
                            'summary' => 'Survived severe injuries during the Chi Omega attack and later became an advocate for victims.'
                        ],
                        [
                            'name' => 'Cheryl Thomas',
                            'age' => 21,
                            'occupation' => 'University Student',
                            'location' => 'Tallahassee, Florida',
                            'date' => 'January 15, 1978',
                            'summary' => 'Attacked in her apartment shortly after the Chi Omega murders and survived with serious injuries.'
                        ],
                    ]
                ])
            ],

            // 2nd case
            [
                'killer_id' => 2,
                'count' => json_encode([
                    'killed' => [
                        [
                            'name' => 'David Arthur Faraday',
                            'age' => 17,
                            'occupation' => 'High School Student',
                            'location' => 'Benicia, California',
                            'date' => 'December 20, 1968',
                            'summary' => 'A high school student who was shot while on his first date with Betty Lou Jensen near Lake Herman Road.'
                        ],
                        [
                            'name' => 'Betty Lou Jensen',
                            'age' => 16,
                            'occupation' => 'High School Student',
                            'location' => 'Benicia, California',
                            'date' => 'December 20, 1968',
                            'summary' => 'Killed while attempting to flee from the attacker during the Lake Herman Road shootings.'
                        ],
                        [
                            'name' => 'Darlene Elizabeth Ferrin',
                            'age' => 22,
                            'occupation' => 'Restaurant Waitress',
                            'location' => 'Vallejo, California',
                            'date' => 'July 5, 1969',
                            'summary' => 'Shot multiple times while parked with Michael Mageau at Blue Rock Springs Park. She later died from her injuries.'
                        ],
                        [
                            'name' => 'Cecelia Ann Shepard',
                            'age' => 22,
                            'occupation' => 'University Student',
                            'location' => 'Lake Berryessa, California',
                            'date' => 'September 27, 1969',
                            'summary' => 'Attacked while picnicking with Bryan Hartnell. She died two days later from her injuries.'
                        ],
                        [
                            'name' => 'Paul Lee Stine',
                            'age' => 29,
                            'occupation' => 'Taxi Driver',
                            'location' => 'San Francisco, California',
                            'date' => 'October 11, 1969',
                            'summary' => 'A taxi driver who was fatally shot during a robbery-like attack in San Francisco. His murder provided the most detailed witness descriptions of the Zodiac Killer.'
                        ],
                    ],

                    'wounded' => [
                        [
                            'name' => 'Michael Renault Mageau',
                            'age' => 19,
                            'occupation' => 'Restaurant Worker',
                            'location' => 'Vallejo, California',
                            'date' => 'July 5, 1969',
                            'summary' => 'Survived the Blue Rock Springs attack despite being shot multiple times. He later provided investigators with a description of the attacker.'
                        ],
                        [
                            'name' => 'Bryan Calvin Hartnell',
                            'age' => 20,
                            'occupation' => 'University Student',
                            'location' => 'Lake Berryessa, California',
                            'date' => 'September 27, 1969',
                            'summary' => 'Survived a stabbing attack at Lake Berryessa and gave investigators one of the most detailed accounts of the Zodiac Killer.'
                        ],
                    ]
                ])
            ],

            // 3rd case
            [
                'killer_id' => 3,
                'count' => json_encode([
                    'killed' => [
                        [
                            'name' => 'Mary Ann Nichols',
                            'age' => 43,
                            'occupation' => 'Domestic Servant',
                            'location' => 'Whitechapel, London, England',
                            'date' => 'August 31, 1888',
                            'summary' => 'Known as "Polly," Nichols is widely regarded as the first of Jack the Ripper\'s five canonical victims. She had experienced homelessness and financial hardship before her murder.'
                        ],
                        [
                            'name' => 'Annie Chapman',
                            'age' => 47,
                            'occupation' => 'Domestic Servant',
                            'location' => 'Whitechapel, London, England',
                            'date' => 'September 8, 1888',
                            'summary' => 'Chapman struggled with poor health and poverty after separating from her husband. Her murder increased fear throughout London\'s East End.'
                        ],
                        [
                            'name' => 'Elizabeth Stride',
                            'age' => 44,
                            'occupation' => 'Charwoman',
                            'location' => 'Whitechapel, London, England',
                            'date' => 'September 30, 1888',
                            'summary' => 'Originally from Sweden, Stride was murdered during the "Double Event." Many investigators believe the killer was interrupted before further injuries could be inflicted.'
                        ],
                        [
                            'name' => 'Catherine Eddowes',
                            'age' => 46,
                            'occupation' => 'Casual Worker',
                            'location' => 'Whitechapel, London, England',
                            'date' => 'September 30, 1888',
                            'summary' => 'Killed less than an hour after Elizabeth Stride. Her murder is closely connected to one of history\'s most famous unsolved investigations.'
                        ],
                        [
                            'name' => 'Mary Jane Kelly',
                            'age' => 25,
                            'occupation' => 'Prostitute',
                            'location' => 'Whitechapel, London, England',
                            'date' => 'November 9, 1888',
                            'summary' => 'The youngest of the canonical victims and the only one killed indoors. She is generally believed to be Jack the Ripper\'s final canonical victim.'
                        ],
                    ],

                    'wounded' => []
                ])
            ],

            // 4th case
            [
                'killer_id' => 4,
                'count' => json_encode([
                    'killed' => [
                        [
                            'name' => 'Timothy Jack McCoy',
                            'age' => 16,
                            'occupation' => 'High School Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'January 3, 1972',
                            'summary' => 'Considered John Wayne Gacy\'s first known murder victim after spending the night at Gacy\'s home.'
                        ],
                        [
                            'name' => 'John Butkovich',
                            'age' => 18,
                            'occupation' => 'Mechanic',
                            'location' => 'Chicago, Illinois',
                            'date' => 'July 31, 1975',
                            'summary' => 'An employee of Gacy who disappeared after confronting him over unpaid wages.'
                        ],
                        [
                            'name' => 'Darrell Julius Samson',
                            'age' => 18,
                            'occupation' => 'Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'April 6, 1976',
                            'summary' => 'Last seen alive after leaving home. His remains were later identified among Gacy\'s victims.'
                        ],
                        [
                            'name' => 'Randall Wayne Reffett',
                            'age' => 15,
                            'occupation' => 'High School Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'May 14, 1976',
                            'summary' => 'One of Gacy\'s youngest identified victims.'
                        ],
                        [
                            'name' => 'Samuel G. Dodd Stapleton',
                            'age' => 14,
                            'occupation' => 'Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'May 14, 1976',
                            'summary' => 'Disappeared alongside Randall Reffett. Both boys were later identified among Gacy\'s victims.'
                        ],
                        [
                            'name' => 'Michael Lawrence Bonnin',
                            'age' => 17,
                            'occupation' => 'High School Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'July 3, 1976',
                            'summary' => 'Abducted while walking to a train station and later identified through dental records.'
                        ],
                        [
                            'name' => 'William Huey Carroll Jr.',
                            'age' => 16,
                            'occupation' => 'Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'June 13, 1977',
                            'summary' => 'A teenager who disappeared after leaving home and was later identified as one of Gacy\'s victims.'
                        ],
                        [
                            'name' => 'James Byron Haakenson',
                            'age' => 16,
                            'occupation' => 'Student',
                            'location' => 'Saint Paul, Minnesota',
                            'date' => 'August 5, 1976',
                            'summary' => 'Ran away from home before eventually encountering Gacy.'
                        ],
                        [
                            'name' => 'Rick Louis Johnston',
                            'age' => 17,
                            'occupation' => 'Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'August 6, 1976',
                            'summary' => 'Disappeared shortly after James Haakenson. Both were later identified among Gacy\'s victims.'
                        ],
                        [
                            'name' => 'Kenneth Ray Parker',
                            'age' => 16,
                            'occupation' => 'Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'October 24, 1976',
                            'summary' => 'One of several teenage boys murdered by Gacy during 1976.'
                        ],
                        [
                            'name' => 'Michael M. Marino',
                            'age' => 14,
                            'occupation' => 'Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'October 24, 1976',
                            'summary' => 'The youngest positively identified victim found beneath Gacy\'s house.'
                        ],
                        [
                            'name' => 'William George Bundy',
                            'age' => 19,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'October 26, 1976',
                            'summary' => 'Worked in construction and was later identified through forensic evidence.'
                        ],
                        [
                            'name' => 'Francis Wayne Alexander',
                            'age' => 21,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'Early 1977',
                            'summary' => 'One of Gacy\'s employees who disappeared after working for him.'
                        ],
                        [
                            'name' => 'Gregory John Godzik',
                            'age' => 17,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'December 12, 1976',
                            'summary' => 'Worked briefly for Gacy before disappearing.'
                        ],
                        [
                            'name' => 'John Alan Szyc',
                            'age' => 19,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'January 20, 1977',
                            'summary' => 'Accepted a job offer from Gacy shortly before disappearing.'
                        ],
                        [
                            'name' => 'Jon Steven Prestidge',
                            'age' => 20,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'March 1977',
                            'summary' => 'One of several young men employed by Gacy who never returned home.'
                        ],
                        [
                            'name' => 'Matthew Walter Bowman',
                            'age' => 19,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'July 5, 1977',
                            'summary' => 'Disappeared after accepting work with Gacy.'
                        ],
                        [
                            'name' => 'Robert Edward Gilroy Jr.',
                            'age' => 18,
                            'occupation' => 'Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'September 15, 1977',
                            'summary' => 'Last seen alive while traveling to visit a friend.'
                        ],
                        [
                            'name' => 'John Antheney Mowery',
                            'age' => 19,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'September 25, 1977',
                            'summary' => 'Accepted temporary construction work shortly before disappearing.'
                        ],
                        [
                            'name' => 'Russell Lloyd Nelson',
                            'age' => 21,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'October 17, 1977',
                            'summary' => 'Worked for Gacy and was later identified among the victims recovered from the property.'
                        ],
                        [
                            'name' => 'Robert David Winch',
                            'age' => 16,
                            'occupation' => 'High School Student',
                            'location' => 'Chicago, Illinois',
                            'date' => 'November 10, 1977',
                            'summary' => 'A teenage student who disappeared while walking home.'
                        ],
                        [
                            'name' => 'Tommy Joseph Boling',
                            'age' => 20,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'January 1978',
                            'summary' => 'One of the final identified victims murdered before Gacy\'s arrest.'
                        ],
                        [
                            'name' => 'David Paul Talsma',
                            'age' => 19,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'December 9, 1978',
                            'summary' => 'Accepted a construction job from Gacy shortly before disappearing.'
                        ],
                        [
                            'name' => 'William Wayne Kindred',
                            'age' => 19,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'February 16, 1976',
                            'summary' => 'A young laborer whose remains were later recovered from Gacy\'s property.'
                        ],
                        [
                            'name' => 'Timothy David O\'Rourke',
                            'age' => 20,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'June 1977',
                            'summary' => 'Worked for Gacy before disappearing without a trace.'
                        ],
                        [
                            'name' => 'Frank William Landingin',
                            'age' => 19,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'November 4, 1978',
                            'summary' => 'One of Gacy\'s last known victims before the investigation intensified.'
                        ],
                        [
                            'name' => 'James Mazzara',
                            'age' => 20,
                            'occupation' => 'Construction Worker',
                            'location' => 'Chicago, Illinois',
                            'date' => 'Late 1978',
                            'summary' => 'Disappeared after accepting temporary work from Gacy.'
                        ],
                        [
                            'name' => 'Robert Jerome Piest',
                            'age' => 15,
                            'occupation' => 'High School Student',
                            'location' => 'Des Plaines, Illinois',
                            'date' => 'December 11, 1978',
                            'summary' => 'His disappearance led investigators to Gacy\'s home, ultimately exposing the murders.'
                        ],
                        [
                            'name' => 'Unknown',
                            'age' => '17-21',
                            'occupation' => 'Unknown',
                            'location' => 'Chicago, Illinois',
                            'date' => 'Unknown',
                            'summary' => 'One of several victims whose identity remains unknown despite extensive forensic investigations.'
                        ],
                        [
                            'name' => 'Unknown',
                            'age' => '17-22',
                            'occupation' => 'Unknown',
                            'location' => 'Chicago, Illinois',
                            'date' => 'Unknown',
                            'summary' => 'Human remains recovered from Gacy\'s property that have not yet been conclusively identified.'
                        ],
                        [
                            'name' => 'Unknown',
                            'age' => '15-24',
                            'occupation' => 'Unknown',
                            'location' => 'Chicago, Illinois',
                            'date' => 'Unknown',
                            'summary' => 'Believed to have been a young male victim murdered by John Wayne Gacy.'
                        ],
                        [
                            'name' => 'Unknown',
                            'age' => '23-30',
                            'occupation' => 'Unknown',
                            'location' => 'Chicago, Illinois',
                            'date' => 'Unknown',
                            'summary' => 'Recovered remains have not yet been matched to a confirmed identity.'
                        ],
                        [
                            'name' => 'Unknown',
                            'age' => '14-18',
                            'occupation' => 'Unknown',
                            'location' => 'Chicago, Illinois',
                            'date' => 'Unknown',
                            'summary' => 'One of the unidentified victims whose identity remains an active subject of historical forensic research.'
                        ],
                    ],

                    'wounded' => [],
                ])
            ],

            // 5th case
            [
                'killer_id' => 5,
                'count' => json_encode([
                    'killed' => [
                        [
                            'name' => 'Steven Mark Hicks',
                            'age' => 18,
                            'occupation' => 'Hitchhiker',
                            'location' => 'Bath Township, Ohio',
                            'date' => 'June 18, 1978',
                            'summary' => 'Jeffrey Dahmer\'s first victim. Hicks accepted a ride from Dahmer before being killed at his family home.'
                        ],
                        [
                            'name' => 'Steven Walter Tuomi',
                            'age' => 25,
                            'occupation' => 'Hotel Guest',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'September 1987',
                            'summary' => 'Met Dahmer at a bar and accompanied him to a hotel. Dahmer later claimed to have no memory of killing him.'
                        ],
                        [
                            'name' => 'James Edward Doxtator',
                            'age' => 14,
                            'occupation' => 'Student',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'January 16, 1988',
                            'summary' => 'A Native American teenager lured with money in exchange for posing for photographs.'
                        ],
                        [
                            'name' => 'Richard Guerrero',
                            'age' => 22,
                            'occupation' => 'Factory Worker',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'March 24, 1988',
                            'summary' => 'Met Dahmer outside a gay bar before becoming one of his victims.'
                        ],
                        [
                            'name' => 'Anthony Lee Sears',
                            'age' => 24,
                            'occupation' => 'Model',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'March 25, 1989',
                            'summary' => 'An aspiring model whose remains were among the first Dahmer preserved.'
                        ],
                        [
                            'name' => 'Raymond Lamont Smith (a.k.a. Ricky Beeks)',
                            'age' => 32,
                            'occupation' => 'Sex Worker',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'May 20, 1990',
                            'summary' => 'His murder marked the beginning of Dahmer\'s final killing spree.'
                        ],
                        [
                            'name' => 'Edward Warren Smith',
                            'age' => 27,
                            'occupation' => 'Unknown',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'June 14, 1990',
                            'summary' => 'Met Dahmer in a bar before accompanying him home.'
                        ],
                        [
                            'name' => 'Ernest Marquez Miller',
                            'age' => 22,
                            'occupation' => 'Dancer',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'September 2, 1990',
                            'summary' => 'A Chicago native who was offered money to pose for photographs.'
                        ],
                        [
                            'name' => 'David Courtney Thomas',
                            'age' => 22,
                            'occupation' => 'Unknown',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'September 24, 1990',
                            'summary' => 'Met Dahmer shortly before disappearing. His remains were later recovered.'
                        ],
                        [
                            'name' => 'Curtis Durrell Straughter',
                            'age' => 17,
                            'occupation' => 'Student',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'February 18, 1991',
                            'summary' => 'One of Dahmer\'s youngest adult victims who was approached near a bus stop.'
                        ],
                        [
                            'name' => 'Errol Lindsey',
                            'age' => 19,
                            'occupation' => 'Laborer',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'April 7, 1991',
                            'summary' => 'One of the victims subjected to Dahmer\'s attempts at creating a compliant "living zombie."'
                        ],
                        [
                            'name' => 'Tony Anthony Hughes',
                            'age' => 31,
                            'occupation' => 'Model',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'May 24, 1991',
                            'summary' => 'A deaf and non-verbal man who met Dahmer at a local bar.'
                        ],
                        [
                            'name' => 'Konerak Sinthasomphone',
                            'age' => 14,
                            'occupation' => 'Student',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'May 27, 1991',
                            'summary' => 'Escaped Dahmer briefly before being returned to his apartment by police after Dahmer falsely claimed to be his partner.'
                        ],
                        [
                            'name' => 'Matt Cleveland Turner',
                            'age' => 20,
                            'occupation' => 'Student',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'June 30, 1991',
                            'summary' => 'Traveling through Milwaukee when he encountered Dahmer.'
                        ],
                        [
                            'name' => 'Jeremiah Benjamin Weinberger',
                            'age' => 23,
                            'occupation' => 'Unknown',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'July 5, 1991',
                            'summary' => 'Visited Milwaukee from Chicago and met Dahmer shortly before disappearing.'
                        ],
                        [
                            'name' => 'Oliver Joseph Lacy',
                            'age' => 24,
                            'occupation' => 'Bodybuilder',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'July 15, 1991',
                            'summary' => 'A bodybuilder whom Dahmer met on the street before luring him to his apartment.'
                        ],
                        [
                            'name' => 'Joseph Arthur Bradehoft',
                            'age' => 25,
                            'occupation' => 'Construction Worker',
                            'location' => 'Milwaukee, Wisconsin',
                            'date' => 'July 19, 1991',
                            'summary' => 'Jeffrey Dahmer\'s final victim before his arrest three days later.'
                        ],
                    ],

                    'wounded' => []
                ])
            ],

            // 6th case
            [
                'killer_id' => 6,
                'count' => json_encode([
                    'killed' => [
                        [
                            'name' => 'Yolanda Washington',
                            'age' => 17,
                            'occupation' => 'High School Student',
                            'location' => 'Houston, Texas',
                            'date' => 'December 1979',
                            'summary' => 'Believed to be one of Coral Eugene Watts\' earliest confirmed victims. She disappeared while walking home.'
                        ],
                        [
                            'name' => 'Judith Lynn Miller',
                            'age' => 15,
                            'occupation' => 'High School Student',
                            'location' => 'Houston, Texas',
                            'date' => 'September 11, 1980',
                            'summary' => 'A teenage girl attacked while walking through her neighborhood. Her murder was later linked to Watts.'
                        ],
                        [
                            'name' => 'Nancy Jo Baird',
                            'age' => 21,
                            'occupation' => 'Office Worker',
                            'location' => 'Houston, Texas',
                            'date' => 'October 1980',
                            'summary' => 'Disappeared after leaving work. Her body was later discovered and connected to Watts.'
                        ],
                        [
                            'name' => 'Debra Jackson',
                            'age' => 32,
                            'occupation' => 'Nurse',
                            'location' => 'Houston, Texas',
                            'date' => '1981',
                            'summary' => 'Killed while walking through her neighborhood during Watts\' series of random attacks.'
                        ],
                        [
                            'name' => 'Linda Lee Sparks',
                            'age' => 18,
                            'occupation' => 'Student',
                            'location' => 'Houston, Texas',
                            'date' => '1981',
                            'summary' => 'One of several young women targeted while alone in public.'
                        ],
                        [
                            'name' => 'Sonja Johnson',
                            'age' => 14,
                            'occupation' => 'Student',
                            'location' => 'Houston, Texas',
                            'date' => '1981',
                            'summary' => 'A young teenager murdered during Watts\' crime spree in Houston.'
                        ],
                        [
                            'name' => 'Maria Hernandez',
                            'age' => 21,
                            'occupation' => 'Retail Worker',
                            'location' => 'Houston, Texas',
                            'date' => '1982',
                            'summary' => 'Attacked after leaving work. She was initially believed to have survived but later died from the assault.'
                        ],
                        [
                            'name' => 'Mignon DuFree',
                            'age' => 15,
                            'occupation' => 'High School Student',
                            'location' => 'Houston, Texas',
                            'date' => '1982',
                            'summary' => 'A high school student who became one of Watts\' youngest confirmed victims.'
                        ],
                        [
                            'name' => 'Yolanda Johnson',
                            'age' => 21,
                            'occupation' => 'College Student',
                            'location' => 'Houston, Texas',
                            'date' => '1982',
                            'summary' => 'Killed while walking alone. Her case was later attributed to Coral Eugene Watts.'
                        ],
                        [
                            'name' => 'Jacqueline Lamotte',
                            'age' => 15,
                            'occupation' => 'Student',
                            'location' => 'Houston, Texas',
                            'date' => '1982',
                            'summary' => 'One of several teenage girls murdered during Watts\' attacks.'
                        ],
                        [
                            'name' => 'Cindy Hudspeth',
                            'age' => 20,
                            'occupation' => 'College Student',
                            'location' => 'Houston, Texas',
                            'date' => '1982',
                            'summary' => 'Disappeared while walking alone. Her murder remained unsolved until Watts confessed to multiple killings.'
                        ],
                        [
                            'name' => 'Diane Wilder',
                            'age' => 27,
                            'occupation' => 'Secretary',
                            'location' => 'Detroit, Michigan',
                            'date' => '1982',
                            'summary' => 'One of the victims killed after Watts relocated to Michigan.'
                        ],
                        [
                            'name' => 'Kimberly Nelson',
                            'age' => 22,
                            'occupation' => 'Student',
                            'location' => 'Detroit, Michigan',
                            'date' => '1982',
                            'summary' => 'Among the final confirmed victims linked to Coral Eugene Watts before his arrest.'
                        ],
                    ],

                    'wounded' => []
                ])
            ],
        ]);
    }
}
