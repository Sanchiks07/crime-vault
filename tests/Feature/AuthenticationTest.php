<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register(): void {
        Notification::fake();

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('verification.notice'));

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->assertAuthenticated();
    }

    public function test_registration_sends_email_verification_notification(): void {
        Notification::fake();

        $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $user = User::where('email', 'test@example.com')->first();

        Notification::assertSentTo(
            $user,
            VerifyEmail::class
        );
    }

    public function test_user_can_login_with_correct_credentials(): void {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/');

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password(): void {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_login_is_rate_limited_after_five_failed_attempts(): void {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', [
                'email' => 'test@example.com',
                'password' => 'wrongpassword',
            ]);
        }

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertSessionHas('login_lockout_seconds');

        $this->assertGuest();
    }

    public function test_authenticated_user_can_logout(): void {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/logout');

        $response->assertRedirect('/');

        $this->assertGuest();
    }

    public function test_successful_login_clears_failed_attempts(): void {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        // create some failed login attempts without reaching the lockout limit
        for ($i = 0; $i < 3; $i++) {
            $this->post('/login', [
                'email' => 'test@example.com',
                'password' => 'wrongpassword',
            ]);
        }

        // successfully log in
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/');

        $this->assertAuthenticated();

        // log back out
        $this->post('/logout');

        // four new failed attempts should still NOT cause a lockout, because the previous three attempts should have been cleared
        for ($i = 0; $i < 4; $i++) {
            $response = $this->post('/login', [
                'email' => 'test@example.com',
                'password' => 'wrongpassword',
            ]);
        }

        $response->assertSessionMissing('login_lockout_seconds');

        $this->assertGuest();
    }
}