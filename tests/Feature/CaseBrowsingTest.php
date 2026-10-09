<?php

namespace Tests\Feature;

use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CaseBrowsingTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_home_page(): void {
        $this->get(route('home'))
            ->assertOk();
    }

    public function test_guest_can_view_serial_killers_archive(): void {
        $this->get(route('cases.killers.index'))
            ->assertOk();
    }

    public function test_guest_can_view_unsolved_cases_archive(): void {
        $this->get(route('cases.unsolved.index'))
            ->assertOk();
    }

    public function test_guest_can_view_serial_killer_profile(): void {
        $killer = SerialKiller::create([
            'name' => 'Test Killer',
            'nickname' => 'The Test Killer',
            'country' => 'United States',
            'ages' => ['25', '35'],
            'victim_count' => [
                'killed' => [
                    'claimed' => 5,
                    'confirmed' => 3,
                ],
                'wounded' => 0,
            ],
            'description' => 'Test description.',
            'image' => 'test.jpg',
        ]);

        $this->get(route('cases.killers.show', $killer))
            ->assertOk()
            ->assertSee('Test Killer');
    }

    public function test_guest_can_view_unsolved_case_profile(): void {
        $case = UnsolvedCase::create([
            'name' => 'Test Unsolved Case',
            'country' => 'United States',
            'count' => [
                'killed' => 2,
                'wounded' => 0,
            ],
            'suspects' => [],
            'description' => 'Test description.',
            'image' => 'test.jpg',
        ]);

        $this->get(route('cases.unsolved.show', $case))
            ->assertOk()
            ->assertSee('Test Unsolved Case');
    }

    public function test_guest_can_view_victims_page(): void {
        $this->get(route('victims'))
            ->assertOk();
    }

    public function test_guest_can_view_resources_page(): void {
        $this->get(route('resources'))
            ->assertOk();
    }

    public function test_guest_can_view_explore_page(): void {
        $this->get(route('caseEvents'))
            ->assertOk();
    }

    public function test_guest_can_view_all_psychology_pages(): void {
        $routes = [
            'psychology.introduction',
            'psychology.fundamentals',
            'psychology.personality',
            'psychology.profiling',
            'psychology.crimeScenes',
            'psychology.investigativePsychology',
            'psychology.victimology',
            'psychology.experiments',
            'psychology.facts',
            'psychology.myths',
            'psychology.faq',
            'psychology.resources',
        ];

        foreach ($routes as $route) {
            $this->get(route($route))
                ->assertOk();
        }
    }

    public function test_nonexistent_serial_killer_returns_404(): void {
        $this->get(route('cases.killers.show', 999999))
            ->assertNotFound();
    }

    public function test_nonexistent_unsolved_case_returns_404(): void {
        $this->get(route('cases.unsolved.show', 999999))
            ->assertNotFound();
    }

    public function test_guest_cannot_access_favourites(): void {
        $this->get(route('favourites'))
            ->assertRedirect(route('login'));
    }

    public function test_guest_cannot_access_admin_discussions(): void {
        $this->get(route('admin.discussions'))
            ->assertRedirect(route('login'));
    }

    public function test_serial_killers_archive_pagination(): void {
        for ($i = 1; $i <= 15; $i++) {
            SerialKiller::create([
                'name' => sprintf('Test Killer %02d', $i),
                'nickname' => sprintf('Test Nickname %02d', $i),
                'country' => 'United States',
                'ages' => ['25', '35'],
                'victim_count' => [
                    'killed' => [
                        'claimed' => 5,
                        'confirmed' => 3,
                    ],
                    'wounded' => 0,
                ],
                'description' => 'Test description.',
                'image' => 'test.jpg',
            ]);
        }

        $this->get(route('cases.killers.index'))
            ->assertOk()
            ->assertViewHas('serial_killers', function ($killers) {
                return $killers->count() === 12
                    && $killers->total() === 15
                    && $killers->currentPage() === 1;
            })
            ->assertSee('Test Killer 01')
            ->assertDontSee('Test Killer 15');

        $this->get(route('cases.killers.index', ['page' => 2]))
            ->assertOk()
            ->assertViewHas('serial_killers', function ($killers) {
                return $killers->count() === 3
                    && $killers->total() === 15
                    && $killers->currentPage() === 2;
            })
            ->assertSee('Test Killer 15')
            ->assertDontSee('Test Killer 01');
    }

    public function test_unsolved_cases_archive_pagination(): void {
        for ($i = 1; $i <= 15; $i++) {
            UnsolvedCase::create([
                'name' => sprintf('Test Unsolved Case %02d', $i),
                'country' => 'United States',
                'count' => [
                    'killed' => 2,
                    'wounded' => 0,
                ],
                'suspects' => [],
                'description' => 'Test description.',
                'image' => 'test.jpg',
            ]);
        }

        $this->get(route('cases.unsolved.index'))
            ->assertOk()
            ->assertViewHas('unsolved_cases', function ($cases) {
                return $cases->count() === 12
                    && $cases->total() === 15
                    && $cases->currentPage() === 1;
            })
            ->assertSee('Test Unsolved Case 01')
            ->assertDontSee('Test Unsolved Case 15');

        $this->get(route('cases.unsolved.index', ['page' => 2]))
            ->assertOk()
            ->assertViewHas('unsolved_cases', function ($cases) {
                return $cases->count() === 3
                    && $cases->total() === 15
                    && $cases->currentPage() === 2;
            })
            ->assertSee('Test Unsolved Case 15')
            ->assertDontSee('Test Unsolved Case 01');
    }

    public function test_serial_killers_pagination_preserves_filters(): void {
        for ($i = 1; $i <= 15; $i++) {
            SerialKiller::create([
                'name' => sprintf('Filtered Killer %02d', $i),
                'nickname' => sprintf('Filtered Nickname %02d', $i),
                'country' => 'United States',
                'ages' => ['25', '35'],
                'victim_count' => [
                    'killed' => [
                        'claimed' => 5,
                        'confirmed' => 3,
                    ],
                    'wounded' => 0,
                ],
                'description' => 'Test description.',
                'image' => 'test.jpg',
            ]);
        }

        $filters = [
            'search' => 'Filtered',
            'country' => 'United States',
            'sort' => 'name-asc',
        ];

        $this->get(route('cases.killers.index', $filters))
            ->assertOk()
            ->assertViewHas('serial_killers', function ($killers) {
                return $killers->count() === 12
                    && $killers->total() === 15
                    && str_contains($killers->nextPageUrl(), 'search=Filtered')
                    && str_contains($killers->nextPageUrl(), 'country=United')
                    && str_contains($killers->nextPageUrl(), 'sort=name-asc');
            });

        $this->get(route('cases.killers.index', array_merge($filters, ['page' => 2])))
            ->assertOk()
            ->assertViewHas('serial_killers', function ($killers) {
                return $killers->count() === 3
                    && $killers->total() === 15
                    && $killers->currentPage() === 2;
            })
            ->assertSee('Filtered Nickname 15')
            ->assertDontSee('Filtered Nickname 01');
    }
    
    public function test_unsolved_cases_pagination_preserves_filters(): void {
        for ($i = 1; $i <= 15; $i++) {
            UnsolvedCase::create([
                'name' => sprintf('Filtered Case %02d', $i),
                'country' => 'United States',
                'count' => [
                    'killed' => 2,
                    'wounded' => 0,
                ],
                'suspects' => [],
                'description' => 'Test description.',
                'image' => 'test.jpg',
            ]);
        }

        $filters = [
            'search' => 'Filtered',
            'country' => 'United States',
            'sort' => 'name-asc',
        ];

        $this->get(route('cases.unsolved.index', $filters))
            ->assertOk()
            ->assertViewHas('unsolved_cases', function ($cases) {
                $nextPageUrl = $cases->nextPageUrl();

                return $cases->count() === 12
                    && $cases->total() === 15
                    && $nextPageUrl !== null
                    && str_contains($nextPageUrl, 'search=Filtered')
                    && str_contains($nextPageUrl, 'country=United')
                    && str_contains($nextPageUrl, 'sort=name-asc');
            });

        $this->get(route('cases.unsolved.index', array_merge($filters, ['page' => 2])))
            ->assertOk()
            ->assertViewHas('unsolved_cases', function ($cases) {
                return $cases->count() === 3
                    && $cases->total() === 15
                    && $cases->currentPage() === 2;
            })
            ->assertSee('Filtered Case 15')
            ->assertDontSee('Filtered Case 01');
    }
}
