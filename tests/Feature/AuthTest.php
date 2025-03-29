<?php

use App\Models\User;

use function Pest\Laravel\post;

it('a_user_can_sign_in', function () {

    $user = User::factory()->create([
        'email' => 'testuser@test.com',
        'password' => bcrypt('12341234')
    ]);

    post(route('login'), ['email' => $user->email, 'password' => '12341234'])
        ->assertOk()
        ->assertJsonStructure([
            'token'
        ]);
});

it('a_user_can_register', function () {

    $user = [
        'email' => 'testuser@test.com',
        'password' => bcrypt('12341234')
    ];

    post(route('register'), $user)
        ->assertOk()
        ->assertJsonStructure([
            'user'
        ]);

    expect(User::where('email', 'testuser@test.com')->get())->tohaveCount(1);
});

it('a_user_cannot_register_with_repeated_email', function () {

    $user = [
        'email' => 'testuser@test.com',
        'password' => bcrypt('12341234')
    ];

    User::factory()->create($user);

    post(route('register'), $user)
        ->assertInvalid('email');
});
