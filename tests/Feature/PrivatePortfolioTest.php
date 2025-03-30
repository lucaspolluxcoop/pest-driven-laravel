<?php

use App\Models\User;
use App\Models\Portfolio;
use App\Models\PortfolioHistory;
use App\Models\PortfolioStatus;

use function Pest\Laravel\get;
use function Pest\Laravel\patch;

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

it('an_admin_can_see_all_portfolios', function () {

    Portfolio::factory()
        ->has(User::factory(), 'owner')
        ->count(2)->create();
    Portfolio::factory()
        ->has(User::factory(), 'owner')
        ->count(3)->create();

    $adminUser = getAdminUser();
    loginAsUser($adminUser);

    get(route('portfolios.get'))
        ->assertJsonCount(5, 'portfolios')
        ->assertOk();
});

it('has_portfolios_statuses', function () {

    $portfolioStatuses = PortfolioStatus::all();

    expect($portfolioStatuses->count())->toBeGreaterThanOrEqual(2);
});

it('an_admin_can_update_any_portfolio', function () {

    $portfolio = Portfolio::factory()
        ->has(User::factory(), 'owner')
        ->create();

    $adminUser = getAdminUser();
    loginAsUser($adminUser);

    $portfolio = $portfolio->toArray();
    $portfolio['title'] = 'Nuevo Título';
    $portfolio['portfolio_status_id'] = PortfolioStatus::PUBLIC;
    patch(route('portfolios.patch', ['portfolio' => $portfolio['id']]), $portfolio)
        ->assertOk()
        ->assertJsonFragment([
            'message' => 'Portfolio succesfully updated',
            'title' => 'Nuevo Título',
            'portfolio_status_id' => PortfolioStatus::PUBLIC,
        ]);
});
