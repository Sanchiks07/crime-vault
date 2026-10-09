<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class UserSeeder extends Seeder
{
    public function run(): void {
        // never create demo accounts in production
        if (app()->environment('production')) {
            return;
        }

        $email = config('crimevault.seed_admin_email');
        $password = config('crimevault.seed_admin_password');

        // keep demo accounts disabled unless credentials are configured
        if (!$email && !$password) {
            return;
        }

        if (!$email || !$password || strlen($password) < 12) {
            throw new RuntimeException(
                'Valid demo admin credentials must be configured.'
            );
        }

        // create the demo administrator without overwriting existing accounts
        $admin = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Sanija',
                'password' => Hash::make($password),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // never automatically promote an existing account
        if (!$admin->wasRecentlyCreated && $admin->role !== 'admin') {
            throw new RuntimeException(
                'The configured admin email already belongs to a non-admin user.'
            );
        }

        // create a separate, verified demo user for discussions
        // this account uses a random password and cannot be logged into until its password is explicitly reset
        $keita = User::firstOrCreate(
            ['email' => 'keita.demo@crimevault.test'],
            [
                'name' => 'Keita',
                'password' => Hash::make(
                    bin2hex(random_bytes(32))
                ),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );

        // prevent an existing account at this email from being used as a demo account if its details do not match
        if (!$keita->wasRecentlyCreated &&
            ($keita->name !== 'Keita' || $keita->role !== 'user')) {
            throw new RuntimeException(
                'The demo Keita email already belongs to another account.'
            );
        }
    }
}
