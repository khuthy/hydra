<?php

namespace App\Http\Controllers;

use App\Models\SpScorecards;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class SpScorecardsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     /*    return SpScorecards::all(); */
        return SpScorecards::with(['spoutcomeindicator','corporatescorecard' ])->get();
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'strategic_year' => 'required | string',
        ]);


        $existing = SpScorecards::where('strategic_year', $data['strategic_year'])->first();

        if (! $existing) {
            $spscorecard = SpScorecards::create([
                'strategic_year' => $data['strategic_year'],
            ]);

            return $spscorecard;
        }

        return $this->error('', 'Sp-Scorecards already exists', 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpScorecards  $SpScorecard
     * @return \App\Models\SpScorecards $SpScorecard
     */
    public function show(SpScorecards $spscorecard) {
        return  $spscorecard->with(['spoutcomeindicator','corporatescorecard' ])->find($spscorecard)->first();
    }

    /**
     * Update the specified resource in storage.
     *
   * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpScorecards  $spScorecards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpScorecards $spscorecard)
    {
        if (! $spscorecard) {

            return $this->error('', 'sp-scorecard doesn\'t exist', 404);
        }

        $spscorecard->strategic_year = $request->strategic_year ?? $spscorecard->strategic_year;


        $spscorecard->update();

        return response(['error' => 0, 'message' => 'spscorecard has been updated successfully', 'data' =>  $spscorecard]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpScorecards  $spScorecards
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpScorecards $spscorecard)
    {
        $spscorecard->delete();

        return response(['error' => 0, 'message' => 'Sp-Scorecards has been deleted']);
    }
}
