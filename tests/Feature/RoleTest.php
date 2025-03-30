<?php

use App\Models\Role;

it('has_three_starting_roles', function () {

    $roles = Role::all();

    expect($roles)->toHaveCount(3)
        ->first()->value->toEqual('admin');
});
