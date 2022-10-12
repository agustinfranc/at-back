<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Assignment\StoreAssignmentRequest;
use App\Http\Requests\Assignment\UpdateAssignmentRequest;
use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Repositories\Assignment\GetAssignmentRepository;
use App\Repositories\Assignment\StoreAssignmentRepository;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function __construct(
        private readonly GetAssignmentRepository $getRepository,
        private readonly StoreAssignmentRepository $storeRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AssignmentResource::collection($this->getRepository::getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssignmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignmentRequest $request)
    {
        return new AssignmentResource(
            $this->storeRepository->storeWithDays($request->collect(), new Assignment)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        return new AssignmentResource($assignment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignmentRequest  $request
     * @param  \App\Models\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        return new AssignmentResource(
            $this->storeRepository->storeWithDays($request->collect(), $assignment)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }
}
