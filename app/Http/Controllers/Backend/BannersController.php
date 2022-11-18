<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Requests\Backend\PageRequest;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Banners';
        $data['p_description']  = 'Here is the list of banners';

        $data['banners']     = Banner::paginate(10);

        return view('backend.banners.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Banner';
        $data['p_description']  = 'Create a new banner by filling the form below';
        $data['vendors']        = User::where(['active' => '1', 'type' => 'vendor'])->pluck('name as title', 'id');

        $data['status']         = 'Y';

        return view('backend.banners.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('area_id', 'user_id', 'name', 'link', 'banner_text', 'date_start', 'date_end', 'status');

        if($request->file('image'))
        {
            $file_name = substr($request->file('image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['image'] = str_replace('banners/','',Storage::disk('ds3')->putFileAs('banners', $request->file('image'), $file_name));
        }

        $banner = Banner::create($data);

        return redirect()->route('admin.banners.index')->with('flash_success','Banner added successfully.');
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
    public function edit(Banner $banner)
    {
        $data['banner']           = $banner;
        $data['p_heading']      = 'Update Banner';
        $data['p_description']  = 'Modify banner by filling the form below';
        $data['vendors']        = User::where(['active' => '1', 'type' => 'vendor'])->pluck('name as title', 'id');

        return view('backend.banners.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->only('area_id', 'user_id', 'name', 'link', 'banner_text', 'date_start', 'date_end', 'status');;

        if($request->file('image'))
        {

            if($banner->image != '')
            {
                $image = 'banners/'.$banner->image;

                if(Storage::disk('ds3')->exists($image))
                    Storage::disk('ds3')->delete($image);
            }

            $file_name = substr($request->file('image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('image')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['image'] = str_replace('banners/','',Storage::disk('ds3')->putFileAs('banners', $request->file('image'), $file_name));
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('flash_success','Banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $image = 'banners/'.$banner->image;

        if(Storage::disk('ds3')->exists($image))
            Storage::disk('ds3')->delete($image);

        $banner->delete();

        return back()->with('flash_success','Banner deleted successfully.');
    }
}
