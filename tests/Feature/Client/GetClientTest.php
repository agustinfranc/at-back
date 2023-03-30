<?php

namespace Tests\Feature\Client;

use App\Http\Resources\ClientCollectionResource;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_clients()
    {
        $clients = Client::factory()->count(10)->create();
        $clientsArrayFromResource = json_decode(ClientCollectionResource::collection($clients)->toJson(), true);

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->get('/api/clients');

        $this->assertAuthenticated('sanctum');

        $response->assertOk()
            ->assertJson(['data' => $clientsArrayFromResource], false);
    }

    public function test_show_client()
    {
        $client = Client::factory()->create();
        $clientsArrayFromResource = json_decode((new ClientResource($client))->toJson(), true);

        $user = User::factory()->create();
        $response = $this->actingAs($user, 'sanctum')->get('/api/clients/' . $client->id);

        $this->assertAuthenticated('sanctum');

        $response->assertOk()
            ->assertJson(['data' => $clientsArrayFromResource], false);
    }
}
