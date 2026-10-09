<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use App\Models\Discussion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class DiscussionTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_post_discussion(): void {
        $response = $this->post('/discussions/serial-killer/1', [
            'content' => 'This is a test discussion.',
        ]);

        $response->assertRedirect(route('login'));

        $this->assertDatabaseCount('discussions', 0);
    }

    public function test_verified_user_can_post_discussion_on_serial_killer(): void {
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
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => 'This is a test discussion about the case.',
            ]);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('discussions', [
            'user_id' => $user->id,
            'discussable_id' => $killer->id,
            'discussable_type' => SerialKiller::class,
            'content' => 'This is a test discussion about the case.',
        ]);
    }

    public function test_verified_user_can_post_discussion_on_unsolved_case(): void {
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
            ->post("/discussions/unsolved-case/{$case->id}", [
                'content' => 'This is a test discussion about the unsolved case.',
            ]);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('discussions', [
            'user_id' => $user->id,
            'discussable_id' => $case->id,
            'discussable_type' => UnsolvedCase::class,
            'content' => 'This is a test discussion about the unsolved case.',
        ]);
    }

    public function test_discussion_content_is_required(): void {
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
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => '',
            ]);

        $response->assertSessionHasErrors('content');

        $this->assertDatabaseCount('discussions', 0);
    }

    public function test_discussion_content_cannot_exceed_2000_characters(): void {
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
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => str_repeat('A', 2001),
            ]);

        $response->assertSessionHasErrors('content');

        $this->assertDatabaseCount('discussions', 0);
    }

    public function test_user_can_edit_their_own_discussion(): void {
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

        // create the discussion through the actual application
        $this
            ->actingAs($user)
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => 'Original discussion content.',
            ]);

        $discussion = Discussion::first();

        $response = $this
            ->actingAs($user)
            ->patch("/discussions/{$discussion->id}", [
                'content' => 'Updated discussion content.',
            ]);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('discussions', [
            'id' => $discussion->id,
            'user_id' => $user->id,
            'content' => 'Updated discussion content.',
        ]);

        $this->assertDatabaseMissing('discussions', [
            'id' => $discussion->id,
            'content' => 'Original discussion content.',
        ]);
    }

    public function test_user_cannot_edit_another_users_discussion(): void {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

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

        // owner creates the discussion
        $this
            ->actingAs($owner)
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => 'Original discussion content.',
            ]);

        $discussion = Discussion::first();

        // another user attempts to edit it
        $response = $this
            ->actingAs($otherUser)
            ->patch("/discussions/{$discussion->id}", [
                'content' => 'I should not be allowed to change this.',
            ]);

        $response->assertForbidden();

        // original content must remain unchanged
        $this->assertDatabaseHas('discussions', [
            'id' => $discussion->id,
            'user_id' => $owner->id,
            'content' => 'Original discussion content.',
        ]);

        $this->assertDatabaseMissing('discussions', [
            'id' => $discussion->id,
            'content' => 'I should not be allowed to change this.',
        ]);
    }

    public function test_user_can_delete_their_own_discussion(): void {
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

        // user creates their discussion
        $this
            ->actingAs($user)
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => 'This discussion will be deleted.',
            ]);

        $discussion = Discussion::first();

        $this->assertDatabaseHas('discussions', [
            'id' => $discussion->id,
            'user_id' => $user->id,
        ]);

        // user deletes their own discussion
        $response = $this
            ->actingAs($user)
            ->delete("/discussions/{$discussion->id}");

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('discussions', [
            'id' => $discussion->id,
        ]);
    }

    public function test_user_cannot_delete_another_users_discussion(): void {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

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

        // owner creates the discussion
        $this
            ->actingAs($owner)
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => 'Only the owner or an admin should delete this.',
            ]);

        $discussion = Discussion::first();

        // another normal user attempts to delete it
        $response = $this
            ->actingAs($otherUser)
            ->delete("/discussions/{$discussion->id}");

        $response->assertForbidden();

        // the discussion must still exist
        $this->assertDatabaseHas('discussions', [
            'id' => $discussion->id,
            'user_id' => $owner->id,
            'content' => 'Only the owner or an admin should delete this.',
        ]);
    }

    public function test_admin_can_delete_another_users_discussion(): void {
        $owner = User::factory()->create();

        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

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

        // normal user creates the discussion
        $this
            ->actingAs($owner)
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => 'This discussion can be moderated by an admin.',
            ]);

        $discussion = Discussion::first();

        $this->assertDatabaseHas('discussions', [
            'id' => $discussion->id,
            'user_id' => $owner->id,
        ]);

        // admin deletes another user's discussion
        $response = $this
            ->actingAs($admin)
            ->delete("/discussions/{$discussion->id}");

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('discussions', [
            'id' => $discussion->id,
        ]);
    }

    public function test_invalid_discussion_type_returns_404(): void {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/discussions/invalid-type/1', [
                'content' => 'This discussion should never be created.',
            ]);

        $response->assertNotFound();

        $this->assertDatabaseCount('discussions', 0);
    }

    
    public function test_user_cannot_post_more_than_five_comments_per_minute(): void {
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

        $key = 'discussion-store:' . $user->id;

        // reset the rate limiter before testing
        RateLimiter::clear($key);

        try {
            // the first five comments should be accepted
            for ($i = 1; $i <= 5; $i++) {
                $response = $this
                    ->actingAs($user)
                    ->post("/discussions/serial-killer/{$killer->id}", [
                        'content' => "Test comment {$i}",
                    ]);

                $response->assertSessionHasNoErrors();
            }

            $this->assertDatabaseCount('discussions', 5);

            // the sixth comment should be rejected
            $response = $this
                ->actingAs($user)
                ->post("/discussions/serial-killer/{$killer->id}", [
                    'content' => 'This comment should be blocked.',
                ]);

            $response->assertSessionHasErrors('content');

            // the rejected comment must not be saved
            $this->assertDatabaseCount('discussions', 5);

            $this->assertDatabaseMissing('discussions', [
                'content' => 'This comment should be blocked.',
            ]);
        } finally {
            // prevent the limiter from affecting other tests
            RateLimiter::clear($key);
        }
    }

    
    public function test_discussion_rate_limit_is_separate_for_each_user(): void {
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

        $firstKey = 'discussion-store:' . $firstUser->id;
        $secondKey = 'discussion-store:' . $secondUser->id;

        RateLimiter::clear($firstKey);
        RateLimiter::clear($secondKey);

        try {
            // first user reaches the limit
            for ($i = 1; $i <= 5; $i++) {
                $this->actingAs($firstUser)
                    ->post("/discussions/serial-killer/{$killer->id}", [
                        'content' => "First user comment {$i}",
                    ])
                    ->assertSessionHasNoErrors();
            }

            // first user cannot post another comment
            $this->actingAs($firstUser)
                ->post("/discussions/serial-killer/{$killer->id}", [
                    'content' => 'Blocked comment',
                ])
                ->assertSessionHasErrors('content');

            // second user must still be able to post
            $this->actingAs($secondUser)
                ->post("/discussions/serial-killer/{$killer->id}", [
                    'content' => 'Second user comment',
                ])
                ->assertSessionHasNoErrors();

            $this->assertDatabaseCount('discussions', 6);

            $this->assertDatabaseHas('discussions', [
                'user_id' => $secondUser->id,
                'content' => 'Second user comment',
            ]);

            $this->assertDatabaseMissing('discussions', [
                'content' => 'Blocked comment',
            ]);
        } finally {
            RateLimiter::clear($firstKey);
            RateLimiter::clear($secondKey);
        }
    }
}