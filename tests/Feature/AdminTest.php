<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Discussion;
use App\Models\SerialKiller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_admin_discussions(): void {
        $response = $this->get('/admin/discussions');

        $response->assertRedirect(route('login'));
    }

    public function test_normal_user_cannot_access_admin_discussions(): void {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/admin/discussions');

        $response->assertForbidden();
    }
    
    public function test_admin_can_access_admin_discussions(): void {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('/admin/discussions');

        $response->assertOk();
    }

    public function test_unverified_admin_cannot_access_admin_discussions(): void {
        $admin = User::factory()->unverified()->create([
            'role' => 'admin',
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('/admin/discussions');

        $response->assertRedirect(route('verification.notice'));
    }

    public function test_admin_can_view_discussions_on_admin_page(): void {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

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

        $this
            ->actingAs($user)
            ->post("/discussions/serial-killer/{$killer->id}", [
                'content' => 'Discussion visible to the administrator.',
            ]);

        $discussion = Discussion::first();

        $response = $this
            ->actingAs($admin)
            ->get('/admin/discussions');

        $response->assertOk();

        $response->assertSee(
            'Discussion visible to the administrator.'
        );

        $this->assertDatabaseHas('discussions', [
            'id' => $discussion->id,
            'user_id' => $user->id,
            'content' => 'Discussion visible to the administrator.',
        ]);
    }
}