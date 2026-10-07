<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_unverified_user_can_view_verification_notice(): void {
        $user = User::factory()->unverified()->create();

        $response = $this
            ->actingAs($user)
            ->get('/email/verify');

        $response->assertStatus(200);
    }

    public function test_verified_user_is_redirected_from_verification_notice(): void {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/email/verify');

        $response->assertRedirect(route('home'));
    }

    public function test_user_can_verify_email_with_valid_signed_url(): void {
        Event::fake();

        $user = User::factory()->unverified()->create();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $user->id,
                'hash' => sha1($user->email),
            ]
        );

        $response = $this
            ->actingAs($user)
            ->get($verificationUrl);

        $response->assertRedirect(route('home'));

        $this->assertTrue(
            $user->fresh()->hasVerifiedEmail()
        );

        Event::assertDispatched(Verified::class);
    }

    public function test_email_is_not_verified_with_invalid_signature(): void {
        $user = User::factory()->unverified()->create();

        $response = $this
            ->actingAs($user)
            ->get("/email/verify/{$user->id}/" . sha1($user->email));

        $response->assertStatus(403);

        $this->assertFalse(
            $user->fresh()->hasVerifiedEmail()
        );
    }

    public function test_unverified_user_can_resend_verification_email(): void {
        Notification::fake();

        $user = User::factory()->unverified()->create();

        $response = $this
            ->actingAs($user)
            ->post('/email/verification-notification');

        $response->assertRedirect();

        $response->assertSessionHas(
            'status',
            'verification-link-sent'
        );

        Notification::assertSentTo(
            $user,
            VerifyEmail::class
        );
    }

    public function test_unverified_user_cannot_access_favourites(): void {
        $user = User::factory()->unverified()->create();

        $response = $this
            ->actingAs($user)
            ->get('/favourites');

        $response->assertRedirect(route('verification.notice'));
    }

    public function test_verified_user_can_access_favourites(): void {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/favourites');

        $response->assertStatus(200);
    }

    public function test_unverified_user_cannot_post_discussion(): void {
        $user = User::factory()->unverified()->create();

        $response = $this
            ->actingAs($user)
            ->post('/discussions/serial-killer/1', [
                'body' => 'This should not be posted.',
            ]);

        $response->assertRedirect(route('verification.notice'));
    }
}