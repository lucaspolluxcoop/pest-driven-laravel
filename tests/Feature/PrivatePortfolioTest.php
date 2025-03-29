<?php

use App\Models\User;
use App\Models\Portfolio;

use function Pest\Laravel\get;

it('show_private_portfolios', function () {

    $user = User::factory()
        ->has(Portfolio::factory()->count(2))
        ->create();

    $this->actingAs($user);
    get(route('portfolios.get'))
        ->assertJsonCount(2, 'portfolios')
        ->assertOk();
});
