<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CaseBrowsingTest extends TestCase
{
    public function test_guest_can_view_home_page(): void {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_guest_can_view_serial_killers_page(): void {
        $response = $this->get('/cases/serial-killers');
        $response->assertStatus(200);
    }

    public function test_guest_can_view_unsolved_cases_page(): void {
        $response = $this->get('/cases/unsolved-cases');
        $response->assertStatus(200);
    }

    public function test_guest_can_view_resources_page(): void {
        $this->get(route('resources'))
            ->assertStatus(200);
    }

    public function test_guest_cannot_view_favourites_page(): void {
        $this->get(route('favourites'))
            ->assertRedirect(route('login'));
    }
}