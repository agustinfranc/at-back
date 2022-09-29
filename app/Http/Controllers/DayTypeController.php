<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDayTypeRequest;
use App\Http\Requests\UpdateDayTypeRequest;
use App\Models\DayType;

class DayTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDayTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDayTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DayType  $dayType
     * @return \Illuminate\Http\Response
     */
    public function show(DayType $dayType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DayType  $dayType
     * @return \Illuminate\Http\Response
     */
    public function edit(DayType $dayType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDayTypeRequest  $request
     * @param  \App\Models\DayType  $dayType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDayTypeRequest $request, DayType $dayType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DayType  $dayType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DayType $dayType)
    {
        //
    }
}
