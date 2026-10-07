<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FavouriteTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_favourites(): void {
        $response = $this->get('/favourites');

        $response->assertRedirect(route('login'));
    }

    public function test_verified_user_can_add_serial_killer_to_favourites(): void {
        $user = User::factory()->create();

        $killer = SerialKiller::create([
            'name' => 'Test Killer',
            'nickname' => 'The Test Killer',
            'ages' => [
                'born' => '1980-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 5,
                    'confirmed' => 3,
                ],
                'wounded' => 1,
            ],
            'description' => 'Test serial killer used for automated testing.',
            'image' => 'test.jpg',
        ]);

        $response = $this
            ->actingAs($user)
            ->post("/favourites/serial-killer/{$killer->id}");

        $response->assertRedirect();

        $this->assertDatabaseHas('favourites', [
            'user_id' => $user->id,
            'favouritable_id' => $killer->id,
            'favouritable_type' => SerialKiller::class,
        ]);
    }

    public function test_verified_user_can_remove_serial_killer_from_favourites(): void {
        $user = User::factory()->create();

        $killer = SerialKiller::create([
            'name' => 'Test Killer',
            'nickname' => 'The Test Killer',
            'ages' => [
                'born' => '1980-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 5,
                    'confirmed' => 3,
                ],
                'wounded' => 1,
            ],
            'description' => 'Test serial killer used for automated testing.',
            'image' => 'test.jpg',
        ]);

        // first request adds the killer
        $this
            ->actingAs($user)
            ->post("/favourites/serial-killer/{$killer->id}");

        $this->assertDatabaseHas('favourites', [
            'user_id' => $user->id,
            'favouritable_id' => $killer->id,
            'favouritable_type' => SerialKiller::class,
        ]);

        // second request should remove the same killer
        $response = $this
            ->actingAs($user)
            ->post("/favourites/serial-killer/{$killer->id}");

        $response->assertRedirect();

        $this->assertDatabaseMissing('favourites', [
            'user_id' => $user->id,
            'favouritable_id' => $killer->id,
            'favouritable_type' => SerialKiller::class,
        ]);
    }

    public function test_verified_user_can_add_unsolved_case_to_favourites(): void {
        $user = User::factory()->create();

        $case = UnsolvedCase::create([
            'name' => 'Test Unsolved Case',
            'country' => 'United States',
            'count' => [
                'killed' => 2,
                'wounded' => 0,
            ],
            'suspects' => [
                'Test Suspect',
            ],
            'description' => 'Test unsolved case used for automated testing.',
            'image' => 'test.jpg',
        ]);

        $response = $this
            ->actingAs($user)
            ->post("/favourites/unsolved-case/{$case->id}");

        $response->assertRedirect();

        $this->assertDatabaseHas('favourites', [
            'user_id' => $user->id,
            'favouritable_id' => $case->id,
            'favouritable_type' => UnsolvedCase::class,
        ]);
    }

    public function test_verified_user_can_remove_unsolved_case_from_favourites(): void {
        $user = User::factory()->create();

        $case = UnsolvedCase::create([
            'name' => 'Test Unsolved Case',
            'country' => 'United States',
            'count' => [
                'killed' => 2,
                'wounded' => 0,
            ],
            'suspects' => [
                'Test Suspect',
            ],
            'description' => 'Test unsolved case used for automated testing.',
            'image' => 'test.jpg',
        ]);

        // add the case to favourites
        $this
            ->actingAs($user)
            ->post("/favourites/unsolved-case/{$case->id}");

        $this->assertDatabaseHas('favourites', [
            'user_id' => $user->id,
            'favouritable_id' => $case->id,
            'favouritable_type' => UnsolvedCase::class,
        ]);

        // toggle it again to remove it
        $response = $this
            ->actingAs($user)
            ->post("/favourites/unsolved-case/{$case->id}");

        $response->assertRedirect();

        $this->assertDatabaseMissing('favourites', [
            'user_id' => $user->id,
            'favouritable_id' => $case->id,
            'favouritable_type' => UnsolvedCase::class,
        ]);
    }

    public function test_favourite_belongs_only_to_the_user_who_added_it(): void {
        $firstUser = User::factory()->create();
        $secondUser = User::factory()->create();

        $killer = SerialKiller::create([
            'name' => 'Test Killer',
            'nickname' => 'The Test Killer',
            'ages' => [
                'born' => '1980-01-01',
                'died' => null,
            ],
            'country' => 'United States',
            'victim_count' => [
                'killed' => [
                    'claimed' => 5,
                    'confirmed' => 3,
                ],
                'wounded' => 1,
            ],
            'description' => 'Test serial killer used for automated testing.',
            'image' => 'test.jpg',
        ]);

        $this
            ->actingAs($firstUser)
            ->post("/favourites/serial-killer/{$killer->id}");

        $this->assertDatabaseHas('favourites', [
            'user_id' => $firstUser->id,
            'favouritable_id' => $killer->id,
            'favouritable_type' => SerialKiller::class,
        ]);

        $this->assertDatabaseMissing('favourites', [
            'user_id' => $secondUser->id,
            'favouritable_id' => $killer->id,
            'favouritable_type' => SerialKiller::class,
        ]);
    }

    public function test_invalid_favourite_type_returns_404(): void {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/favourites/invalid-type/1');

        $response->assertNotFound();

        $this->assertDatabaseCount('favourites', 0);
    }
}