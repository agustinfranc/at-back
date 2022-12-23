<?php

namespace Tests\Feature\User;

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
        ->assertCreated()
        ->assertJson(['data' => $user], false);
});

test('can update user', function () {
    $user = User::factory()->create()->toArray();
    $user['name'] = 'George';


    $response = $this->put('/api/users/' . $user['id'], $user);


    $response
        ->assertOk()
        ->assertJson(['data' => $user], false);
});
