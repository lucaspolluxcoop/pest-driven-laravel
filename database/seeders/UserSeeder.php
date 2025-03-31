<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'email'     => 'admin@test.com',
                'password'  => bcrypt('12341234')
            ],
            [
                'email'     => 'test@test.com',
                'password'  => bcrypt('12341234')
            ]
        ];

        $newRoles = Role::all();
        foreach ($users as $index => $user) {
            $newUser = User::updateOrCreate(['email' => $user['email']], $user);
            $newUser->roles()->sync($newRoles[$index]);
        };
    }
}
