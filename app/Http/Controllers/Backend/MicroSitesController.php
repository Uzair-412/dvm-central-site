<?php

namespace App\Http\Controllers\Backend;

use App\Models\MicroSites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MicroSitesController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Micro Sites';
        $data['p_description']  = 'Here is the list of Micro Sites';

        $data['result']     = MicroSites::paginate(10);

        return view('backend.micro-sites.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Micro Site';

        return view('backend.micro-sites.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'domain');

        MicroSites::create($data);

        return redirect()->route('admin.micro-sites.index')->with('flash_success','Micro site added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = MicroSites::find($id);

        $data['site']           = $site;
        $data['p_heading']      = 'Update Micro Site';

        return view('backend.micro-sites.edit', compact('data'));
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
        $site = MicroSites::find($id);

        $data = $request->only('name', 'status');

        $site->update($data);

        return redirect()->route('admin.micro-sites.index')->with('flash_success','Micro site updated successfully.');
    }

    public function products(MicroSites $site)
    {
        $data['p_heading']      = 'Manage Micro Site Products ('. $site->name .')';
        $data['p_description']  = 'Here is the list of Micro Site\'s products';

        $data['result']         = MicroSites::getProducts($site->id);
        $data['site']           = $site;

        return view('backend.micro-sites.products', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::find($id)->delete();

        return back()->with('flash_success','Blog category deleted successfully.');
    }
}
