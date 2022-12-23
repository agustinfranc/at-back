<?php

namespace Tests\Feature\Companion;

use App\Models\Companion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetCompanionTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_companions()
    {
        $companions = Companion::factory()->count(10)->create();


        $response = $this->get('/api/companions');


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
