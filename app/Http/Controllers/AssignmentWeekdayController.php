<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentWeekdayRequest;
use App\Http\Requests\UpdateAssignmentWeekdayRequest;
use \App\Models\AssignmentWeekday;
use App\Repositories\AssignmentWeekday\GetAssignmentWeekdayRepository;
use App\Repositories\AssignmentWeekday\StoreAssigmentWeekdayRepository;

class AssignmentWeekdayController extends Controller
{
    public function __construct(
        private readonly GetAssignmentWeekdayRepository $getRepository,
        private readonly StoreAssigmentWeekdayRepository $storeRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getRepository::getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssignmentWeekdayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignmentWeekdayRequest $request)
    {
        return $this->storeRepository::store($request->collect());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignmentWeekday $weekdays
     * @return \Illuminate\Http\Response
     */
    public function show(AssignmentWeekday $weekdays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignmentWeekdayRequest  $request
     * @param  \App\Models\AssignmentWeekday  $weekdays
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignmentWeekdayRequest $request, AssignmentWeekday $weekdays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentWeekday  $weekdays
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentWeekday $weekdays)
    {
        //
    }
}
