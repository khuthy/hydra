<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class DepartmentsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return  Departments::with('spOutcomeIndicators')->get();
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
            'department_name' => 'required | string',
        ]);
        $existing = Departments::where('department_name', $data['department_name'])->first();

        if (! $existing) {
            $department = Departments::create([
                'department_name' => $data['department_name'],
            ]);

            return $department;
        }

        return $this->error('', 'Department already exists', 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function show(Departments $department)
    {

        return $department->with('spOutcomeIndicators')->find($department)->first();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $department)
    {
        if (! $department) {

            return $this->error('', 'departments doesn\'t exist', 404);
        }

        $department->department_name = $request->department_name ?? $department->department_name;

        $department->update();

        return response(['error' => 0, 'message' => 'department has been updated successfully', 'data' =>  $department]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $department)
    {
        $department->delete();

        return response(['error' => 0, 'message' => 'Department has been deleted']);
    }
}
