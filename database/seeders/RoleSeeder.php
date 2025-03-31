<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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

        foreach ($roles as $role) {
            Role::updateOrInsert(['id' => $role['id']], $role);
        }
    }
}
