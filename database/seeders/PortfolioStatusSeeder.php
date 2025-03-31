<?php

namespace Database\Seeders;

use App\Models\PortfolioStatus;
use Illuminate\Database\Seeder;

class PortfolioStatusSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

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

        foreach ($portfolioStatuses as $status) {
            PortfolioStatus::updateOrInsert(['id' => $status['id']], $status);
        }
    }
}
