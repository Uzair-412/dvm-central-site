<?php

namespace App\Http\Controllers\Backend\Manage_Jobs;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading'] = 'Manage Jobs Types';
        // $data['p_description']  = 'Here is the list of jobs working time';
        $data['types'] = JobType::all();
        return view('backend.jobs_management.job_type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading'] = 'Create Job Type';
        // $data['p_description']  = 'Create a new working time by filling the field below';
        return view('backend.jobs_management.job_type.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job_type = new JobType();
        $job_type->name = $request->name;
        $job_type->save();
        return redirect()
            ->route('admin.manage-jobs.types.index')
            ->with('flash_success', 'Job type added successfully.');
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
        $job_type = JobType::find($id);

        $data['job_type'] = $job_type;
        $data['p_heading'] = 'Update Job Type';
        // $data['p_description'] = 'Modify job type by filling the form below';

        return view('backend.jobs_management.job_type.edit', $data);
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
        $job_type = JobType::find($id);
        $job_type->name = $request->name;
        $job_type->save();

        return redirect()
            ->route('admin.manage-jobs.types.index')
            ->with('flash_success', 'Job type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobType::find($id)->delete();
        return back()->with('flash_success', 'Job type deleted successfully.');
    }
}
