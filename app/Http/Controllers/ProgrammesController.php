<?php

namespace App\Http\Controllers;

use App\Models\Programmes;
use App\Models\Perspectives;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
class ProgrammesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Programmes::with(['perspective', 'corporateScorecardIndicator'])->get();
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'programme_name' => 'required | string',
            'institutional_outcome' => 'required | string',
            'perspective_id' => 'required'
        ]);



        $existing = Programmes::where('programme_name', $data['programme_name'])->first();

        if (! $existing) {
            $programme = Programmes::create([
                'programme_name' => $data['programme_name'],
                'institutional_outcome' => $data['institutional_outcome'],
                'perspective_id' => $data['perspective_id'],
            ]);

            return $programme;
        }

        return $this->error('', 'programme name already exists', 409);
    }


    public function show(Programmes $programme)
    {
        return $programme->with(['perspective', 'corporateScorecardIndicator'])->find($programme)->first();
    }




    public function update(Request $request, Programmes $programme)
    {
        if (! $programme) {

            return $this->error('', 'programme  doesn\'t exist', 404);
        }

        $programme->programme_name = $request->programme_name ?? $programme->programme_name;

        $programme->update();

        return response(['error' => 0, 'message' => 'programme has been updated successfully', 'data' =>  $programme]);
    }


    public function destroy(Programmes $programme)
    {
        $programme->delete();

        return response(['error' => 0, 'message' => 'programme has been deleted']);
    }
}
