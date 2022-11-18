<?php

namespace App\Http\Controllers\Backend;


use App\Models\SurgicalProceduresCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SurgicalProceduresCategoriesController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Categories';
        $data['p_description']  = 'Here is the list of categories';

        $data['categories']     = SurgicalProceduresCategory::paginate(10);

        return view('backend.sp-categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Category';
        $data['status']         = 'Y';

        return view('backend.sp-categories.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'slug', 'description', 'status');

        SurgicalProceduresCategory::create($data);

        return redirect()->route('admin.surgical-procedures-categories.index')->with('flash_success','Category added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = SurgicalProceduresCategory::find($id);

        $data['category']       = $category;
        $data['p_heading']      = 'Update category';

        return view('backend.sp-categories.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = SurgicalProceduresCategory::find($id);

        $data = $request->only('name', 'slug', 'description', 'status');

        $category->update($data);

        return redirect()->route('admin.surgical-procedures-categories.index')->with('flash_success','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SurgicalProceduresCategory::find($id)->delete();

        return back()->with('flash_success','Category deleted successfully.');
    }
}
