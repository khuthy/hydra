<?php

namespace App\Http\Controllers;

use App\Models\Indicators;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class IndicatorsController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return Indicators::with('corporateScorecardIndicator')->get();
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
        $existing = Indicators::where('indicator_title', $data['indicator_title'])->first();

        if (! $existing) {
            $indicator = Indicators::create([
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

            return $indicator;
        }

        return $this->error('', 'Outcome/Output Indicators description already exists', 409);
    }


    public function show(Indicators $indicator)
    {
        return  $indicator;
    }





    public function update(Request $request, Indicators $indicator)
    {
        if (! $indicator) {

            return $this->error('', 'Outcome/Output Indicators doesn\'t exist', 404);
        }

        $indicator->indicator_type = $request->indicator_type ?? $indicator->indicator_type;
        $indicator->indicator_title = $request->indicator_title ?? $indicator->indicator_title;
        $indicator->indicator_definition = $request->indicator_definition ?? $indicator->indicator_definition;
        $indicator->source_of_data = $request->source_of_data ?? $indicator->source_of_data;
        $indicator->method_of_calculation = $request->method_of_calculation ?? $indicator->method_of_calculation;
        $indicator->assumptions = $request->assumptions ?? $indicator->assumptions;
        $indicator->means_of_verification = $request->means_of_verification ?? $indicator->means_of_verification;
        $indicator->calculation_type = $request->calculation_type ?? $indicator->calculation_type;
        $indicator->reporting_cycle = $request->reporting_cycle ?? $indicator->reporting_cycle;
        $indicator->disagregation_of_benefitiaries = $request->disagregation_of_benefitiaries ?? $indicator->disagregation_of_benefitiaries;
        $indicator->spatial_transformation = $request->spatial_transformation ?? $indicator->spatial_transformation;
        $indicator->desired_performance = $request->desired_performance ?? $indicator->desired_performance;
        $indicator->indicator_responsibility = $request->indicator_responsibility ?? $indicator->indicator_responsibility;

        $indicator->update();

        return response(['error' => 0, 'message' => 'Outcome Output Indicators has been updated successfully', 'data' =>  $indicator]);
    }

    public function destroy(Indicators $indicator)
    {
        $indicator->delete();
        return response(['error' => 0, 'message' => 'indicator has been deleted']);
    }
}
