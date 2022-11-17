<?php

namespace App\Http\Controllers;

use App\Models\Perspectives;
use App\Models\Programmes;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;


class PerspectivesController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Perspectives::with('programme')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'perspective_name' => 'required | string',
        ]);
        $existing = Perspectives::where('perspective_name', $data['perspective_name'])->first();

        if (! $existing) {
            $role = Perspectives::create([
                'perspective_name' => $data['perspective_name'],
            ]);

            return $role;
        }

        return $this->error('', 'perspective description already exists', 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perspectives  $perspectives
     * @return \Illuminate\Http\Response
     */
    public function show(Perspectives $perspective) {
        return $perspective->with('programme')->find($perspective)->first();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Perspectives  $perspectives
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perspectives $perspective)
    {
        if (! $perspective) {

            return $this->error('', 'perspective doesn\'t exist', 404);
        }

        $perspective->perspective_name = $request->perspective_name ?? $perspective->perspective_name;

        $perspective->update();

        return response(['error' => 0, 'message' => 'perspective has been updated successfully', 'data' =>  $perspective]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perspectives  $perspectives
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perspectives $perspective)
    {

        $perspective->delete();

        return response(['error' => 0, 'message' => 'Perspective has been deleted']);
    }
}
