<?php

namespace Tests\Feature;

use App\Models\CaseEvent;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CaseEventTest extends TestCase
{
    use RefreshDatabase;

    private function createKiller(): SerialKiller {
        return SerialKiller::create([
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
    }

    private function createUnsolvedCase(): UnsolvedCase {
        return UnsolvedCase::create([
            'name' => 'Test Mystery',
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

    private function createEvent(
        SerialKiller|UnsolvedCase $case,
        string $title,
        string $date,
        string $type = 'murder',
        ?float $latitude = 40.7128,
        ?float $longitude = -74.0060
    ): CaseEvent {
        $event = new CaseEvent([
            'title' => $title,
            'event_date' => $date,
            'event_type' => $type,
            'location' => 'Test Location',
            'description' => 'Test event description.',
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        $event->eventable()->associate($case);
        $event->save();

        return $event;
    }

    public function test_guest_can_view_explore_page(): void {
        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('Explore the Archive');
    }

    public function test_explore_page_displays_serial_killer_events(): void {
        $killer = $this->createKiller();

        $this->createEvent(
            $killer,
            'Test Killer Arrest',
            '1980-05-10',
            'arrest'
        );

        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('Test Killer Arrest')
            ->assertSee('The Test Killer');
    }

    public function test_explore_page_displays_unsolved_case_events(): void {
        $case = $this->createUnsolvedCase();

        $this->createEvent(
            $case,
            'Test Mystery Discovery',
            '1950-01-15',
            'discovery'
        );

        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('Test Mystery Discovery')
            ->assertSee('Test Mystery');
    }

    public function test_events_are_sorted_chronologically(): void {
        $killer = $this->createKiller();

        $this->createEvent($killer, 'Later Event', '1990-01-01');
        $this->createEvent($killer, 'Earlier Event', '1980-01-01');

        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSeeInOrder([
                'Earlier Event',
                'Later Event',
            ]);
    }

    public function test_timeline_displays_event_information(): void {
        $killer = $this->createKiller();

        $this->createEvent(
            $killer,
            'Important Investigation',
            '1985-06-12',
            'investigation'
        );

        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('Important Investigation')
            ->assertSee('Jun 12')
            ->assertSee('1985')
            ->assertSee('Investigation')
            ->assertSee('Test Location')
            ->assertSee('Test event description.');
    }

    public function test_timeline_identifies_case_categories(): void {
        $killer = $this->createKiller();
        $case = $this->createUnsolvedCase();

        $this->createEvent($killer, 'Killer Event', '1980-01-01');
        $this->createEvent($case, 'Mystery Event', '1990-01-01');

        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('data-case-type="serial-killer"', false)
            ->assertSee('data-case-type="unsolved-case"', false);
    }

    public function test_timeline_identifies_event_types(): void {
        $killer = $this->createKiller();

        $this->createEvent(
            $killer,
            'Arrest Event',
            '1980-01-01',
            'arrest'
        );

        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('data-event-type="arrest"', false);
    }

    public function test_events_with_coordinates_are_included_on_map(): void {
        $killer = $this->createKiller();

        $this->createEvent(
            $killer,
            'Mapped Event',
            '1980-01-01'
        );

        $response = $this->get(route('caseEvents'));

        $response->assertOk();

        $this->assertCount(
            1,
            $response->viewData('events')
                ->filter(fn ($event) =>
                    $event->latitude && $event->longitude
                )
        );
    }

    public function test_events_without_coordinates_are_excluded_from_map(): void {
        $killer = $this->createKiller();

        $this->createEvent(
            $killer,
            'Unmapped Event',
            '1980-01-01',
            'murder',
            null,
            null
        );

        $response = $this->get(route('caseEvents'));

        $response->assertOk()
            ->assertSee('Unmapped Event');

        $this->assertCount(
            0,
            $response->viewData('events')
                ->filter(fn ($event) =>
                    $event->latitude && $event->longitude
                )
        );
    }

    public function test_empty_timeline_displays_message(): void {
        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee(
                'No timeline events are currently available.'
            );
    }

    public function test_explore_page_contains_category_filters(): void {
        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('data-filter="all"', false)
            ->assertSee('data-filter="serial-killer"', false)
            ->assertSee('data-filter="unsolved-case"', false);
    }

    public function test_explore_page_contains_event_type_filter(): void {
        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('id="event-type-filter"', false)
            ->assertSee('value="murder"', false)
            ->assertSee('value="arrest"', false)
            ->assertSee('value="investigation"', false);
    }

    public function test_explore_page_contains_timeline_and_map(): void {
        $this->get(route('caseEvents'))
            ->assertOk()
            ->assertSee('id="timeline-view"', false)
            ->assertSee('id="map-view"', false)
            ->assertSee('id="case-map"', false);
    }
}
