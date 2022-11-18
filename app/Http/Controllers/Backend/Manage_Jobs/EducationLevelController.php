<?php

namespace App\Http\Controllers\Backend\Manage_Jobs;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading'] = 'Manage Education Level';
        // $data['p_description']  = 'Here is the list of jobs working time';
        $data['types'] = EducationLevel::all();
        return view('backend.jobs_management.education_level.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading'] = 'Create Education Level';
        // $data['p_description']  = 'Create a new working time by filling the field below';
        return view('backend.jobs_management.education_level.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $education_level = new EducationLevel();
        $education_level->name = $request->name;
        $education_level->save();
        return redirect()
            ->route('admin.manage-jobs.education-level.index')
            ->with('flash_success', 'Education level added successfully.');
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
        $education_level = EducationLevel::find($id);
        $data['education_level'] = $education_level;
        $data['p_heading'] = 'Update Education Level';
        // $data['p_description'] = 'Modify job type by filling the form below';

        return view('backend.jobs_management.education_level.edit', $data);
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
        $education_level = EducationLevel::find($id);
        $education_level->name = $request->name;
        $education_level->save();

        return redirect()
            ->route('admin.manage-jobs.education-level.index')
            ->with('flash_success', 'Education Level updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EducationLevel::find($id)->delete();
        return back()->with(
            'flash_success',
            'Education level deleted successfully.'
        );
    }
}
