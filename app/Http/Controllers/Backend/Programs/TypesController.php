<?php

namespace App\Http\Controllers\Backend\Programs;

use App\Http\Controllers\Controller;
use App\Models\Programs\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Program Types';
        $data['p_description']  = 'Here is the list of program types';
        return view('backend.programs.types.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Program Type';
        $data['p_description']  = '';
        $data['status'] = 'Y';
        return view('backend.programs.types.create', compact('data'));
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
            'name' => 'required|unique:programs_types',
        ]);
        if(!$validated)
        {
            return redirect()->back();
        }
        $data = $request->only('name', 'status');
        $data['slug'] =Str::slug($request->name);
        Types::create($data);
        return redirect()->route('admin.programs.types.index')->with('flash_success', 'Program Type added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programs\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function show(Types $types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programs\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['p_heading']      = 'Update Program Types';
        $data['p_description']  = '';
        $data['type'] = Types::find($id);
        return view('backend.programs.types.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programs\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('programs_types')->ignore($id)],
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->only('name', 'status');
        $data['slug'] = Str::slug($request->name);
        Types::find($id)->update($data);
        return redirect()->route('admin.programs.types.index')->with('flash_success', 'Program Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programs\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Types::find($id);
        $type->delete();
        return redirect()->route('admin.programs.types.index')->with('flash_danger', 'Program Type removed successfully.');
    }
}
