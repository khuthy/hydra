<?php

namespace App\Http\Controllers;

use App\Models\CorporateScorecards;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class CorporateScorecardsController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return CorporateScorecards::with('spscorecard')->get();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'corporate_scorecard_type' =>'required',
            'app_aop_year' =>'required',
            'sp_scorecard_id' =>'required',
        ]);
        $existing = CorporateScorecards::where('app_aop_year', $data['app_aop_year'])->first();

        if (! $existing) {
            $CorporateScorecards = CorporateScorecards::create([
                'corporate_scorecard_type' => $data['corporate_scorecard_type'],
                'app_aop_year' => $data['app_aop_year'],
                'sp_scorecard_id' => $data['sp_scorecard_id'],
            ]);

            return $CorporateScorecards;
        }

        return $this->error('', 'Corporate Scorecards already exists', 409);
    }


    public function show(CorporateScorecards $corporatescorecard)
    {
        return $corporatescorecard->with('spscorecard')->find($corporatescorecard)->first();
    }


    public function update(Request $request, CorporateScorecards $corporatescorecard)
    {
        if (! $corporatescorecard) {

            return $this->error('', 'departments doesn\'t exist', 404);
        }



        $corporatescorecard->corporate_scorecard_type = $request->corporate_scorecard_type ?? $corporatescorecard->corporate_scorecard_type;

        $corporatescorecard->app_aop_year = $request->app_aop_year ?? $corporatescorecard->app_aop_year;

        $corporatescorecard->sp_scorecard_id = $request->sp_scorecard_id ?? $corporatescorecard->sp_scorecard_id;

        $corporatescorecard->update();

        return response(['error' => 0, 'message' => 'corporate scorecard has been updated successfully', 'data' =>  $corporatescorecard]);
    }


    public function destroy(CorporateScorecards $corporatescorecard)
    {
        $corporatescorecard->delete();

        return response(['error' => 0, 'message' => 'corporate scorecard has been deleted']);
    }
}
