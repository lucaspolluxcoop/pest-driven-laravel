<?php

use App\Models\Portfolio;
use App\Models\PortfolioStatus;

use function Pest\Laravel\get;

it('show_public_portfolios', function () {

    $publicPortfolioStatus = PortfolioStatus::create(['id' => 1, 'title' => 'Public']);
    $portfolio1 = Portfolio::factory()->create(['portfolio_status_id' => $publicPortfolioStatus->id]);
    $portfolio2 = Portfolio::factory()->create(['portfolio_status_id' => $publicPortfolioStatus->id]);
    Portfolio::factory()->create(['portfolio_status_id' => 2]);

    get(route('public-portfolios.get'))
        ->assertJsonFragment($portfolio1->toArray())
        ->assertJsonFragment($portfolio2->toArray())
        ->assertStatus(200);
});
