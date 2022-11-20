<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can store user', function () {
    $user = User::factory()->make([
        'email_verified_at' => null,
    ])->toArray();
    $request = $user;
    $request['password'] = 'password';
    $request['repeate_password'] = 'password';


    $response = $this->post('/api/users/', $request);


    $response
        ->assertStatus(201)
        ->assertJson(['data' => $user], false);
});
