<?php

namespace Tests\E2E;

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

    // public function test_show_commerce_unauthenticated()
    // {
    //     $commerce = Commerce::factory()->create();
    //     CommerceBranch::factory()->count(2)->create([
    //         'commerce_id' => $commerce->id,
    //     ]);
    //     $rubro = Rubro::factory()->create();
    //     $product = Product::factory()->create([
    //         'commerce_id' => $commerce->id,
    //         'subrubro_id' => Subrubro::factory()->create([
    //             'rubro_id' => $rubro->id,
    //         ]),
    //     ]);
    //     $commerce->rubros()->attach($rubro->id);
    //     $commerce->subrubros()->attach($product->subrubro_id);


    //     $response = $this->get('/api/' . $commerce->name);


    //     $this->assertGuest($guard = null);

    //     $response->assertOk()
    //         ->assertJsonStructure(
    //             array_merge(
    //                 array_keys($commerce->toArray()),
    //                 ['rubros', 'currency']
    //             )
    //         )
    //         ->assertJsonPath('name', $commerce->name);
    // }

    // public function test_show_commerces_unauthenticated()
    // {
    //     $commerces = Commerce::factory()->count(2)->create();


    //     $response = $this->get('/api/commerces');


    //     $this->assertGuest($guard = null);

    //     $response->assertOk()
    //         ->assertJsonStructure([
    //             '*' => array_keys($commerces[0]->toArray())
    //         ])
    //         ->assertJsonPath('0.name', $commerces[0]->name)
    //         ->assertJsonPath('1.name', $commerces[1]->name);
    // }

    // public function test_show_commerce_authenticated()
    // {
    //     $commerce = Commerce::factory()->create();
    //     $user = User::factory()->create();

    //     $commerce->users()->attach($user->id);


    //     $response = $this->actingAs($user, 'sanctum')
    //         ->get('/api/auth/commerces/' . $commerce->id);


    //     $this->assertAuthenticated('sanctum');

    //     $response->assertOk()
    //         ->assertJsonStructure(array_keys($commerce->toArray()))
    //         ->assertJsonPath('name', $commerce->name);
    // }

    // public function test_show_commerces_authenticated()
    // {
    //     $commerces = Commerce::factory()->count(2)->create();

    //     $user = User::factory()->create();

    //     $commerces[0]->users()->attach($user->id);
    //     $commerces[1]->users()->attach($user->id);


    //     $response = $this->actingAs($user, 'sanctum')
    //         ->get('/api/auth/commerces');


    //     $this->assertAuthenticated('sanctum');

    //     $response->assertOk()
    //         ->assertJsonStructure([
    //             '*' => array_keys($commerces[0]->toArray())
    //         ])
    //         ->assertJsonPath('0.name', $commerces[0]->name)
    //         ->assertJsonPath('1.name', $commerces[1]->name);
    // }

    // public function test_commerce_not_found()
    // {
    //     $fakeCommerceName = 'fake-name';


    //     $response = $this->get('/api/' . $fakeCommerceName);


    //     $this->assertGuest($guard = null);

    //     $response->assertNotFound();
    // }

    // public function test_cannot_show_not_own_commerce()
    // {
    //     $commerce = Commerce::factory()->create();

    //     $user = User::factory()->create();


    //     $response = $this->actingAs($user, 'sanctum')
    //         ->get('/api/auth/commerces/' . $commerce->id);


    //     $this->assertAuthenticated('sanctum');

    //     $this->expectException('Symfony\Component\HttpKernel\Exception\HttpException');

    //     $response->assertUnauthorized()
    //         ->assertJsonStructure(['message']);
    // }
}
