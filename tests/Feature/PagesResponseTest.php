<?php
use function Pest\Laravel\get;

it('gives back succesfull response from homepage', function() {
  get(route('home'))
    ->assertOk();
});
