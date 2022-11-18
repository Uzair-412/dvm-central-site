<?php

namespace App\Http\Controllers\Backend\Programs;

use App\Http\Controllers\Controller;
use App\Models\Programs\AccreditationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AccreditationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Program Accreditation Statuses';
        $data['p_description']  = 'Here is the list of program accreditation statuses';
        return view('backend.programs.accreditations.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Program Accreditation Status';
        $data['p_description']  = '';
        $data['status'] = 'Y';
        return view('backend.programs.accreditations.create', compact('data'));
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
            'name' => 'required|unique:programs_accreditation_statuses',
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->only('name', 'status');
        $data['slug'] = Str::slug($request->name);
        AccreditationStatus::create($data);
        return redirect()->route('admin.programs.accreditation-status.index')->with('flash_success', 'Program accreditation status added successfully.');
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
        $data['accreditation'] = AccreditationStatus::find($id);
        $data['p_heading']      = 'Update Program Accreditation Status';
        $data['p_description']  = '';
        return view('backend.programs.accreditations.create', compact('data'));
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
            'name' => ['required', Rule::unique('programs_accreditation_statuses')->ignore($id)],
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->only('name', 'status');
        $data['slug'] = Str::slug($request->name);
        AccreditationStatus::find($id)->update($data);
        return redirect()->route('admin.programs.accreditation-status.index')->with('flash_success', 'Program accreditation status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $AccreditationStatus = AccreditationStatus::find($id);
        $AccreditationStatus->delete();
        return redirect()->route('admin.programs.accreditation-status.index')->with('flash_danger', 'Program accreditation status removed successfully.');
    }
}
