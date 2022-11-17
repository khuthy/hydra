<?php

namespace App\Http\Controllers;

use App\Models\SpOutcomeIndicators;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class SpOutcomeIndicatorsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return  SpOutcomeIndicators::with(['department', 'outcomeoutputindicator', 'outcome', 'priority', 'spscorecard'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'sp_scorecard_id' => 'required',
            'mtsf_priority_id' => 'required',
            'outcome_id' => 'required',
            'outcome_output_indicator_id' => 'required',
            'department_id' => 'required',
            'baseline' => 'required',
            'five_year_target' => 'required',
            'progress' => 'required'
        ]);

            $spscorecard = SpOutcomeIndicators::create([
                'sp_scorecard_id' => $data['sp_scorecard_id'],
                'mtsf_priority_id' => $data['mtsf_priority_id'],
                'outcome_id' => $data['outcome_id'],
                'outcome_output_indicator_id' => $data['outcome_output_indicator_id'],
                'department_id' => $data['department_id'],
                'baseline' => $data['baseline'],
                'five_year_target' => $data['five_year_target'],
                'progress' => $data['progress']
            ]);

            return $spscorecard;
    }


    public function show(SpOutcomeIndicators $spoutcomeindicator)
    {
        return  $spoutcomeindicator->with(['department', 'outcomeoutputindicator', 'outcome', 'priority', 'spscorecard'])->find($spoutcomeindicator)->first();
    }




    public function update(Request $request, SpOutcomeIndicators $spoutcomeindicator)
    {
        if (! $spoutcomeindicator) {

            return $this->error('', 'sp outcome indicator doesn\'t exist', 404);
        }

        $spoutcomeindicator->sp_scorecard_id = $request->sp_scorecard_id ?? $spoutcomeindicator->sp_scorecard_id;
        $spoutcomeindicator->mtsf_priority_id = $request->mtsf_priority_id ?? $spoutcomeindicator->mtsf_priority_id;
        $spoutcomeindicator->outcome_id = $request->outcome_id ?? $spoutcomeindicator->outcome_id;
        $spoutcomeindicator->outcome_output_indicator_id = $request->outcome_output_indicator_id ?? $spoutcomeindicator->outcome_output_indicator_id;
        $spoutcomeindicator->department_id = $request->department_id ?? $spoutcomeindicator->department_id;
        $spoutcomeindicator->baseline = $request->baseline ?? $spoutcomeindicator->baseline;
        $spoutcomeindicator->five_year_target = $request->five_year_target ?? $spoutcomeindicator->five_year_target;
        $spoutcomeindicator->progress = $request->progress ?? $spoutcomeindicator->progress;


        $spoutcomeindicator->update();

        return response(['error' => 0, 'message' => 'spscorecard has been updated successfully', 'data' =>  $spoutcomeindicator]);
    }

    public function destroy(SpOutcomeIndicators $spoutcomeindicator)
    {
        $spoutcomeindicator->delete();

        return response(['error' => 0, 'message' => 'SP-Outcome Indicators has been deleted']);
    }
}
