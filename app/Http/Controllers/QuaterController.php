<?php

namespace App\Http\Controllers;

use App\Models\Quater;
use App\Http\Requests\StoreQuaterRequest;
use App\Http\Requests\UpdateQuaterRequest;

class QuaterController extends Controller
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
     * @param  \App\Http\Requests\StoreQuaterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuaterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quater  $quater
     * @return \Illuminate\Http\Response
     */
    public function show(Quater $quater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quater  $quater
     * @return \Illuminate\Http\Response
     */
    public function edit(Quater $quater)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuaterRequest  $request
     * @param  \App\Models\Quater  $quater
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuaterRequest $request, Quater $quater)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quater  $quater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quater $quater)
    {
        //
    }
}
