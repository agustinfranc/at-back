<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_users()
    {
        $users = User::factory()->count(10)->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->get('/api/users');


        $this->assertAuthenticated('sanctum');

        $response->assertOk()
            ->assertJson(['data' => $users->toArray()], false);
    }

    public function test_show_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->get('/api/users/' . $user->id);


        $this->assertAuthenticated('sanctum');

        $response->assertOk()
            ->assertJson(['data' => $user->toArray()], false);
    }
}
