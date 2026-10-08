<?php

namespace Tests\Feature;

use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CaseFilterTest extends TestCase
{
    use RefreshDatabase;

    // Serial Killer Tests
    public function test_serial_killers_can_be_searched_by_name(): void {
        SerialKiller::create([
            'name' => 'Ted Bundy',
            'nickname' => 'Theodore Robert Bundy',
            'ages' => [
                'born' => '1946-11-24',
                'died' => '1989-01-24',
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 30,
                    'confirmed' => 20,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record for Ted Bundy.',
            'image' => 'bundy.jpg',
        ]);

        SerialKiller::create([
            'name' => 'John Wayne Gacy',
            'nickname' => 'The Killer Clown',
            'ages' => [
                'born' => '1942-03-17',
                'died' => '1994-05-10',
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 33,
                    'confirmed' => 33,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record for John Wayne Gacy.',
            'image' => 'gacy.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'search' => 'Ted',
        ]));

        $response->assertOk();

        $response->assertSee('Ted Bundy');
        $response->assertDontSee('John Wayne Gacy');
    }

    public function test_serial_killers_can_be_searched_by_nickname(): void {
        SerialKiller::create([
            'name' => 'John Wayne Gacy',
            'nickname' => 'The Killer Clown',
            'ages' => [
                'born' => '1942-03-17',
                'died' => '1994-05-10',
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 33,
                    'confirmed' => 33,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record for John Wayne Gacy.',
            'image' => 'gacy.jpg',
        ]);

        SerialKiller::create([
            'name' => 'Jeffrey Dahmer',
            'nickname' => 'The Milwaukee Cannibal',
            'ages' => [
                'born' => '1960-05-21',
                'died' => '1994-11-28',
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 17,
                    'confirmed' => 17,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record for Jeffrey Dahmer.',
            'image' => 'dahmer.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'search' => 'Killer Clown',
        ]));

        $response->assertOk();

        $response->assertSee('John Wayne Gacy');
        $response->assertDontSee('Jeffrey Dahmer');
    }

    public function test_serial_killers_can_be_filtered_by_country(): void {
        SerialKiller::create([
            'name' => 'American Test Killer',
            'nickname' => 'American Killer',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 10,
                    'confirmed' => 8,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test American serial killer.',
            'image' => 'american.jpg',
        ]);

        SerialKiller::create([
            'name' => 'British Test Killer',
            'nickname' => 'British Killer',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United Kingdom',
            'victim_count' => [
                'killed' => [
                    'claimed' => 10,
                    'confirmed' => 8,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test British serial killer.',
            'image' => 'british.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'country' => 'United Kingdom',
        ]));

        $response->assertOk();

        $response->assertSee('British Test Killer');
        $response->assertDontSee('American Test Killer');
    }

    public function test_serial_killers_can_be_filtered_by_zero_to_five_confirmed_victims(): void {
        SerialKiller::create([
            'name' => 'Low Count Killer',
            'nickname' => 'Low Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 5,
                    'confirmed' => 4,
                ],
                'wounded' => 0,
            ],
            'description' => 'Serial killer with four confirmed victims.',
            'image' => 'low.jpg',
        ]);

        SerialKiller::create([
            'name' => 'High Count Killer',
            'nickname' => 'High Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 20,
                    'confirmed' => 15,
                ],
                'wounded' => 0,
            ],
            'description' => 'Serial killer with fifteen confirmed victims.',
            'image' => 'high.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'victims' => '0-5',
        ]));

        $response->assertOk();

        $response->assertSee('Low Count Killer');
        $response->assertDontSee('High Count Killer');
    }

    public function test_serial_killers_can_be_filtered_by_six_to_ten_confirmed_victims(): void {
        SerialKiller::create([
            'name' => 'Medium Count Killer',
            'nickname' => 'Medium Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 10,
                    'confirmed' => 8,
                ],
                'wounded' => 0,
            ],
            'description' => 'Serial killer with eight confirmed victims.',
            'image' => 'medium.jpg',
        ]);

        SerialKiller::create([
            'name' => 'High Count Killer',
            'nickname' => 'High Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 20,
                    'confirmed' => 15,
                ],
                'wounded' => 0,
            ],
            'description' => 'Serial killer with fifteen confirmed victims.',
            'image' => 'high.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'victims' => '6-10',
        ]));

        $response->assertOk();

        $response->assertSee('Medium Count Killer');
        $response->assertDontSee('High Count Killer');
    }

    public function test_serial_killers_can_be_filtered_by_eleven_to_twenty_confirmed_victims(): void {
        SerialKiller::create([
            'name' => 'Mid High Count Killer',
            'nickname' => 'Mid High Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 20,
                    'confirmed' => 17,
                ],
                'wounded' => 0,
            ],
            'description' => 'Serial killer with seventeen confirmed victims.',
            'image' => 'mid-high.jpg',
        ]);

        SerialKiller::create([
            'name' => 'Very High Count Killer',
            'nickname' => 'Very High Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 35,
                    'confirmed' => 30,
                ],
                'wounded' => 0,
            ],
            'description' => 'Serial killer with thirty confirmed victims.',
            'image' => 'very-high.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'victims' => '11-20',
        ]));

        $response->assertOk();

        $response->assertSee('Mid High Count Killer');
        $response->assertDontSee('Very High Count Killer');
    }

    public function test_serial_killers_can_be_filtered_by_twenty_one_plus_confirmed_victims(): void {
        SerialKiller::create([
            'name' => 'Very High Count Killer',
            'nickname' => 'Very High Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 35,
                    'confirmed' => 30,
                ],
                'wounded' => 0,
            ],
            'description' => 'Serial killer with thirty confirmed victims.',
            'image' => 'very-high.jpg',
        ]);

        SerialKiller::create([
            'name' => 'Medium Count Killer',
            'nickname' => 'Medium Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 15,
                    'confirmed' => 10,
                ],
                'wounded' => 0,
            ],
            'description' => 'Serial killer with ten confirmed victims.',
            'image' => 'medium.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'victims' => '21-plus',
        ]));

        $response->assertOk();

        $response->assertSee('Very High Count Killer');
        $response->assertDontSee('Medium Count Killer');
    }

    public function test_serial_killers_can_be_sorted_by_name_ascending(): void {
        SerialKiller::create([
            'name' => 'First Test Killer',
            'nickname' => 'Zodiac',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 10,
                    'confirmed' => 5,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record.',
            'image' => 'zodiac.jpg',
        ]);

        SerialKiller::create([
            'name' => 'Second Test Killer',
            'nickname' => 'Boston Strangler',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 15,
                    'confirmed' => 10,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record.',
            'image' => 'boston.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'sort' => 'name-asc',
        ]));

        $response->assertOk();

        $response->assertSeeInOrder([
            'Boston Strangler',
            'Zodiac',
        ]);
    }

    public function test_serial_killers_can_be_sorted_by_name_descending(): void {
        SerialKiller::create([
            'name' => 'First Test Killer',
            'nickname' => 'Zodiac',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 10,
                    'confirmed' => 5,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record.',
            'image' => 'zodiac.jpg',
        ]);

        SerialKiller::create([
            'name' => 'Second Test Killer',
            'nickname' => 'Boston Strangler',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 15,
                    'confirmed' => 10,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record.',
            'image' => 'boston.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'sort' => 'name-desc',
        ]));

        $response->assertOk();

        $response->assertSeeInOrder([
            'Zodiac',
            'Boston Strangler',
        ]);
    }

    public function test_serial_killers_can_be_sorted_by_victims_ascending(): void {
        SerialKiller::create([
            'name' => 'High Victim Test Killer',
            'nickname' => 'High Victim Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 30,
                    'confirmed' => 25,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record with twenty-five confirmed victims.',
            'image' => 'high.jpg',
        ]);

        SerialKiller::create([
            'name' => 'Low Victim Test Killer',
            'nickname' => 'Low Victim Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 10,
                    'confirmed' => 5,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record with five confirmed victims.',
            'image' => 'low.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'sort' => 'victims-asc',
        ]));

        $response->assertOk();

        $response->assertSeeInOrder([
            'Low Victim Count',
            'High Victim Count',
        ]);
    }

    public function test_serial_killers_can_be_sorted_by_victims_descending(): void {
        SerialKiller::create([
            'name' => 'Low Victim Test Killer',
            'nickname' => 'Low Victim Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 10,
                    'confirmed' => 5,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record with five confirmed victims.',
            'image' => 'low.jpg',
        ]);

        SerialKiller::create([
            'name' => 'High Victim Test Killer',
            'nickname' => 'High Victim Count',
            'ages' => [
                'born' => '1950-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 30,
                    'confirmed' => 25,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test record with twenty-five confirmed victims.',
            'image' => 'high.jpg',
        ]);

        $response = $this->get(route('cases.killers.index', [
            'sort' => 'victims-desc',
        ]));

        $response->assertOk();

        $response->assertSeeInOrder([
            'High Victim Count',
            'Low Victim Count',
        ]);
    }

    // Unsolved Cases Tests
    public function test_unsolved_cases_can_be_searched_by_name(): void {
        UnsolvedCase::create([
            'name' => 'The Black Dahlia',
            'country' => 'United States',
            'count' => [
                'killed' => 1,
                'wounded' => 0,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'Test unsolved case.',
            'image' => 'black-dahlia.jpg',
        ]);

        UnsolvedCase::create([
            'name' => 'The Hinterkaifeck Murders',
            'country' => 'Germany',
            'count' => [
                'killed' => 6,
                'wounded' => 0,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'Another test unsolved case.',
            'image' => 'hinterkaifeck.jpg',
        ]);

        $response = $this->get(route('cases.unsolved.index', [
            'search' => 'Black Dahlia',
        ]));

        $response->assertOk();

        $response->assertSee('The Black Dahlia');
        $response->assertDontSee('The Hinterkaifeck Murders');
    }

    public function test_unsolved_cases_can_be_filtered_by_country(): void {
        UnsolvedCase::create([
            'name' => 'American Mystery Case',
            'country' => 'United States',
            'count' => [
                'killed' => 2,
                'wounded' => 0,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'Test unsolved case from America.',
            'image' => 'american.jpg',
        ]);

        UnsolvedCase::create([
            'name' => 'German Mystery Case',
            'country' => 'Germany',
            'count' => [
                'killed' => 3,
                'wounded' => 0,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'Test unsolved case from Germany.',
            'image' => 'german.jpg',
        ]);

        $response = $this->get(route('cases.unsolved.index', [
            'country' => 'Germany',
        ]));

        $response->assertOk();

        $response->assertSee('German Mystery Case');
        $response->assertDontSee('American Mystery Case');
    }

    public function test_unsolved_cases_can_be_filtered_by_one_victim(): void {
        UnsolvedCase::create([
            'name' => 'Single Victim Case',
            'country' => 'United States',
            'count' => [
                'killed' => 1,
                'wounded' => 0,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'An unsolved case with one victim.',
            'image' => 'single.jpg',
        ]);

        UnsolvedCase::create([
            'name' => 'Multiple Victim Case',
            'country' => 'United States',
            'count' => [
                'killed' => 4,
                'wounded' => 0,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'An unsolved case with four victims.',
            'image' => 'multiple.jpg',
        ]);

        $response = $this->get(route('cases.unsolved.index', [
            'victims' => '1',
        ]));

        $response->assertOk();

        $response->assertSee('Single Victim Case');
        $response->assertDontSee('Multiple Victim Case');
    }

    public function test_unsolved_cases_can_be_filtered_by_two_to_five_victims(): void {
        UnsolvedCase::create([
            'name' => 'Single Victim Case',
            'country' => 'United States',
            'count' => [
                'killed' => 1,
                'wounded' => 0,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'An unsolved case with one victim.',
            'image' => 'single.jpg',
        ]);

        UnsolvedCase::create([
            'name' => 'Three Victim Case',
            'country' => 'United States',
            'count' => [
                'killed' => 2,
                'wounded' => 1,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'An unsolved case with three victims.',
            'image' => 'three.jpg',
        ]);

        UnsolvedCase::create([
            'name' => 'Seven Victim Case',
            'country' => 'United States',
            'count' => [
                'killed' => 6,
                'wounded' => 1,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'An unsolved case with seven victims.',
            'image' => 'seven.jpg',
        ]);

        $response = $this->get(route('cases.unsolved.index', [
            'victims' => '2-5',
        ]));

        $response->assertOk();

        $response->assertSee('Three Victim Case');
        $response->assertDontSee('Single Victim Case');
        $response->assertDontSee('Seven Victim Case');
    }

    public function test_unsolved_cases_can_be_filtered_by_six_or_more_victims(): void {
        UnsolvedCase::create([
            'name' => 'Five Victim Case',
            'country' => 'United States',
            'count' => [
                'killed' => 4,
                'wounded' => 1,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'An unsolved case with five victims.',
            'image' => 'five.jpg',
        ]);

        UnsolvedCase::create([
            'name' => 'Six Victim Case',
            'country' => 'United States',
            'count' => [
                'killed' => 5,
                'wounded' => 1,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'An unsolved case with six victims.',
            'image' => 'six.jpg',
        ]);

        UnsolvedCase::create([
            'name' => 'Ten Victim Case',
            'country' => 'Germany',
            'count' => [
                'killed' => 8,
                'wounded' => 2,
            ],
            'suspects' => ['Unknown Suspect'],
            'description' => 'An unsolved case with ten victims.',
            'image' => 'ten.jpg',
        ]);

        $response = $this->get(route('cases.unsolved.index', [
            'victims' => '6-plus',
        ]));

        $response->assertOk();

        $response->assertDontSee('Five Victim Case');
        $response->assertSee('Six Victim Case');
        $response->assertSee('Ten Victim Case');
    }

    public function test_unsolved_cases_can_be_filtered_by_zero_suspects(): void {
        UnsolvedCase::create([
            'name' => 'Case Without Suspects',
            'country' => 'United States',
            'count' => [
                'killed' => 1,
                'wounded' => 0,
            ],
            'suspects' => [],
            'description' => 'An unsolved case without identified suspects.',
            'image' => 'no-suspects.jpg',
        ]);

        UnsolvedCase::create([
            'name' => 'Case With Suspects',
            'country' => 'United States',
            'count' => [
                'killed' => 2,
                'wounded' => 0,
            ],
            'suspects' => [
                'Suspect One',
                'Suspect Two',
            ],
            'description' => 'An unsolved case with two suspects.',
            'image' => 'with-suspects.jpg',
        ]);

        $response = $this->get(route('cases.unsolved.index', [
            'suspects' => '0',
        ]));

        $response->assertOk();

        $response->assertSee('Case Without Suspects');
        $response->assertDontSee('Case With Suspects');
    }

    public function test_unsolved_cases_can_be_filtered_by_one_to_three_suspects(): void {
        $cases = [
            ['name' => 'Zero Suspects Case', 'suspects' => []],
            ['name' => 'One Suspect Case', 'suspects' => ['Suspect A']],
            ['name' => 'Two Suspects Case', 'suspects' => ['Suspect A', 'Suspect B']],
            ['name' => 'Three Suspects Case', 'suspects' => ['Suspect A', 'Suspect B', 'Suspect C']],
            ['name' => 'Four Suspects Case', 'suspects' => ['Suspect A', 'Suspect B', 'Suspect C', 'Suspect D']],
        ];

        foreach ($cases as $case) {
            UnsolvedCase::create([
                'name' => $case['name'],
                'country' => 'United States',
                'count' => [
                    'killed' => 1,
                    'wounded' => 0,
                ],
                'suspects' => $case['suspects'],
                'description' => 'Test case for suspect filtering.',
                'image' => 'test.jpg',
            ]);
        }

        $response = $this->get(route('cases.unsolved.index', [
            'suspects' => '1-3',
        ]));

        $response->assertOk();

        $response->assertSee('One Suspect Case');
        $response->assertSee('Two Suspects Case');
        $response->assertSee('Three Suspects Case');

        $response->assertDontSee('Zero Suspects Case');
        $response->assertDontSee('Four Suspects Case');
    }

    public function test_unsolved_cases_can_be_filtered_by_four_or_more_suspects(): void {
        $cases = [
            ['name' => 'Three Suspects Case', 'suspects' => [
                'Suspect A', 'Suspect B', 'Suspect C'
            ]],
            ['name' => 'Four Suspects Case', 'suspects' => [
                'Suspect A', 'Suspect B', 'Suspect C', 'Suspect D'
            ]],
            ['name' => 'Six Suspects Case', 'suspects' => [
                'Suspect A', 'Suspect B', 'Suspect C',
                'Suspect D', 'Suspect E', 'Suspect F'
            ]],
        ];

        foreach ($cases as $case) {
            UnsolvedCase::create([
                'name' => $case['name'],
                'country' => 'United States',
                'count' => [
                    'killed' => 1,
                    'wounded' => 0,
                ],
                'suspects' => $case['suspects'],
                'description' => 'Test case for suspect filtering.',
                'image' => 'test.jpg',
            ]);
        }

        $response = $this->get(route('cases.unsolved.index', [
            'suspects' => '4-plus',
        ]));

        $response->assertOk();

        $response->assertDontSee('Three Suspects Case');
        $response->assertSee('Four Suspects Case');
        $response->assertSee('Six Suspects Case');
    }

    public function test_unsolved_cases_can_be_sorted_by_name_ascending(): void {
        $cases = [
            'Zodiac Mystery',
            'Black Dahlia Mystery',
            'Hinterkaifeck Mystery',
        ];

        foreach ($cases as $name) {
            UnsolvedCase::create([
                'name' => $name,
                'country' => 'United States',
                'count' => [
                    'killed' => 1,
                    'wounded' => 0,
                ],
                'suspects' => [],
                'description' => 'Test case for alphabetical sorting.',
                'image' => 'test.jpg',
            ]);
        }

        $response = $this->get(route('cases.unsolved.index', [
            'sort' => 'name-asc',
        ]));

        $response->assertOk();

        $response->assertSeeInOrder([
            'Black Dahlia Mystery',
            'Hinterkaifeck Mystery',
            'Zodiac Mystery',
        ]);
    }

    public function test_unsolved_cases_can_be_sorted_by_name_descending(): void {
        $cases = [
            'Black Dahlia Mystery',
            'Zodiac Mystery',
            'Hinterkaifeck Mystery',
        ];

        foreach ($cases as $name) {
            UnsolvedCase::create([
                'name' => $name,
                'country' => 'United States',
                'count' => [
                    'killed' => 1,
                    'wounded' => 0,
                ],
                'suspects' => [],
                'description' => 'Test case for descending alphabetical sorting.',
                'image' => 'test.jpg',
            ]);
        }

        $response = $this->get(route('cases.unsolved.index', [
            'sort' => 'name-desc',
        ]));

        $response->assertOk();

        $response->assertSeeInOrder([
            'Zodiac Mystery',
            'Hinterkaifeck Mystery',
            'Black Dahlia Mystery',
        ]);
    }

    public function test_unsolved_cases_can_be_sorted_by_victims_ascending(): void
{
    $cases = [
        ['name' => 'High Victim Case', 'killed' => 8, 'wounded' => 2],
        ['name' => 'Low Victim Case', 'killed' => 1, 'wounded' => 0],
        ['name' => 'Medium Victim Case', 'killed' => 3, 'wounded' => 1],
    ];

    foreach ($cases as $case) {
        UnsolvedCase::create([
            'name' => $case['name'],
            'country' => 'United States',
            'count' => [
                'killed' => $case['killed'],
                'wounded' => $case['wounded'],
            ],
            'suspects' => [],
            'description' => 'Test case for victim sorting.',
            'image' => 'test.jpg',
        ]);
    }

    $response = $this->get(route('cases.unsolved.index', [
        'sort' => 'victims-asc',
    ]));

    $response->assertOk();

    $response->assertSeeInOrder([
        'Low Victim Case',
        'Medium Victim Case',
        'High Victim Case',
    ]);
}

public function test_unsolved_cases_can_be_sorted_by_victims_descending(): void
{
    $cases = [
        ['name' => 'Low Victim Case', 'killed' => 1, 'wounded' => 0],
        ['name' => 'High Victim Case', 'killed' => 8, 'wounded' => 2],
        ['name' => 'Medium Victim Case', 'killed' => 3, 'wounded' => 1],
    ];

    foreach ($cases as $case) {
        UnsolvedCase::create([
            'name' => $case['name'],
            'country' => 'United States',
            'count' => [
                'killed' => $case['killed'],
                'wounded' => $case['wounded'],
            ],
            'suspects' => [],
            'description' => 'Test case for victim sorting.',
            'image' => 'test.jpg',
        ]);
    }

    $response = $this->get(route('cases.unsolved.index', [
        'sort' => 'victims-desc',
    ]));

    $response->assertOk();

    $response->assertSeeInOrder([
        'High Victim Case',
        'Medium Victim Case',
        'Low Victim Case',
    ]);
}

public function test_serial_killers_can_be_filtered_by_multiple_conditions(): void
{
    $killers = [
        ['name' => 'Matching Killer', 'nickname' => 'The Matching Killer', 'country' => 'United States', 'confirmed' => 8],
        ['name' => 'Wrong Country Killer', 'nickname' => 'The Wrong Country Killer', 'country' => 'Germany', 'confirmed' => 8],
        ['name' => 'Wrong Victims Killer', 'nickname' => 'The Wrong Victims Killer', 'country' => 'United States', 'confirmed' => 25],
        ['name' => 'Unrelated Killer', 'nickname' => 'The Unrelated Killer', 'country' => 'United States', 'confirmed' => 8],
    ];

    foreach ($killers as $killer) {
        SerialKiller::create([
            'name' => $killer['name'],
            'nickname' => $killer['nickname'],
            'ages' => ['born' => '1950-01-01', 'died' => null],
            'country' => $killer['country'],
            'victim_count' => [
                'killed' => [
                    'claimed' => $killer['confirmed'],
                    'confirmed' => $killer['confirmed'],
                ],
                'wounded' => 0,
            ],
            'description' => 'Test killer for combined filtering.',
            'image' => 'test.jpg',
        ]);
    }

    $response = $this->get(route('cases.killers.index', [
        'search' => 'Matching',
        'country' => 'United States',
        'victims' => '6-10',
    ]));

    $response->assertOk();

    $response->assertSee('The Matching Killer');
    $response->assertDontSee('The Wrong Country Killer');
    $response->assertDontSee('The Wrong Victims Killer');
    $response->assertDontSee('The Unrelated Killer');
}

public function test_unsolved_cases_can_be_filtered_by_multiple_conditions(): void
{
    $cases = [
        ['name' => 'Matching Mystery', 'country' => 'United States', 'killed' => 3, 'wounded' => 0, 'suspects' => ['A', 'B']],
        ['name' => 'Matching German Mystery', 'country' => 'Germany', 'killed' => 3, 'wounded' => 0, 'suspects' => ['A', 'B']],
        ['name' => 'Matching Large Mystery', 'country' => 'United States', 'killed' => 8, 'wounded' => 0, 'suspects' => ['A', 'B']],
        ['name' => 'Matching No Suspects Mystery', 'country' => 'United States', 'killed' => 3, 'wounded' => 0, 'suspects' => []],
        ['name' => 'Unrelated Mystery', 'country' => 'United States', 'killed' => 3, 'wounded' => 0, 'suspects' => ['A', 'B']],
    ];

    foreach ($cases as $case) {
        UnsolvedCase::create([
            'name' => $case['name'],
            'country' => $case['country'],
            'count' => [
                'killed' => $case['killed'],
                'wounded' => $case['wounded'],
            ],
            'suspects' => $case['suspects'],
            'description' => 'Test case for combined filtering.',
            'image' => 'test.jpg',
        ]);
    }

    $response = $this->get(route('cases.unsolved.index', [
        'search' => 'Matching',
        'country' => 'United States',
        'victims' => '2-5',
        'suspects' => '1-3',
    ]));

    $response->assertOk();

    $response->assertSee('Matching Mystery');
    $response->assertDontSee('Matching German Mystery');
    $response->assertDontSee('Matching Large Mystery');
    $response->assertDontSee('Matching No Suspects Mystery');
    $response->assertDontSee('Unrelated Mystery');
}

public function test_serial_killers_default_to_name_ascending_for_invalid_sort(): void
{
    $killers = [
        ['name' => 'First Killer', 'nickname' => 'Zebra Killer'],
        ['name' => 'Second Killer', 'nickname' => 'Alpha Killer'],
    ];

    foreach ($killers as $killer) {
        SerialKiller::create([
            'name' => $killer['name'],
            'nickname' => $killer['nickname'],
            'ages' => ['born' => '1950-01-01', 'died' => null],
            'country' => 'United States',
            'victim_count' => [
                'killed' => ['claimed' => 5, 'confirmed' => 5],
                'wounded' => 0,
            ],
            'description' => 'Test killer for invalid sorting.',
            'image' => 'test.jpg',
        ]);
    }

    $response = $this->get(route('cases.killers.index', [
        'sort' => 'invalid-sort',
    ]));

    $response->assertOk();

    $response->assertSeeInOrder([
        'Alpha Killer',
        'Zebra Killer',
    ]);
}

public function test_unsolved_cases_default_to_name_ascending_for_invalid_sort(): void
{
    $cases = [
        'Zebra Mystery',
        'Alpha Mystery',
    ];

    foreach ($cases as $name) {
        UnsolvedCase::create([
            'name' => $name,
            'country' => 'United States',
            'count' => [
                'killed' => 1,
                'wounded' => 0,
            ],
            'suspects' => [],
            'description' => 'Test case for invalid sorting.',
            'image' => 'test.jpg',
        ]);
    }

    $response = $this->get(route('cases.unsolved.index', [
        'sort' => 'invalid-sort',
    ]));

    $response->assertOk();

    $response->assertSeeInOrder([
        'Alpha Mystery',
        'Zebra Mystery',
    ]);
}
}