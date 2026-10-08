<?php

namespace Tests\Unit;

use App\Models\CaseEvent;
use App\Models\Discussion;
use App\Models\Favourite;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use App\Models\Victim;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Tests\TestCase;

class CaseModelsTest extends TestCase
{
    public function test_unsolved_case_count_is_cast_to_array(): void {
        $case = new UnsolvedCase();

        $case->count = [
            'killed' => 5,
            'wounded' => 2,
        ];

        $this->assertSame([
            'killed' => 5,
            'wounded' => 2,
        ], $case->count);
    }

    public function test_unsolved_case_suspects_are_cast_to_array(): void {
        $case = new UnsolvedCase();

        $case->suspects = [
            ['name' => 'Suspect One'],
            ['name' => 'Suspect Two'],
        ];

        $this->assertCount(2, $case->suspects);
        $this->assertSame('Suspect One', $case->suspects[0]['name']);
    }

    public function test_unsolved_case_can_have_empty_suspects(): void {
        $case = new UnsolvedCase();

        $case->suspects = [];

        $this->assertSame([], $case->suspects);
    }

    public function test_victim_count_is_cast_to_array(): void {
        $victim = new Victim();

        $victim->count = [
            'killed' => [
                ['name' => 'Test Victim'],
            ],
            'wounded' => [],
        ];

        $this->assertSame(
            'Test Victim',
            $victim->count['killed'][0]['name']
        );

        $this->assertSame([], $victim->count['wounded']);
    }

    public function test_victim_belongs_to_serial_killer(): void {
        $victim = new Victim();

        $this->assertInstanceOf(
            BelongsTo::class,
            $victim->killer()
        );
    }

    public function test_case_event_date_is_cast_to_date(): void {
        $event = new CaseEvent();

        $event->event_date = '1980-05-15';

        $this->assertSame(
            '1980-05-15',
            $event->event_date->format('Y-m-d')
        );
    }

    public function test_case_event_coordinates_have_seven_decimal_places(): void {
        $event = new CaseEvent();

        $event->latitude = 40.7128;
        $event->longitude = -74.006;

        $this->assertSame('40.7128000', $event->latitude);
        $this->assertSame('-74.0060000', $event->longitude);
    }

    public function test_case_event_uses_polymorphic_relationship(): void {
        $event = new CaseEvent();

        $this->assertInstanceOf(
            MorphTo::class,
            $event->eventable()
        );
    }

    public function test_unsolved_case_has_polymorphic_relationships(): void {
    $case = new UnsolvedCase();

        $this->assertInstanceOf(
            MorphMany::class,
            $case->favourites()
        );

        $this->assertInstanceOf(
            MorphMany::class,
            $case->discussions()
        );

        $this->assertInstanceOf(
            MorphMany::class,
            $case->events()
        );
    }

    public function test_serial_killer_has_polymorphic_relationships(): void {
        $killer = new SerialKiller();

        $this->assertInstanceOf(
            MorphMany::class,
            $killer->favourites()
        );

        $this->assertInstanceOf(
            MorphMany::class,
            $killer->discussions()
        );

        $this->assertInstanceOf(
            MorphMany::class,
            $killer->events()
        );
    }
}
