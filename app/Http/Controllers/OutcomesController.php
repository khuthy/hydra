<?php

namespace App\Http\Controllers;

use App\Models\Outcomes;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
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
       return Outcomes::with('spOutcomeIndicators')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'outcome_name' => 'required | string',
        ]);
        $existing = Outcomes::where('outcome_name', $data['outcome_name'])->first();

        if (! $existing) {
            $Outcomes = Outcomes::create([
                'outcome_name' => $data['outcome_name'],
            ]);

            return $Outcomes;
        }

        return $this->error('', 'perspective description already exists', 409);
    }

    public function show(Outcomes $outcome)
    {
        return $outcome->with('spOutcomeIndicators')->find($outcome)->first();
    }


    public function update(Request $request, Outcomes $outcome)
    {
        if (! $outcome) {

            return $this->error('', 'outcome name doesn\'t exist', 404);
        }

        $outcome->outcome_name = $request->outcome_name ?? $outcome->outcome_name;

        $outcome->update();

        return response(['error' => 0, 'message' => 'outcome name has been updated successfully', 'data' =>  $outcome]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outcomes  $outcomes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outcomes $outcome)
    {
        $outcome->delete();

        return response(['error' => 0, 'message' => 'outcome has been deleted']);
    }
}
