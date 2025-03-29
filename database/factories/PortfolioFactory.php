<?php

namespace Database\Factories;

use App\Models\Portfolio;
use App\Models\PortfolioStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    protected $model = Portfolio::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'portfolio_status_id' => PortfolioStatus::PRIVATE,
        ];
    }

    public function public()
    {
        return $this->state(
            fn ($attributes) => ['portfolio_status_id' => PortfolioStatus::PUBLIC]
        );
    }
}
