<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Programs\AccreditationStatus;
use App\Models\Programs\Director;
use App\Models\Programs\Institute;
use App\Models\Programs\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Program';
        $data['p_description']  = 'Here is the list of programs';
        return view('backend.programs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Program';
        $data['p_description']  = '';
        $data['types'] = Types::where('status', 'Y')->pluck('name', 'id');
        $data['institutes'] = Institute::where('status', 'Y')->pluck('name','id');
        $data['directors'] = Director::where('status', 'Y')->pluck('name', 'id');
        $data['accreditation_statuses'] = AccreditationStatus::pluck('name', 'id');
        $data['status'] = 'Y';
        return view('backend.programs.create', compact('data'));
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
            'type_id' => 'required',
            'institute_id' => 'required',
            'director_id' => 'required',
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->all();
        $type = Types::find($request->type_id);
        $institute = Institute::find($request->institute_id);
        $director = Director::find($request->director_id);
        $data['slug'] = Str::slug($type->name.' '. $institute->name . ' ' . $director->name);
        Program::create($data);
        return redirect()->route('admin.programs.program.index')->with('flash_success', 'Program added successfully.');
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
        $data['p_heading']      = 'Update Program';
        $data['p_description']  = '';
        $data['types'] = Types::where('status', 'Y')->pluck('name', 'id');
        $data['institutes'] = Institute::where('status', 'Y')->pluck('name', 'id');
        $data['directors'] = Director::where('status', 'Y')->pluck('name', 'id');
        $data['accreditation_statuses'] = AccreditationStatus::pluck('name', 'id');
        $data['program'] = Program::find($id);
        return view('backend.programs.create', compact('data'));
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
            'type_id' => 'required',
            'institute_id' => 'required',
            'director_id' => 'required',
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->all();
        $type = Types::find($request->type_id);
        $institute = Institute::find($request->institute_id);
        $director = Director::find($request->director_id);
        $data['slug'] = Str::slug($type->name . ' ' . $institute->name . ' ' . $director->name);
        Program::find($id)->update($data);
        return redirect()->route('admin.programs.program.index')->with('flash_success', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Program = Program::find($id);
        $Program->delete();
        return redirect()->route('admin.programs.program.index')->with('flash_danger', 'Program removed successfully.');
    }
}
