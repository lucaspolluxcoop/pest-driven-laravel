<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Portfolio;

it('has_portfolios', function () {

    $user = User::factory()
    ->has(Portfolio::factory()->count(2))
    ->create();

    expect($user->portfolios)->toHaveCount(2)
        ->each->toBeInstanceOf(Portfolio::class);
});

it('has_roles', function () {

    $user = User::factory()->create();

    $roles = Role::factory()->count(2)->create();

    $user->roles()->attach($roles);

    expect($user->roles)->toHaveCount(2)
        ->each->toBeInstanceOf(Role::class);
});
