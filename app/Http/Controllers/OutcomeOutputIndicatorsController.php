<?php

namespace App\Http\Controllers;

use App\Models\OutcomeOutputIndicators;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class OutcomeOutputIndicatorsController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return OutcomeOutputIndicators::with('corporateScorecardIndicator')->get();
    }




    public function store(Request $request)
    {
        $data = $request->validate([
            'indicator_type' => 'required',
            'indicator_title' => 'required',
            'indicator_definition' => 'required',
            'means_of_verification' => '',
            'calculation_type' => '',
            'reporting_cycle' => '',
            'source_of_data' => 'required',
            'method_of_calculation' => 'required',
            'assumptions' => 'required',
            'disagregation_of_benefitiaries' => 'required',
            'spatial_transformation' => 'required',
            'desired_performance' => 'required',
            'indicator_responsibility' => 'required',
        ]);
        $existing = OutcomeOutputIndicators::where('indicator_title', $data['indicator_title'])->first();

        if (! $existing) {
            $OutcomeOutputIndicators = OutcomeOutputIndicators::create([
                'indicator_type' => $data['indicator_type'],
                'indicator_title' => $data['indicator_title'],
                'indicator_definition' => $data['indicator_definition'],
                'source_of_data' => $data['source_of_data'],
                'method_of_calculation' => $data['method_of_calculation'],
                'assumptions' => $data['assumptions'],
                'means_of_verification' => $data['means_of_verification'],
                'calculation_type' => $data['calculation_type'],
                'reporting_cycle' => $data['reporting_cycle'],
                'disagregation_of_benefitiaries' => $data['disagregation_of_benefitiaries'],
                'spatial_transformation' => $data['spatial_transformation'],
                'desired_performance' => $data['desired_performance'],
                'indicator_responsibility' => $data['indicator_responsibility'],
            ]);

            return $OutcomeOutputIndicators;
        }

        return $this->error('', 'Outcome/Output Indicators description already exists', 409);
    }


    public function show(OutcomeOutputIndicators $OutcomeOutputIndicator)
    {
        return  $OutcomeOutputIndicator->with('corporateScorecardIndicator')->first();
    }





    public function update(Request $request, OutcomeOutputIndicators $OutcomeOutputIndicators)
    {
        if (! $OutcomeOutputIndicators) {

            return $this->error('', 'Outcome/Output Indicators doesn\'t exist', 404);
        }

        $OutcomeOutputIndicators->indicator_type = $request->indicator_type ?? $OutcomeOutputIndicators->indicator_type;
        $OutcomeOutputIndicators->indicator_title = $request->indicator_title ?? $OutcomeOutputIndicators->indicator_title;
        $OutcomeOutputIndicators->indicator_definition = $request->indicator_definition ?? $OutcomeOutputIndicators->indicator_definition;
        $OutcomeOutputIndicators->source_of_data = $request->source_of_data ?? $OutcomeOutputIndicators->source_of_data;
        $OutcomeOutputIndicators->method_of_calculation = $request->method_of_calculation ?? $OutcomeOutputIndicators->method_of_calculation;
        $OutcomeOutputIndicators->assumptions = $request->assumptions ?? $OutcomeOutputIndicators->assumptions;
        $OutcomeOutputIndicators->means_of_verification = $request->means_of_verification ?? $OutcomeOutputIndicators->means_of_verification;
        $OutcomeOutputIndicators->calculation_type = $request->calculation_type ?? $OutcomeOutputIndicators->calculation_type;
        $OutcomeOutputIndicators->reporting_cycle = $request->reporting_cycle ?? $OutcomeOutputIndicators->reporting_cycle;
        $OutcomeOutputIndicators->disagregation_of_benefitiaries = $request->disagregation_of_benefitiaries ?? $OutcomeOutputIndicators->disagregation_of_benefitiaries;
        $OutcomeOutputIndicators->spatial_transformation = $request->spatial_transformation ?? $OutcomeOutputIndicators->spatial_transformation;
        $OutcomeOutputIndicators->desired_performance = $request->desired_performance ?? $OutcomeOutputIndicators->desired_performance;
        $OutcomeOutputIndicators->indicator_responsibility = $request->indicator_responsibility ?? $OutcomeOutputIndicators->indicator_responsibility;

        $OutcomeOutputIndicators->update();

        return response(['error' => 0, 'message' => 'Outcome Output Indicators has been updated successfully', 'data' =>  $OutcomeOutputIndicators]);
    }

    public function destroy(Request $OutcomeOutputIndicators)
    {
        //
    }
}
