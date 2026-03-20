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
                'victim_count' => json_encode([
                    'killed' => [
                        'claimed' => 30,
                        'confirmed' => 20,
                    ],
                    'wounded' => 5,
                ]),
                'description' => <<<TEXT
                Ted Bundy was not the kind of man people were taught to fear. He was educated, articulate, and, by many accounts, even charming. In the 1970s, across multiple states in the United States, that carefully constructed image allowed him to move unnoticed through society while committing a series of brutal crimes that would later make his name synonymous with calculated violence.

                Born Theodore Robert Bundy in 1946, his early life was marked by confusion and instability. Raised believing his grandparents were his parents and his mother was his sister, Bundy grew up in an environment layered with secrecy and emotional distance. While much of his childhood appeared outwardly ordinary, later accounts suggest early warning signs, including disturbing fascinations and a growing detachment from others.

                Bundy's crimes began to take shape in the early 1970s. He primarily targeted young women, often approaching them in public places by pretending to be injured or in need of help. Using charm and manipulation, he gained their trust before abducting them. His attacks were methodical and deliberate, often carried out in secluded areas. Over time, patterns began to emerge, linking disappearances across Washington, Oregon, Utah, and Colorado. Despite this, his ability to blend in allowed him to evade immediate suspicion.

                The investigation into Bundy's crimes was complicated by the lack of centralized communication between law enforcement agencies at the time. Different jurisdictions struggled to connect the cases, even as similarities became increasingly apparent. Witness descriptions occasionally mentioned a polite man named "Ted," but the name was so common it provided little immediate help. As the number of victims grew, so did public fear, with communities becoming increasingly aware that a predator was operating in plain sight.

                Bundy was eventually arrested in 1975 during a routine traffic stop, when police found suspicious items in his vehicle. Although initially charged with lesser crimes, further investigation began to tie him to multiple disappearances. What followed was a series of trials, escapes, and recaptures that only intensified public attention. In a chilling turn, Bundy managed to escape custody twice, committing additional murders before being apprehended for the final time.

                In 1979, Bundy was convicted of multiple murders in Florida. Over the years, he confessed to numerous killings, though the exact number of victims remains uncertain. He was executed in 1989 at the age of 42.

                Bundy's case left a lasting impact on criminal investigations and public perception. It challenged the assumption that danger is always visible, forcing both law enforcement and society to reconsider how predators can operate. More importantly, his crimes left behind a long list of victims whose lives were cut short, a reminder that behind every headline and statistic are real people, not just stories.
                TEXT,
                'image' => 'ted-bundy.jpg'
            ],

            // 2nd case
            [
                'name' => 'Unknown',
                'nickname' => 'Zodiac Killer',
                'age' => 'N/A',
                'country' => 'USA',
                'victim_count' => json_encode([
                    'killed' => [
                        'claimed' => 37,
                        'confirmed' => 5,
                    ],
                    'wounded' => 2,
                ]),
                'description' => <<<TEXT
                The Zodiac Killer remains one of the most infamous unidentified criminals in modern history. Operating in Northern California during the late 1960s and early 1970s, the killer distinguished himself not only through acts of violence, but through a series of taunting letters sent to newspapers and law enforcement. These messages, often containing cryptograms and threats, turned the case into a public spectacle and cemented the Zodiac's place in criminal history.

                Very little is known about the individual behind the name. Unlike many serial offenders, the Zodiac left no confirmed identity, no clear background, and no definitive origin story. What exists instead is a fragmented profile built from witness descriptions, surviving victims, and the killer's own writings. He appeared organized, calculating, and deeply motivated by a desire for attention and control.

                The confirmed attacks began in 1968 with the shooting of a young couple near Vallejo, California. Over the following years, additional attacks occurred, often targeting couples in secluded areas. In one instance, the killer approached his victims wearing a dark, executioner-style hood marked with a crosshair symbol, binding them before carrying out the attack. While most victims did not survive, a small number did, providing critical, though limited, testimony.

                What set the Zodiac apart was his communication with the public. He sent letters to newspapers filled with coded messages, some of which remain unsolved to this day. In these writings, he claimed responsibility for more victims than could be confirmed and threatened further violence if his messages were not published. His tone was often mocking, presenting himself as untouchable and in control.

                The investigation faced significant challenges. Jurisdictional limitations, inconsistent evidence, and the killer's sporadic activity made it difficult to form a complete picture. Despite multiple suspects being considered over the years, none were definitively proven to be the Zodiac. Advances in forensic science have periodically revived interest in the case, but no conclusive identification has been made.

                By the early 1970s, the Zodiac's confirmed attacks ceased, though letters continued for some time. Eventually, even those stopped, leaving behind a trail of fear, unanswered questions, and enduring fascination. The total number of victims remains uncertain, with only a handful officially confirmed despite the killer's much higher claims.

                The Zodiac Killer's legacy is one of mystery and frustration. The case exposed limitations in investigative coordination and highlighted how media attention can both aid and complicate criminal cases. More importantly, it remains a reminder of lives violently interrupted, and of a perpetrator who, despite decades of effort, was never brought to justice.
                TEXT,
                'image' => 'zodiac-killer.jpg'
            ],

            // 3rd case
            [
                'name' => 'Unknown',
                'nickname' => 'Jack the Ripper',
                'age' => 'N/A',
                'country' => 'UK',
                'victim_count' => json_encode([
                    'killed' => [
                        'claimed' => 5,
                        'confirmed' => 0,
                    ],
                    'wounded' => 0,
                ]),
                'description' => <<<TEXT
                Jack the Ripper is one of the most notorious unidentified killers in history, a figure whose crimes in the late 19th century transformed fear into legend. Operating in the impoverished Whitechapel district of London in 1888, the killer targeted vulnerable women, leaving behind scenes of extreme violence that shocked both the public and authorities. The brutality of the crimes, combined with the mystery surrounding the killer's identity, ensured that the name "Jack the Ripper" would endure far beyond the era in which the murders occurred.

                Little is known about the individual behind the name. The identity of Jack the Ripper was never confirmed, and the case quickly became a mixture of fact, speculation, and myth. What is known comes from police reports, witness statements, and a series of letters allegedly sent by the killer. These communications, some of which may have been hoaxes, contributed to the growing sense of fear and fascination that spread throughout London at the time.

                The murders attributed to the Ripper primarily involved women living in poverty, many of whom worked in prostitution. The victims were killed in the streets or in small, dimly lit spaces, often during the early hours of the morning. The attacks were swift and brutal, and in several cases, the bodies were mutilated in ways that suggested a degree of anatomical knowledge or at least a disturbing familiarity with the human body. These details intensified public fear and led to widespread speculation about the killer's identity and motives.

                The investigation into the murders faced overwhelming challenges. Whitechapel was densely populated, poorly lit, and filled with narrow alleyways, making it difficult for police to monitor or control. Communication between officers and departments was limited, and forensic science was still in its early stages. Despite interviewing numerous witnesses and pursuing multiple suspects, authorities were unable to identify or apprehend the killer.

                As the murders continued, public anxiety grew. Newspapers played a significant role in shaping the narrative, often sensationalizing details and publishing letters that claimed to be from the killer himself. The name "Jack the Ripper" originated from one such letter, and it quickly became a symbol of the terror gripping the area. The combination of media attention and the gruesome nature of the crimes turned the case into an international phenomenon.

                By the end of 1888, the murders suddenly stopped, leaving the case unresolved. Whether the killer died, was imprisoned for another crime, or simply ceased his activities remains unknown. Over the years, countless theories and suspects have been proposed, but none have been definitively proven.

                The legacy of Jack the Ripper is one of enduring mystery. The case highlighted the social conditions of the time, drawing attention to poverty, inequality, and the vulnerability of those living on the margins of society. More than a century later, the victims are still remembered, not just as part of a legend, but as individuals whose lives were taken in a series of crimes that remain unsolved.
                TEXT,
                'image' => ''
            ],

            // 4th case
            [
                'name' => 'John Wayne Michael Gacy',
                'nickname' => 'The Killer Clown',
                'age' => 52,
                'country' => 'USA',
                'victim_count' => json_encode([
                    'killed' => [
                        'claimed' => '45+',
                        'confirmed' => 33,
                    ],
                    'wounded' => 0,
                ]),
                'description' => <<<TEXT
                John Wayne Gacy, often referred to as the "Killer Clown," was an American serial killer whose crimes in the 1970s exposed a deeply unsettling contrast between public persona and private reality. Living in a suburban neighborhood in Illinois, Gacy was known as a community figure, even performing at events dressed as a clown. Behind that carefully maintained image, however, was a pattern of violence that would later reveal one of the most disturbing cases in modern criminal history.

                Born in 1942, Gacy's early life was marked by instability and conflict. He grew up with an abusive father and struggled with feelings of inadequacy from a young age. As he entered adulthood, he appeared to build a stable life, holding steady employment and becoming active in local civic organizations. To those around him, he seemed reliable and engaged, someone who had overcome a difficult upbringing. That perception would later make the truth far more difficult to comprehend.

                Gacy's crimes primarily targeted teenage boys and young men, many of whom he lured with promises of work or money. Once they were under his control, he used manipulation, intimidation, and physical force to overpower them. His methods were calculated, often involving restraints and prolonged control over his victims. The murders were carried out over several years, with many of the bodies hidden beneath his home in a crawl space, a detail that would later horrify investigators and the public alike.

                The investigation into Gacy began as a missing persons case, when a teenage boy failed to return home after being last seen with him. As police looked deeper, inconsistencies in Gacy's statements and his prior criminal record raised suspicion. Surveillance and further inquiry gradually built a case against him, leading to a search of his property. What investigators discovered there confirmed their worst fears and exposed the full scale of his crimes.

                Gacy was arrested in 1978 and later confessed to numerous murders. His trial in 1980 drew widespread attention, with his defense attempting to argue insanity. The jury ultimately rejected this claim, finding him guilty of multiple counts of murder. He was sentenced to death and remained on death row for over a decade before being executed in 1994.

                The case left a lasting impact on both law enforcement and the public. It forced a confrontation with the idea that extreme violence can exist behind an ordinary façade, hidden within familiar environments. More importantly, it brought attention to the victims, many of whom were young and vulnerable, their disappearances initially overlooked or underestimated.

                John Wayne Gacy's legacy is not defined by the persona he presented, but by the lives he took and the fear he left behind. His case remains a stark reminder that appearances can conceal far more than they reveal, and that some of the most dangerous individuals are those who seem, at first glance, entirely unremarkable.
                TEXT,
                'image' => 'john-wayne-gacy.jpg'
            ],

            // 5th case
            [
                'name' => 'Jeffrey Dahmer',
                'nickname' => 'The Milwaukee Cannibal / Monster',
                'age' => 34,
                'country' => 'USA',
                'victim_count' => json_encode([
                    'killed' => [
                        'claimed' => 17,
                        'confirmed' => 17,
                    ],
                    'wounded' => 0,
                ]),
                'description' => <<<TEXT
                Jeffrey Dahmer, often referred to as the "Milwaukee Cannibal" or "Milwaukee Monster," was an American serial killer whose crimes between 1978 and 1991 shocked the public with their severity and deeply disturbing nature. Operating primarily in Milwaukee, Wisconsin, Dahmer targeted young men, luring them into his apartment where he carried out a series of murders that would later be described as some of the most horrific in modern criminal history.

                Born in 1960, Dahmer's early life showed signs of isolation and emotional detachment. He struggled to form meaningful connections and developed increasingly troubling interests during adolescence. Though his family life appeared relatively stable on the surface, underlying tensions and a growing sense of alienation contributed to behaviors that would escalate over time. By his late teens, these patterns had already begun to manifest in dangerous ways.

                Dahmer's crimes followed a chilling pattern. He would approach men in public spaces, often offering money in exchange for companionship or photographs. Once inside his apartment, he drugged his victims, rendering them unconscious before carrying out the murders. His actions did not end with death; in many cases, he engaged in acts intended to maintain control over his victims even after they were gone. These details, once uncovered, would profoundly disturb both investigators and the public.

                The investigation into Dahmer's activities revealed a series of missed opportunities that allowed the crimes to continue. On multiple occasions, warning signs were either overlooked or not fully pursued. In one instance, a victim managed to escape but was returned to Dahmer by police after a misunderstanding, an event that later became a stark example of systemic failure. It was not until 1991, when another intended victim escaped and led officers back to Dahmer's apartment, that the full extent of his actions was discovered.

                Inside the apartment, investigators found evidence that confirmed a pattern of prolonged and repeated violence. Dahmer was arrested and quickly confessed to numerous murders. His trial in 1992 focused heavily on questions of sanity, with the defense arguing that he was mentally ill. The court ultimately found him legally sane, and he was sentenced to multiple life terms in prison.

                Dahmer did not spend the rest of his life behind bars. In 1994, he was killed by another inmate while incarcerated, bringing a violent end to a case already defined by brutality.

                The legacy of Jeffrey Dahmer's crimes is one of discomfort and reflection. The case exposed failures in law enforcement response, particularly in how certain victims were treated or overlooked. More importantly, it underscored the humanity of those affected, many of whom came from marginalized communities and were not given the attention or urgency they deserved at the time.

                Dahmer's story is not one of mystery, but of prolonged violence that went unchecked for too long. It remains a reminder of what can happen when warning signs are missed and when victims are not given equal protection or recognition.
                TEXT,
                'image' => 'jeffrey-dahmer.jpg'
            ],
        ]);
    }
}
