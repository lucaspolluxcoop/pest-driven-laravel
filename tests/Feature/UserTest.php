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

    $roles = Role::all()->random(2);

    $user->roles()->attach($roles);

    expect($user->roles)->toHaveCount(2)
        ->each->toBeInstanceOf(Role::class);
});

it('has_an_admin_user', function () {

    $adminUser = getAdminUser();

    expect($adminUser)->not->toBeNull()
        ->and($adminUser)->toBeInstanceOf(User::class)
        ->and($adminUser->roles->first()->value)->toEqual(Role::ADMIN);
});
