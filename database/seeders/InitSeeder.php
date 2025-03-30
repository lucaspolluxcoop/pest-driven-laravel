<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\PortfolioStatus;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'title' => 'Administrator',
                'value' => 'admin'
            ],
            [
                'id' => 2,
                'title' => 'Advisor',
                'value' => 'advisor'
            ],
            [
                'id' => 3,
                'title' => 'Subscriptor',
                'value' => 'subscriptor'
            ],
        ];

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

        $portfolioStatuses = [
            [
                'id'    => 1,
                'title' => 'Public',
            ],
            [
                'id'    => 2,
                'title' => 'Private',
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrInsert(['id' => $role['id']], $role);
        }
        $newRoles = Role::all();
        foreach ($users as $index => $user) {
            $newUser = User::updateOrCreate(['email' => $user['email']], $user);
            $newUser->roles()->sync($newRoles[$index]);
        };
        foreach ($portfolioStatuses as $status) {
            PortfolioStatus::updateOrInsert(['id' => $status['id']], $status);
        }
    }
}
