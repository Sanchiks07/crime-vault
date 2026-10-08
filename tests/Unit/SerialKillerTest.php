<?php

namespace Tests\Unit;

use App\Models\SerialKiller;
use PHPUnit\Framework\TestCase;

class SerialKillerTest extends TestCase
{
    public function test_single_age_is_displayed_correctly(): void {
        $killer = new SerialKiller();

        $killer->ages = [
            ['age' => 25],
        ];

        $this->assertSame('25', $killer->age_text);
    }

    public function test_multiple_ages_are_separated_by_slashes(): void {
        $killer = new SerialKiller();

        $killer->ages = [
            ['age' => 25],
            ['age' => 30],
            ['age' => 35],
        ];

        $this->assertSame('25 / 30 / 35', $killer->age_text);
    }

    public function test_missing_ages_return_unknown(): void {
        $killer = new SerialKiller();

        $this->assertSame('Unknown', $killer->age_text);
    }

    public function test_empty_ages_return_unknown(): void {
        $killer = new SerialKiller();

        $killer->ages = [];

        $this->assertSame('Unknown', $killer->age_text);
    }

    public function test_null_ages_are_ignored(): void {
        $killer = new SerialKiller();

        $killer->ages = [
            ['age' => 25],
            ['age' => null],
            ['age' => 35],
        ];

        $this->assertSame('25 / 35', $killer->age_text);
    }

    public function test_all_null_ages_return_unknown(): void {
        $killer = new SerialKiller();

        $killer->ages = [
            ['age' => null],
            ['age' => null],
        ];

        $this->assertSame('Unknown', $killer->age_text);
    }

    public function test_missing_age_keys_are_ignored(): void {
        $killer = new SerialKiller();

        $killer->ages = [
            ['age' => 25],
            ['description' => 'Age unavailable'],
            ['age' => 40],
        ];

        $this->assertSame('25 / 40', $killer->age_text);
    }

    public function test_age_order_is_preserved(): void {
        $killer = new SerialKiller();

        $killer->ages = [
            ['age' => 40],
            ['age' => 25],
            ['age' => 30],
        ];

        $this->assertSame('40 / 25 / 30', $killer->age_text);
    }
}
