<?php

namespace App\Http\Controllers;

use App\Http\Requests\Weekdays\StoreWeekdaysRequest;
use App\Http\Requests\Weekdays\UpdateWeekdaysRequest;
use App\Models\Weekdays;

class WeekdaysController extends Controller
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
     * @param  \App\Http\Requests\StoreWeekdaysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeekdaysRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weekdays  $weekdays
     * @return \Illuminate\Http\Response
     */
    public function show(Weekdays $weekdays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weekdays  $weekdays
     * @return \Illuminate\Http\Response
     */
    public function edit(Weekdays $weekdays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWeekdaysRequest  $request
     * @param  \App\Models\Weekdays  $weekdays
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWeekdaysRequest $request, Weekdays $weekdays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weekdays  $weekdays
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weekdays $weekdays)
    {
        //
    }
}
