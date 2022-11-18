<?php

namespace App\Http\Controllers\Backend\Manage_Jobs;

use App\Http\Controllers\Controller;
use App\Models\SalaryType;
use Illuminate\Http\Request;

class SalaryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading'] = 'Manage Salary Type';
        // $data['p_description']  = 'Here is the list of jobs working time';
        $data['salary_type'] = SalaryType::all();
        return view('backend.jobs_management.salary_type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading'] = 'Create Salary Type';
        // $data['p_description']  = 'Create a new working time by filling the field below';
        return view('backend.jobs_management.salary_type.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salary_type = new SalaryType();
        $salary_type->name = $request->name;
        $salary_type->save();
        return redirect()
            ->route('admin.manage-jobs.salary-type.index')
            ->with('flash_success', 'Salary type added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salary_type = SalaryType::find($id);

        $data['salary_type'] = $salary_type;
        $data['p_heading'] = 'Update Salary Type';
        // $data['p_description'] = 'Modify job type by filling the form below';

        return view('backend.jobs_management.salary_type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $salary_type = SalaryType::find($id);
        $salary_type->name = $request->name;
        $salary_type->save();

        return redirect()
            ->route('admin.manage-jobs.salary-type.index')
            ->with('flash_success', 'Salary type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SalaryType::find($id)->delete();
        return back()->with(
            'flash_success',
            'Salary type deleted successfully.'
        );
    }
}
