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
                    ['name' => 'Elizabeth Short', 'age' => 22],
                ]),
                'suspects' => json_encode([
                    ['name' => 'George Hodel', 'age' => 41],
                    ['name' => 'Leslie Dillon', 'age' => 27],
                    ['name' => 'Mark Hansen', 'age' => 60],
                    ['name' => 'Robert Manley', 'age' => 25],
                ]),
                'description' => <<<TEXT
                The Black Dahlia case refers to the murder of Elizabeth Short, a young woman whose death in 1947 became one of the most infamous unsolved crimes in American history. The case gained its nickname from the press, who labeled Short "The Black Dahlia," a reference to her dark clothing and the film noir style of the era. What began as a local investigation in Los Angeles quickly evolved into a national obsession, fueled by the brutality of the crime and the complete absence of a definitive suspect.

                Elizabeth Short was last seen in Los Angeles in January 1947. Days later, her body was discovered in a vacant lot in the Leimert Park area. The condition in which she was found shocked investigators and the public alike, and the case immediately drew intense media attention. Within hours, newspapers across the country were reporting on the discovery, turning Short's name into a headline that would never fully fade.

                Elizabeth Short was a young woman who had moved between cities on the West Coast and worked various small jobs. In 1943, she was briefly detained for underage drinking, during which her fingerprints and identification records were taken. These records would later play a role in confirming her identity after her death in 1947. Like many people drawn to Los Angeles during that era, she was pursuing stability and opportunity in a city that often failed to deliver either.

                The investigation into her murder was extensive but chaotic. Law enforcement received thousands of tips, confessions, and alleged sightings, many of which led nowhere. At the time, forensic methods were limited, and the overwhelming media attention further complicated the process. Evidence was often contaminated or misinterpreted, and the sheer volume of public interest created additional pressure that did not translate into progress.

                Over time, several suspects were considered, but none were conclusively linked to the crime. Investigators pursued multiple leads, some based on witness statements and others on circumstantial connections, yet each path ultimately failed to produce a definitive resolution. As years passed, the case slowly transitioned from active investigation to historical mystery.

                Theories about the identity of the killer have ranged widely, from individuals known to Short to entirely speculative connections involving unrelated crimes. Despite decades of analysis, no theory has been proven, and no suspect has been officially confirmed. The case remains open in a technical sense, but functionally unresolved.

                Today, the Black Dahlia case stands as a symbol of unresolved violence and the limitations of mid-20th-century investigative methods. It also reflects the way media attention can shape and sometimes distort public understanding of a crime. Most importantly, it preserves the memory of Elizabeth Short, whose life was reduced in the public record to a name attached to an unsolved act of brutality.
                TEXT,
                'image' => 'black-dahlia.jpg'
            ],

            // 2nd case
            [
                'name' => 'Villisca Axe Murders',
                'country' => 'USA',
                'count' => json_encode([
                    ['name' => 'Paul Vernon Moore', 'age' => 5],
                    ['name' => 'Arthur Boyd Moore', 'age' => 7],
                    ['name' => 'Ina May Stillinger', 'age' => 8],
                    ['name' => 'Mary Katherine Moore', 'age' => 10],
                    ['name' => 'Lena Gertrude Stillinger', 'age' => 11],
                    ['name' => 'Herman Montgomery Moore', 'age' => 11],
                    ['name' => 'Saraha Moore', 'age' => 39],
                    ['name' => 'Josiah B. Moore', 'age' => 43],
                ]),
                'suspects' => json_encode([
                    ['name' => 'William Mansfield', 'age' => 52],
                    ['name' => 'Frank F. Jones', 'age' => 57],
                    ['name' => 'William "Blackie" Mansfield', 'age' => 23],
                    ['name' => 'Henry Moore', 'age' => 35],
                    ['name' => 'Reverend George Kelly', 'age' => 36],
                ]),
                'description' => <<<TEXT
                The Villisca Axe Murders refer to the brutal unsolved killing of eight people in a small house in Villisca, Iowa, in 1912. The case remains one of the most haunting family massacres in American history, largely due to the lack of a confirmed suspect and the eerie circumstances surrounding the crime scene. Over a century later, it continues to draw attention for both its brutality and its unanswered questions.

                The victims were members of the Moore family and two young guests who had been staying overnight. In the early hours of June 10, 1912, all eight individuals were killed inside the home while they slept. The weapon used was an axe belonging to the family, which was left at the scene. There were no clear signs of forced entry, and the attack appeared to have occurred while the victims were unaware, adding to the disturbing nature of the case.

                The discovery was made later that morning when neighbors became concerned after seeing no activity at the house. What they found inside revealed a scene of extreme violence, with every occupant of the home having been killed. However, before law enforcement could properly secure the location, the crime scene was heavily disturbed by members of the public who entered the house out of curiosity. Items were moved, surfaces were touched, and potential evidence was handled or removed, severely compromising the investigation. In one of the more disturbing accounts, it is reported that a piece of one victim's skull was even taken as a grim "souvenir." This uncontrolled interference added significant difficulty for investigators, who were already limited by the forensic methods of the time.

                The investigation into the Villisca Axe Murders was extensive for its time, but limited by early 20th-century forensic capabilities. Authorities questioned numerous individuals, including traveling workers, local residents, and potential suspects passing through the area around the time of the crime. Despite these efforts, no one was ever convicted in connection with the murders.

                Over the years, several theories have emerged regarding the identity of the perpetrator. Some focus on a transient individual seen in the area prior to the crime, while others suggest possible personal motives tied to individuals known to the family. However, none of these theories have been proven, and the case remains officially unsolved.

                The house itself became part of the case's legacy. Its preservation and later restoration turned it into a site of public fascination, with visitors drawn to its history and the unanswered questions surrounding what happened inside. The murders also contributed to broader discussions about rural policing and the challenges of investigating violent crime in isolated communities during that period.

                Today, the Villisca Axe Murders stand as a reminder of how complete and sudden violence can erase a family without leaving behind a clear explanation. The case remains open in public memory, defined not by resolution, but by the silence that followed the events of that night.
                TEXT,
                'image' => 'villisca-axe-murders.jpg'
            ],

            // 3rd case
            [
                'name' => 'Oklahoma Girl Scout Murders',
                'country' => 'USA',
                'count' => json_encode([
                    ['name' => 'Lori Lee Farme', 'age' => 8],
                    ['name' => 'Michele Heather Guse', 'age' => 9],
                    ['name' => 'Doris Denise Milner', 'age' => 10],
                ]),
                'suspects' => json_encode([
                    ['name' => 'Gene Leroy Hart', 'age' => 33],
                ]),
                'description' => <<<TEXT
                The Oklahoma Girl Scout Murders refer to the unsolved killings of three young girls at Camp Scott in Locust Grove, Oklahoma, in June 1977. The case remains one of the most disturbing unresolved crimes in Americas history, largely due to the vulnerability of the victims, the setting of the crime, and the failure to conclusively identify the perpetrator despite early leads and extensive investigation.

                The victims were three Girl Scouts who had arrived at the camp for a summer session only hours before their deaths. On the night of June 12, they were taken from their tent and later found in a wooded area several hundred feet away. The crime appeared to have occurred during the early hours of the morning, while the rest of the camp remained unaware. The nature of the attack suggested premeditation and familiarity with the camp's layout.

                The discovery was made after counselors and staff realized the girls were missing. A search of the surrounding area led to the discovery of their bodies, which confirmed that a violent crime had taken place within the camp. The event immediately triggered panic among campers and staff, and the site was quickly secured as authorities began their investigation.

                The investigation was extensive and involved multiple agencies. Early attention focused on a man who had escaped from a nearby mental health facility shortly before the murders, and he was considered a primary suspect for a time. Despite circumstantial connections, no physical evidence conclusively linked him to the crime, and he was later cleared. Investigators also pursued other leads, but the lack of definitive forensic evidence made progress difficult.

                Over time, several theories emerged regarding the identity of the killer, ranging from opportunistic intrusion to someone familiar with the camp environment. Some aspects of the case suggested planning and control, while others remained inconsistent or unclear, leaving investigators without a single cohesive explanation.

                Despite continued public interest and periodic re-examinations of the evidence, no individual has ever been formally charged or convicted in connection with the murders. The case remains officially unsolved, with only fragments of certainty amid a broader field of unanswered questions.

                Today, the Oklahoma Girl Scout Murders are remembered not only for their brutality, but for the profound sense of violation they created in a place meant for safety and childhood. The case continues to stand as a reminder of how quickly perceived safety can collapse, and how some investigations never reach the closure they demand.
                TEXT,
                'image' => 'girl-scout-murders.jpg'
            ],

            // 4th case
            [
                'name' => 'Keddie Cabin Murders',
                'country' => 'USA',
                'count' => json_encode([
                    ['name' => 'Tina Sharp', 'age' => 12],
                    ['name' => 'John Sharp', 'age' => 15],
                    ['name' => 'Dana Wingate', 'age' => 17],
                    ['name' => 'Glenna Susan Sharp', 'age' => 36],
                ]),
                'suspects' => json_encode([
                    ['name' => 'Martin Smartt', 'age' => 44],
                    ['name' => 'John', 'age' => 36],
                ]),
                'description' => <<<TEXT
                The Keddie Cabin Murders refer to the unsolved killings of three members of the Sharp family and one visiting guest in April 1981 in Keddie, California. The case is one of the most disturbing unsolved crimes in the state's history, not only because of the violence involved, but because of the time gap between the murders and the discovery of key details that suggested early investigative failures.

                The victims included Sue Sharp, her son John Sharp, his friend Dana Wingate, and Sue's daughter Tina Sharp, who initially disappeared from the scene and was later confirmed to be missing for several years. The murders took place inside Cabin 28 at the Keddie Resort, where the family had been living. The attack occurred during the night of April 11-12, 1981, while others nearby were in close proximity but did not immediately notice anything unusual.

                The discovery of the crime scene happened when Sue Sharp's daughter Sheila returned home and found the bodies inside the cabin. What she encountered revealed a violent and chaotic scene that immediately prompted police involvement. However, by the time authorities arrived, the investigation was already complicated by delays in reporting and limited early preservation of the scene.

                In the years that followed, it became clear that the investigation faced significant challenges. Evidence was not fully secured in the earliest stages, and some potential leads were not pursued with the level of urgency later thought necessary. Tina Sharp's disappearance remained unresolved for decades, adding another layer of uncertainty to the case.

                Over time, several suspects were considered, including individuals with prior connections to the area. One of the more persistent theories involves two men who were seen in the vicinity and later became subjects of renewed investigative interest. Despite this, no one has ever been officially convicted for the murders, and the case remains open.

                The Keddie Cabin Murders have since become a focal point in discussions about rural policing, evidence preservation, and how early missteps in an investigation can permanently shape its outcome. Periodic re-examinations of the case have continued into the present day, but no definitive resolution has been reached.

                Today, the case stands as a reminder of how fragile investigative clarity can be in the earliest hours of a crime, and how missing or mishandled evidence can leave a case suspended indefinitely between known facts and unresolved questions.
                TEXT,
                'image' => 'keddie-cabin-murders.jpg'
            ],

            // 5th case
            [
                'name' => 'Boy in the Box',
                'country' => 'USA',
                'count' => json_encode([
                    ['name' => 'Joseph Augustus Zarelli', 'age' => 4],
                ]),
                'suspects' => json_encode([
                    ['name' => 'Unknown', 'age' => 'N/A'],
                ]),
                'description' => <<<TEXT
                The case known as the "Boy in the Box" refers to the discovery of an unidentified young child found deceased in Philadelphia, Pennsylvania, in February 1957. For decades, the case remained one of the most enduring cold cases in the United States, largely due to the lack of identity for the victim and the absence of any confirmed suspect. In 2022, the child was finally identified through advanced forensic genetic genealogy as Joseph Augustus Zarelli, bringing long-awaited resolution to his name, though not to the circumstances surrounding his death.

                The boy was discovered inside a cardboard box in a wooded area in Philadelphia. He appeared to be around four to six years old at the time. The condition of the body suggested that he had been deceased for some time before being found. Despite efforts by authorities to publicize the case and identify him, no missing person report conclusively matched his identity at the time, and he became known only by the circumstances of his discovery.

                The investigation that followed was extensive for its era, involving widespread distribution of the boy's image and details in hopes of recognition. Despite these efforts, no definitive leads emerged. The lack of modern forensic tools at the time severely limited the ability to trace evidence, and the case gradually went cold, becoming a symbol of unresolved identity rather than just an unsolved crime.

                Over the decades, the case remained open in public memory. Advances in forensic science eventually allowed investigators to revisit the evidence. Through genetic genealogy techniques, the boy was finally identified in 2022 as Joseph Augustus Zarelli, restoring his name after more than sixty years of anonymity. However, despite this breakthrough, the circumstances of his death and the identity of those responsible remain unknown.

                Today, the case stands in a different light than many others in this collection. It is no longer entirely anonymous, but it is still deeply incomplete. A name was recovered, but answers about what happened to him were not. The case continues to represent both the limits and the progress of investigative science, and the long delay between a life lost and a life finally acknowledged.
                TEXT,
                'image' => 'boy-in-the-box.jpg'
            ],
        ]);
    }
}
