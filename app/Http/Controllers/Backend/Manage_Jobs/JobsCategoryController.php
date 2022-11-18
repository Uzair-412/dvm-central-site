<?php

namespace App\Http\Controllers\Backend\Manage_Jobs;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Categories';
        $data['p_description']  = 'Here is the list of Job Categories';
        $data['categories']     = JobCategory::all();
        return view('backend.jobs_management.job_category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Category';
        $data['p_description']  = 'Create a new Category by filling the field below';

        return view('backend.jobs_management.job_category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $job_category = new JobCategory;
        $job_category->name = $request->name;
        $job_category->save();
        return redirect()->route('admin.manage-jobs.category.index')->with('flash_success', 'Category added successfully.');
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
        $job_category = JobCategory::find($id);

        $data['category'] = $job_category;
        $data['p_heading'] = 'Update Job Category';
        $data['p_description'] = 'Modify job category by filling the form below';

        return view('backend.jobs_management.job_category.edit', $data);
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
        $job_category = JobCategory::find($id);
        $job_category->name = $request->name;
        $job_category->save();

        return redirect()
            ->route('admin.manage-jobs.category.index')
            ->with('flash_success', 'Job category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobCategory::find($id)->delete();
         return back()->with('flash_success','Job category deleted successfully.');
    }
}
