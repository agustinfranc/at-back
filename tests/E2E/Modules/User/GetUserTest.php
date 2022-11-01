<?php

namespace Tests\E2E\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\AssertableJson;

class GetUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_users()
    {
        $users = User::factory()->count(10)->create();


        $response = $this->get('/api/users');


        // $response->assertOk()->assertJson(fn (AssertableJson $json) =>
        // $json->has('data')
        //     ->missing('message'));

        $response->assertOk()
            ->assertJson(['data' => $users->toArray()], false);
    }

    public function test_show_user()
    {
        $user = User::factory()->create();


        $response = $this->get('/api/users/' . $user->id);


        $response->assertOk()
            ->assertJson(['data' => $user->toArray()], false);
    }
}
