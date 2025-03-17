<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@test.com',
            'password'  => bcrypt('12341234')
        ]);
        User::create([
            'email' => 'test@test.com',
            'password'  => bcrypt('12341234')
        ]);
    }
}
