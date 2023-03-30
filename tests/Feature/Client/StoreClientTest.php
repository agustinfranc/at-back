<?php

namespace Tests\Feature\Client;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\AssertableJson;

class StoreClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_store_client()
    {
        $client = Client::factory()->make()->toArray();

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/clients', $client);

        $this->assertAuthenticated('sanctum');

        $response->assertCreated()
            ->assertJson(['data' => $client], false);
    }

    public function test_can_update_client()
    {
        $client = Client::factory()->create();
        $client->name = 'George';
        $clientsArrayFromResource = json_decode((new ClientResource($client))->toJson(), true);

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->putJson('/api/clients/' . $client->id, $client->toArray());

        $this->assertAuthenticated('sanctum');

        $response
            ->assertOk()
            ->assertJson(['data' => $clientsArrayFromResource], false)
            ->assertJsonPath('data.name', 'George');
    }
}
