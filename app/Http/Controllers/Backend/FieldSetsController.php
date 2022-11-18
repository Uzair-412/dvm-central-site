<?php

namespace App\Http\Controllers\Backend;

use App\Models\FieldSet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessType;

class FieldSetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Field Set';
        $data['p_description']  = 'Here is the list of Field Set';

        $data['field-set']     = FieldSet::paginate(10);

        return view('backend.field-sets.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Field Set';
        $data['p_description']  = 'Create a new Field Set by filling the form below';
        $data['business-type']     = BusinessType::get();

        return view('backend.field-sets.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->only('business_type', 'title', 'description', 'icon_image','display_position', 'status');

        if($request->file('icon_image'))
        {
            $path = public_path($this->getStorage('icon_image'));
            $file_name = substr($request->file('icon_image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('icon_image')->getClientOriginalExtension();
            $file_name = $data['title'].'-'.time().$ext;
            $data['icon_image'] = $file_name;
            $request->file('icon_image')->move($path, $file_name);
        }

        $fieldSet = FieldSet::create($data);

        return redirect()->route('admin.field-sets.index')->with('flash_success','Field Set added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(FieldSet $fieldSet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldSet $fieldSet)
    {
        $data['field-sets']           = $fieldSet;
        $data['p_heading']      = 'Update Field Set';
        $data['p_description']  = 'Modify Field Set by filling the form below';
        $data['business-type']     = BusinessType::get();

        return view('backend.field-sets.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldSet $fieldSet)
    {
        
        $data = $request->only('business_type', 'title', 'description', 'icon_image','display_position', 'status');

        if($request->file('icon_image'))
        {
            $path = public_path($this->getStorage('icon_image'));

            if($fieldSet->icon_image != '')
            {
                $file = $path.'/'.$fieldSet->icon_image;

                if(file_exists($file) && is_file($file))
                {
                    unlink($file);
                }
            }

            $file_name = substr($request->file('icon_image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('icon_image')->getClientOriginalExtension();

            $file_name = $data['name'].'-'.time().$ext;
            $data['icon_image'] = $file_name;
            $request->file('icon_image')->move($path, $file_name);
        }

        $fieldSet->update($data);

        return redirect()->route('admin.field-sets.index')->with('flash_success','Field Set updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldSet $fieldSet)
    {
        if($fieldSet->icon_image != '')
        {
            $icon_image = $fieldSet->icon_image;
    
            $file = public_path($this->getStorage('icon_image')).'/'.$icon_image;
            if(file_exists($file) && is_file($file))
                unlink($file);
        }


        $fieldSet->delete();
        return back()->with('flash_success','Field Set deleted successfully.');
    }

    public function getStorage($type)
    {
        return env('UPLOADS_DIR').'/up_data/field-sets/'.$type;
    }
}
