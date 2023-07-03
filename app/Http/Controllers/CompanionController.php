<?php

namespace App\Http\Controllers;

use App\Http\Requests\Companion\StoreCompanionRequest;
use App\Http\Requests\Companion\UpdateCompanionRequest;
use App\Http\Resources\CompanionResource;
use App\Models\Companion;
use App\Repositories\Companion\GetCompanionRepository;
use App\Repositories\Companion\StoreCompanionRepository;

class CompanionController extends Controller
{
    public function __construct(
        private readonly GetCompanionRepository $getRepository,
        private readonly StoreCompanionRepository $storeRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanionResource::collection($this->getRepository::getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanionRequest $request)
    {
        return new CompanionResource(
            $this->storeRepository::save($request->collect(), new Companion())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companion $companion
     * @return \Illuminate\Http\Response
     */
    public function show(Companion $companion)
    {
        return new CompanionResource($companion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanionRequest $request
     * @param  \App\Models\Companion                     $companion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanionRequest $request, Companion $companion)
    {
        return new CompanionResource(
            $this->storeRepository::save($request->collect(), $companion)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companion $companion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companion $companion)
    {
        return $this->storeRepository::softDelete($companion);
    }
}
