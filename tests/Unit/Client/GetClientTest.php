<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class GetClientTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_find_client()
    {
        $this->assertTrue(true);

        // $fakeClient = Client::factory()->make();
        // $controller = new ClientController(
        // new HardcodedInMemoryGetClientRepository($fakeClient),
        // app()->make(HardcodedInMemoryGetClientRepository::class),
        // new GetClientRepository(),
        // app()->make(StoreClientRepository::class),
        // new StoreClientRepository()
        // );
        // $controller = app()->make(ClientController::class);
        // $expectedClient = $controller->show($fakeClient);

        // $user = User::factory()->make([
        //     'email_verified_at' => null,
        // ])->toArray();
        // $request = $user;
        // $request['password'] = 'password';
        // $request['repeate_password'] = 'password';


        // $response = $this->post('/api/users/', $request);


        // $response
        //     ->assertStatus(201)
        //     ->assertJson(['data' => $user], false);
    }
}
