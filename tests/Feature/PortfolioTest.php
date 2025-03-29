<?php

use App\Models\Portfolio;

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

it('show_public_portfolios_for_public_scope', function () {

    Portfolio::factory()->create(['portfolio_status_id' => 2]);
    Portfolio::factory()->public()->create();

    expect(Portfolio::public()->get())->toHaveCount(1)
        ->first()->id->toEqual(2);
});
