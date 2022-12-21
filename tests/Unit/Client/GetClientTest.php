<?php

namespace Tests\Unit\Client;

use App\Http\Controllers\ClientController;
use App\Models\Client;
use App\Modules\Client\Interfaces\IGetClientRepository;
use App\Repositories\Client\GetClientRepository;
use App\Repositories\Client\StoreClientRepository;

test('find a client', function () {
    $this->setUp();

    $fakeClient = Client::factory()->make();
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
});
