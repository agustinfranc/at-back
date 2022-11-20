<?php

use App\Models\Companion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\AssertableJson;

class GetCompanionTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_companions()
    {
        $companions = Companion::factory()->count(10)->create();


        $response = $this->get('/api/companions');


        // $response->assertOk()->assertJson(fn (AssertableJson $json) =>
        // $json->has('data')
        //     ->missing('message'));

        $response->assertOk()
            ->assertJson(['data' => $companions->toArray()], false);
    }

    public function test_show_companion()
    {
        $companion = Companion::factory()->create();


        $response = $this->get('/api/companions/' . $companion->id);


        $response->assertOk()
            ->assertJson(['data' => $companion->toArray()], false);
    }
}
