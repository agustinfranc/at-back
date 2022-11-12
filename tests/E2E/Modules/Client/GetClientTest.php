<?php

namespace Tests\E2E\Client;

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


        $response = $this->get('/api/clients');


        $response->assertOk()
            ->assertJson(['data' => $clients->toArray()], false);
    }

    public function test_show_client()
    {
        $client = Client::factory()->create();


        $response = $this->get('/api/clients/' . $client->id);


        $response->assertOk()
            ->assertJson(['data' => $client->toArray()], false);
    }
}
