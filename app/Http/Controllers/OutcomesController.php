<?php

namespace App\Http\Controllers;

use App\Models\Outcomes;
use App\Http\Requests\StoreOutcomesRequest;
use App\Http\Requests\UpdateOutcomesRequest;

class OutcomesController extends Controller
{
    use HttpResponses;
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
     * @param  \App\Http\Requests\StoreOutcomesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutcomesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outcomes  $outcomes
     * @return \Illuminate\Http\Response
     */
    public function show(Outcomes $outcomes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outcomes  $outcomes
     * @return \Illuminate\Http\Response
     */
    public function edit(Outcomes $outcomes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutcomesRequest  $request
     * @param  \App\Models\Outcomes  $outcomes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutcomesRequest $request, Outcomes $outcomes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outcomes  $outcomes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outcomes $outcomes)
    {
        //
    }
}
