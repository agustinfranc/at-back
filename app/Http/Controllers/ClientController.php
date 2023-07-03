<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Http\Resources\ClientCollectionResource;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Modules\Client\Interfaces\IGetClientRepository;
use App\Repositories\Client\StoreClientRepository;

class ClientController extends Controller
{
    public function __construct(
        private readonly IGetClientRepository $getRepository,
        private readonly StoreClientRepository $storeRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClientCollectionResource::collection($this->getRepository::getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        return new ClientResource(
            $this->storeRepository->save($request->collect(), new Client())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest $request
     * @param  \App\Models\Client                     $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        return new ClientResource(
            $this->storeRepository::save($request->collect(), $client)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $this->storeRepository::softDelete($client);
    }
}
