<?php

namespace App\Http\Controllers;

use App\Models\MtsfPriorities;
use App\Http\Requests\StoreMtsfPrioritiesRequest;
use App\Http\Requests\UpdateMtsfPrioritiesRequest;

class MtsfPrioritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MtsfPriorities::with('spOutcomeIndicator')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMtsfPrioritiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMtsfPrioritiesRequest $request)
    {
        $data = $request->validate([
            'priority_name' => 'required | string',
        ]);
        $existing = MtsfPriorities::where('priority_name', $data['priority_name'])->first();

        if (! $existing) {
            $MtsfPriorities = MtsfPriorities::create([
                'priority_name' => $data['priority_name'],
            ]);

            return $MtsfPriorities;
        }

        return $this->error('', 'Mtsf Priorities description already exists', 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MtsfPriorities  $mtsfpriorit
     * @return \Illuminate\Http\Response
     */
    public function show(MtsfPriorities $priority)
    {

       return $priority->with('spOutcomeIndicator')->find($priority)->first();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMtsfPrioritiesRequest  $request
     * @param  \App\Models\MtsfPriorities  $mtsfPriorities
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMtsfPrioritiesRequest $request, MtsfPriorities $priority)
    {
        if (! $priority) {

            return $this->error('', 'priority doesn\'t exist', 404);
        }

        $priority->priority_name = $request->priority_name ?? $priority->priority_name;

        $priority->update();

        return response(['error' => 0, 'message' => 'priority has been updated successfully', 'data' =>  $priority]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MtsfPriorities  $mtsfPriorities
     * @return \Illuminate\Http\Response
     */
    public function destroy(MtsfPriorities $priority)
    {
     $priority->delete();
     return response(['error' => 0, 'message' => 'priority has been deleted']);
    }
}
