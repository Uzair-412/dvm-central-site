<?php

namespace App\Http\Controllers\Backend;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FieldSet;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Field';
        $data['p_description']  = 'Here is the list of Field';

        $data['field']     = Field::paginate(10);

        return view('backend.fields.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Field';
        $data['p_description']  = 'Create a new Field by filling the form below';
        $data['field-set']     = FieldSet::get();

        return view('backend.fields.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->only('field_set_id', 'type', 'name', 'placeholder','placeholder_2', 'options', 'required', 'position');

        $field = Field::create($data);

        return redirect()->route('admin.fields.index')->with('flash_success','Field added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        $data['fields']           = $field;
        $data['p_heading']      = 'Update Field';
        $data['p_description']  = 'Modify Field by filling the form below';
        $data['field-set']     = FieldSet::get();

        return view('backend.fields.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        
        $data = $request->only('field_set_id', 'type', 'name', 'placeholder','placeholder_2', 'options', 'required', 'position');

        $field->update($data);

        return redirect()->route('admin.fields.index')->with('flash_success','Field updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {

        $field->delete();
        return back()->with('flash_success','Field deleted successfully.');
    }
}
