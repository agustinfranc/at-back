<?php

use App\Http\Resources\ClientResource;
use App\Models\Client;
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


        $response = $this->postJson('/api/clients', $client);


        $response->assertCreated()
            ->assertJson(['data' => $client], false);
    }

    public function test_can_update_client()
    {
        $client = Client::factory()->create();
        $client->name = 'George';
        $client->save();
        $clientsArrayFromResource = json_decode((new ClientResource($client))->toJson(), true);


        $response = $this->putJson('/api/clients/' . $client->id, $client->toArray());


        $response->assertOk()
            ->assertJson(['data' => $clientsArrayFromResource], false)
            ->assertJsonPath('data.name', 'George');
    }
}
