<?php

namespace App\Http\Controllers\Backend;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Package';
        $data['p_description']  = 'Here is the list of Package';

        $data['packages']     = Package::paginate(10);

        return view('backend.packages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Package';
        $data['p_description']  = 'Create a new Package by filling the form below';

        return view('backend.packages.create', compact('data'));
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

        $package = Package::create($data);

        return redirect()->route('admin.packages.index')->with('flash_success','Package added successfully.');
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
    public function edit(Package $package)
    {
        $data['package']       = $package;
        $data['p_heading']      = 'Update Package';
        $data['p_description']  = 'Modify Package by filling the form below';

        return view('backend.packages.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $data = $request->all();

        $package->update($data);

        return redirect()->route('admin.packages.index')->with('flash_success','Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return back()->with('flash_success','Package deleted successfully.');
    }
}
