<?php

namespace App\Http\Controllers\Backend\Manage_Jobs;

use App\Http\Controllers\Controller;
use App\Models\JobWorkingTime;
use Illuminate\Http\Request;

class JobsWorkingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Jobs Working Time';
        // $data['p_description']  = 'Here is the list of jobs working time';
        $data['working_time']     = JobWorkingTime::all();
        return view('backend.jobs_management.job_working_time.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Job Working Time';
        // $data['p_description']  = 'Create a new working time by filling the field below';
        return view('backend.jobs_management.job_working_time.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $working_time = new JobWorkingTime;
        $working_time->name = $request->name;
        $working_time->save();
        return redirect()
               ->route('admin.manage-jobs.working-time.index')
               ->with('flash_success', 'Working time added successfully.');
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
        $working_time = JobWorkingTime::find($id);

        $data['working_time'] = $working_time;
        $data['p_heading'] = 'Update Job Working Time';
        // $data['p_description'] = 'Modify job working time by filling the form below';

        return view('backend.jobs_management.job_working_time.edit', $data);
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
        $working_time = JobWorkingTime::find($id);
        $working_time->name = $request->name;
        $working_time->save();

        return redirect()
            ->route('admin.manage-jobs.working-time.index')
            ->with('flash_success', 'Job working time updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobWorkingTime::find($id)->delete();
         return back()->with('flash_success','Job working time deleted successfully.');
    }
}
