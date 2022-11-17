<?php

namespace App\Http\Controllers;

use App\Models\CorporateScorecards;
use App\Http\Requests\StoreCorporateScorecardsRequest;
use App\Http\Requests\UpdateCorporateScorecardsRequest;

class CorporateScorecardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CorporateScorecards::with('spscorecard')->get();
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
     * @param  \App\Http\Requests\StoreCorporateScorecardsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCorporateScorecardsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CorporateScorecards  $corporateScorecards
     * @return \Illuminate\Http\Response
     */
    public function show(CorporateScorecards $corporateScorecards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CorporateScorecards  $corporateScorecards
     * @return \Illuminate\Http\Response
     */
    public function edit(CorporateScorecards $corporateScorecards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCorporateScorecardsRequest  $request
     * @param  \App\Models\CorporateScorecards  $corporateScorecards
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCorporateScorecardsRequest $request, CorporateScorecards $corporateScorecards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CorporateScorecards  $corporateScorecards
     * @return \Illuminate\Http\Response
     */
    public function destroy(CorporateScorecards $corporateScorecards)
    {
        //
    }
}
