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

    $userAuth = User::factory()->create();


    $response = $this->actingAs($userAuth, 'sanctum')->post('/api/users/', $request);


    $this->assertAuthenticated('sanctum');

    $response
        ->assertCreated()
        ->assertJson(['data' => $user], false);
});

test('can update user', function () {
    $user = User::factory()->create()->toArray();
    $user['name'] = 'George';

    $userAuth = User::factory()->create();

    $response = $this->actingAs($userAuth, 'sanctum')->put('/api/users/' . $user['id'], $user);


    $this->assertAuthenticated('sanctum');

    $response
        ->assertOk()
        ->assertJson(['data' => $user], false);
});
