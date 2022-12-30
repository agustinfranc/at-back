<?php

namespace Tests\Feature\Client;

use App\Http\Resources\ClientCollectionResource;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\AssertableJson;

class GetClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_clients()
    {
        $clients = Client::factory()->count(10)->create();
        $clientsArrayFromResource = json_decode(ClientCollectionResource::collection($clients)->toJson(), true);


        $response = $this->get('/api/clients');


        $response->assertOk()
            ->assertJson(['data' => $clientsArrayFromResource], false);
    }

    public function test_show_client()
    {
        $client = Client::factory()->create();
        $clientsArrayFromResource = json_decode((new ClientResource($client))->toJson(), true);


        $response = $this->get('/api/clients/' . $client->id);


        $response->assertOk()
            ->assertJson(['data' => $clientsArrayFromResource], false);
    }
}
