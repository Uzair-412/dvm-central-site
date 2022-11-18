<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\Backend\PageRequest;
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Redirect;

class ManageRedirectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['p_heading']      = 'Manage Redirects';
        $data['p_description']  = 'Here is the list of redirects';

        $filter = [];

        if(trim($request->input('request_url')) != null)
            $filter['request_url'] = $request->input('request_url');
        if(trim($request->input('target_url')) != null)
            $filter['target_url'] = $request->input('target_url');
        if(trim($request->input('type')) != null)
            $filter['type'] = $request->input('type');
        if(trim($request->input('mode')) != null)
            $filter['mode'] = $request->input('mode');

        $data['redirects']     = Redirect::getRedirects($filter);
     // $data['redirects']     = Redirect::paginate(10);

        return view('backend.redirects.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Redirects';
        $data['p_description']  = 'Create a new redirects by filling the form below';
        $data['type'] = 'please select type';
        $data['mode'] = 'please select mode';

        return view('backend.redirects.create', compact('data'));
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

        Redirect::create($data);

        return redirect()->route('admin.redirects.index')->with('flash_success','Redirects added successfully.');
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
    public function edit(Redirect $redirect)
    {
        $data['redirect']           = $redirect;
        $data['p_heading']      = 'Update Redirect';
        $data['p_description']  = 'Modify redirect by filling the form below';

        return view('backend.redirects.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Redirect $redirect)
    {
        $data = $request->except('_token', 'id');

        $redirect->update($data);

        return redirect()->route('admin.redirects.index')->with('flash_success','Redirect updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Redirect $redirect)
    {
        $redirect->delete();
        return back()->with('flash_success','Redirect deleted successfully.');
    }
}
