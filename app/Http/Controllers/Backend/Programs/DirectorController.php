<?php

namespace App\Http\Controllers\Backend\Programs;

use App\Http\Controllers\Controller;
use App\Models\Programs\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Program Directors';
        $data['p_description']  = 'Here is the list of program directors';
        return view('backend.programs.directors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Program Director';
        $data['p_description']  = '';
        return view('backend.programs.directors.create', compact('data'));
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
            'name' => 'required|unique:programs_directors',
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->only('name', 'status');
        $data['slug'] = Str::slug($request->name);
        Director::create($data);
        return redirect()->route('admin.programs.directors.index')->with('flash_success', 'Program director added successfully.');
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
        $data['director'] = Director::find($id);
        $data['p_heading']      = 'Update Program Director';
        $data['p_description']  = '';
        return view('backend.programs.directors.create', compact('data'));
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
            'name' => ['required', Rule::unique('programs_directors')->ignore($id)],
        ]);
        if (!$validated) {
            return redirect()->back();
        }
        $data = $request->only('name', 'status');
        $data['slug'] = Str::slug($request->name);
        Director::find($id)->update($data);
        return redirect()->route('admin.programs.directors.index')->with('flash_success', 'Program director updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Director = Director::find($id);
        $Director->delete();
        return redirect()->route('admin.programs.directors.index')->with('flash_danger', 'Program director removed successfully.');
    }
}
