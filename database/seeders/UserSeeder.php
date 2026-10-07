<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Sanija',
                'email' => 'mitniecesanija@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'role' => 'admin'
            ],

            [
                'name' => 'Keita',
                'email' => 'ipb23.t.paegle@vtdt.edu.lv',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'role' => 'user'
            ]
        ]);
    }
}
