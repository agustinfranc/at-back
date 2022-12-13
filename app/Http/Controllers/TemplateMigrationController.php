<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateMigrationRequest;
use App\Http\Requests\UpdateTemplateMigrationRequest;
use App\Models\TemplateMigration;

class TemplateMigrationController extends Controller
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
     * @param  \App\Http\Requests\StoreTemplateMigrationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemplateMigrationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemplateMigration  $templateMigration
     * @return \Illuminate\Http\Response
     */
    public function show(TemplateMigration $templateMigration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemplateMigration  $templateMigration
     * @return \Illuminate\Http\Response
     */
    public function edit(TemplateMigration $templateMigration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTemplateMigrationRequest  $request
     * @param  \App\Models\TemplateMigration  $templateMigration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemplateMigrationRequest $request, TemplateMigration $templateMigration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemplateMigration  $templateMigration
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemplateMigration $templateMigration)
    {
        //
    }
}
