<?php

use App\Models\Portfolio;
use App\Models\PortfolioItem;

use function Pest\Laravel\get;

it('show_public_portfolios', function () {

    $portfolio1 = Portfolio::factory()->public()->create();
    $portfolio2 = Portfolio::factory()->public()->create();
    Portfolio::factory()->create(['portfolio_status_id' => 2]);

    get(route('public-portfolios.get'))
        ->assertJsonFragment($portfolio1->toArray())
        ->assertJsonFragment($portfolio2->toArray())
        ->assertStatus(200);
});

it('get_public_portfolios_for_public_scope', function () {

    Portfolio::factory()->create(['portfolio_status_id' => 2]);
    Portfolio::factory()->public()->create();

    expect(Portfolio::public()->get())->toHaveCount(1)
        ->first()->id->toEqual(2);
});

it('get_portfolios_items', function () {

    $portfolio = Portfolio::factory()
        ->has(PortfolioItem::factory()->count(3), 'items')
        ->public()
        ->create();

    expect($portfolio->items)->toHaveCount(3)
        ->each->toBeInstanceOf(PortfolioItem::class);
});
