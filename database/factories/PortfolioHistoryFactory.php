<?php

namespace Database\Factories;

use App\Models\PortfolioHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PortfolioHistory>
 */
class PortfolioHistoryFactory extends Factory
{
    protected $model = PortfolioHistory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'action' => $this->faker->sentence,
            'reason' => $this->faker->paragraph,
            'goal' => $this->faker->paragraph,
        ];
    }
}
