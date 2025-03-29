<?php

namespace Database\Factories;

use App\Models\PortfolioItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PortfolioItem>
 */
class PortfolioItemFactory extends Factory
{
    protected $model = PortfolioItem::class;
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
        ];
    }
}
