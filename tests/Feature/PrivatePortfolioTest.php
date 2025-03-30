<?php

use App\Models\User;
use App\Models\Portfolio;
use App\Models\PortfolioHistory;

use function Pest\Laravel\get;

it('show_private_portfolios', function () {

    $user = User::factory()
        ->has(Portfolio::factory()->count(2))
        ->create();

    loginAsUser($user);
    get(route('portfolios.get'))
        ->assertJsonCount(2, 'portfolios')
        ->assertOk();
});

it('has_portfolio_history', function () {

    $portfolio = Portfolio::factory()
        ->has(PortfolioHistory::factory()->count(2), 'history')
        ->create();

    expect($portfolio->history)->toHaveCount(2)
        ->each->toBeInstanceOf(PortfolioHistory::class);
});
