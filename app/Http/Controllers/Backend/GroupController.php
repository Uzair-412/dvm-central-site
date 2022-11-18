<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class GroupController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Customer Groups';
        $data['p_description']  = 'Here is the list of customer groups';

        $data['groups']     = Groups::paginate(10);

        return view('backend.groups.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Customer Group';
        $data['p_description']  = 'Create a new customer group by filling the form below';

        return view('backend.groups.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $group = Groups::create($data);

        return redirect()->route('admin.groups.index')->with('flash_success','Customer group added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Groups $group)
    {
        $data['group']       = $group;
        $data['p_heading']      = 'Update Customer group';
        $data['p_description']  = 'Modify customer group by filling the form below';

        return view('backend.groups.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groups $group)
    {
        $data = $request->all();

        $group->update($data);

        return redirect()->route('admin.groups.index')->with('flash_success','Customer group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $group)
    {
        $group->delete();

        return back()->with('flash_success','Customer group deleted successfully.');
    }
}
