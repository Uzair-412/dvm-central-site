<?php

namespace App\Http\Controllers\Backend\Programs;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Programs\Institute;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Program Institutes';
        $data['p_description']  = 'Here is the list of program institutes';
        return view('backend.programs.institutes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Program Institute';
        $data['p_description']  = '';
        $data['country'] = Country::orderBy('name','ASC')->pluck('name','id');
        return view('backend.programs.institutes.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:programs_institutes',
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Institute::create($data);
        return redirect()->route('admin.programs.institutes.index')->with('flash_success', 'Program Institute added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $states = State::where('country_id', $id)->orderBy('name','ASC')->pluck('name', 'id');
        $show = '<option>Please Select State...</option>';
        foreach($states as $key=>$state)
        {
            $show .='<option value="'.$key. '">' . $state . '</option>';
        }
        echo $show;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['p_heading']      = 'Update Program Institute';
        $data['p_description']  = '';
        $data['institute'] = Institute::find($id);
        $data['country'] = Country::pluck('name', 'id');
        $data['states'] = State::where('country_id', $data['institute']->country->id)->pluck('name', 'id');
        return view('backend.programs.institutes.create', compact('data'));
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
        $validated = $request->validate([
            'name' => ['required', Rule::unique('programs_institutes')->ignore($id)],
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Institute::find($id)->update($data);
        return redirect()->route('admin.programs.institutes.index')->with('flash_success', 'Program Institute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Institute = Institute::find($id);
        $Institute->delete();
        return redirect()->route('admin.programs.institutes.index')->with('flash_danger', 'Program Institute removed successfully.');
    }
}
