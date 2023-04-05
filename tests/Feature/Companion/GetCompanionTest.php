<?php

namespace Tests\Feature\Companion;

use App\Models\Companion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetCompanionTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_companions()
    {
        $companions = Companion::factory()->count(10)->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->get('/api/companions');


        $this->assertAuthenticated('sanctum');

        $response->assertOk()
            ->assertJson(['data' => $companions->toArray()], false);
    }

    public function test_show_companion()
    {
        $companion = Companion::factory()->create();

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->get('/api/companions/' . $companion->id);


        $this->assertAuthenticated('sanctum');

        $response->assertOk()
            ->assertJson(['data' => $companion->toArray()], false);
    }
}
