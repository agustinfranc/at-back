<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentTemplateRequest;
use App\Http\Requests\UpdateAssignmentTemplateRequest;
use App\Http\Resources\AssignmentTemplateResource;
use App\Models\Assignment;
use App\Models\AssignmentTemplate;
use App\Repositories\AssignmentTemplate\GetAssignmentTemplateRepository;

class AssignmentTemplateController extends Controller
{
    public function __construct(
        private readonly GetAssignmentTemplateRepository $getRepository,
        private readonly StoreAssignmentTemplateRequest $storeRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AssignmentTemplateResource::collection($this->getRepository::getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssignmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignmentTemplateRequest $request)
    {
        return new AssignmentTemplateResource(
            $this->storeRepository->storeWithDays($request->collect(), new Assignment)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(AssignmentTemplate $assignmentTemplate)
    {
        return new AssignmentTemplateResource($assignmentTemplate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignmentRequest  $request
     * @param  \App\Models\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignmentTemplateRequest $request, AssignmentTemplate $assignmentTemplate)
    {
        return new AssignmentTemplateResource(
            $this->storeRepository->storeWithDays($request->collect(), $assignmentTemplate)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentTemplate $assignmentTemplate)
    {
        return $this->storeRepository->softDelete($assignmentTemplate);
    }
}
