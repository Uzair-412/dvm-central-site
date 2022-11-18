<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\BusinessTypeRequest;
use App\Models\BusinessType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slug;
use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BusinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Business Type';
        $data['p_description']  = 'Here is the list of Business Type';

        $data['business-type']     = BusinessType::paginate(10);

        return view('backend.business-type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Business Type';
        $data['p_description']  = 'Create a new Business Type by filling the form below';
        $data['packages'] = Package::get();

        $data['cmd'] = 'create';   

        return view('backend.business-type.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessTypeRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->only('package', 'name', 'slug', 'short_description', 'long_description', 'icon_code', 'icon_image', 'regular_image', 'display_position', 'show_in_main_menu', 'show_in_home_page', 'status');

        $slug = $data['slug'];

        /*$check = (new Slug())->checkIfExists($slug);

        if($check)
        {
            return back()->with('flash_danger','The slug is not unique.');
        }*/

        if($request->file('icon_image'))
        {
            $file_name = substr($request->file('icon_image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('icon_image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name'].'-'.time()).$ext;
            $data['icon_image'] = str_replace('business-type/icon-image/','',Storage::disk('ds3')->putFileAs('business-type/icon-image', $request->file('icon_image'), $file_name));
        }

        if($request->file('regular_image'))
        {
            $file_name = substr($request->file('regular_image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('regular_image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name'].'-'.time()).$ext;
            $data['regular_image'] = str_replace('business-type/regular-image/','',Storage::disk('ds3')->putFileAs('business-type/regular-image', $request->file('regular_image'), $file_name));
        }

        $businessType = BusinessType::create($data);

        $businessType->slugs()->create(['slug' => $slug]);

        return redirect()->route('admin.business-type.index')->with('flash_success','Business Type added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessType $businessType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessType $businessType)
    {
        $data['business-type']           = $businessType;
        $data['p_heading']      = 'Update Business Type';
        $data['p_description']  = 'Modify Business Type by filling the form below';
        $data['packages'] = Package::get();

        $data['cmd'] = 'edit'; 

        return view('backend.business-type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessTypeRequest $request, BusinessType $businessType)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->only('package', 'name', 'short_description', 'long_description', 'icon_code', 'icon_image', 'regular_image', 'display_position', 'show_in_main_menu', 'show_in_home_page', 'status');

        if($request->input('slug') != '')
        {
            $check = (new Slug())->checkIfExists($request->input('slug'), $businessType->id, 'App\Models\BusinessType');

            if($check)
            {
                return back()->with('flash_danger','The slug is not unique.');
            }

            $data['slug'] = $request->input('slug');
        }

        if($request->file('icon_image'))
        {
            $path = 'business-type/icon-image';

            if($businessType->icon_image != '')
            {
                $file = $path.'/'.$businessType->icon_image;

                if(Storage::disk('ds3')->exists($file))
                    Storage::disk('ds3')->delete($file);
            }

            $file_name = substr($request->file('icon_image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('icon_image')->getClientOriginalExtension();

            $file_name = Str::slug($data['name'].'-'.time()).$ext;
            $data['icon_image'] = str_replace($path.'/','',Storage::disk('ds3')->putFileAs($path, $request->file('icon_image'), $file_name));
        }

        if($request->file('regular_image'))
        {
            $path = 'business-type/regular-image';

            if($businessType->regular_image != '')
            {
                $file = $path.'/'.$businessType->regular_image;

                if(Storage::disk('ds3')->exists($file))
                    Storage::disk('ds3')->delete($file);
            }

            $file_name = substr($request->file('regular_image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('regular_image')->getClientOriginalExtension();

            $file_name = Str::slug($data['name'].'-'.time()).$ext;
            $data['regular_image'] = str_replace($path.'/','',Storage::disk('ds3')->putFileAs($path, $request->file('regular_image'), $file_name));
        }

        $businessType->update($data);

        if($request->input('slug') != '')
            $businessType->slugs()->update(['slug' => $request->input('slug')]);

        return redirect()->route('admin.business-type.index')->with('flash_success','Business Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessType $businessType)
    {
        if($businessType->icon_image != '')
        {
            $icon_image = 'business-type/icon-image/'.$businessType->icon_image;
            if(Storage::disk('ds3')->exists($icon_image))
                Storage::disk('ds3')->delete($icon_image);
        }

        if($businessType->regular_image != '')
        {
            $regular_image = 'business-type/regular-image'.$businessType->regular_image;
            if(Storage::disk('ds3')->exists($regular_image))
                Storage::disk('ds3')->delete($regular_image);
        }

        $businessType->delete();
        return back()->with('flash_success','Business Type deleted successfully.');
    }
}
