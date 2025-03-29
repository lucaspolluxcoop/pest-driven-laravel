<?php

use App\Models\User;
use App\Models\Portfolio;

it('has_portfolios', function () {

    $user = User::factory()
    ->has(Portfolio::factory()->count(2))
    ->create([
        'email' => 'testuser@test.com',
        'password' => bcrypt('12341234')
    ]);

    expect($user->portfolios)->toHaveCount(2)
        ->each->toBeInstanceOf(Portfolio::class);
});
