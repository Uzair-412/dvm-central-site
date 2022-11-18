<?php

namespace App\Http\Controllers\Backend;

use App\Models\BlogCategory;
use App\Models\Programs\Association;
use App\Models\Show;
use App\Models\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ShowsController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Trade Shows';
        $data['p_description']  = 'Here is the list of trade shows';

        $data['shows']     = Show::paginate(10);

        return view('backend.shows.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Trade Show';
        $data['p_description']  = 'Create a new trade show by filling the form below';
        $data['associations']   = Association::pluck('name', 'id');

        $data['status'] = 'Y';

        return view('backend.shows.create', compact('data'));
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

        if($request->file('image_thumbnail'))
        {
            $path = public_path($this->getStorage());
            $ext = '.'.$request->file('image_thumbnail')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-thumbnail-'.time().$ext;
            $data['image_thumbnail'] = $file_name;
            $request->file('image_thumbnail')->move($path, $file_name);
        }

        if($request->file('image'))
        {
            $path = public_path($this->getStorage());
            $ext = '.'.$request->file('image')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        Show::create($data);

        return redirect()->route('admin.shows.index')->with('flash_success','Trade show added successfully.');
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
    public function edit(Show $show)
    {
        $data['show']           = $show;
        $data['p_heading']      = 'Update Trade Show';
        $data['p_description']  = 'Modify trade shows by filling the form below';
        $data['associations']   = Association::pluck('name', 'id');

        return view('backend.shows.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        $data = $request->all();


        if($request->file('image_thumbnail'))
        {
            $path = public_path($this->getStorage());

            if($show->image_thumbnail != '')
            {
                $file = $path.'/'.$show->image_thumbnail;

                if(file_exists($file) && is_file($file))
                {
                    unlink($file);
                }
            }

            $ext = '.'.$request->file('image_thumbnail')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']).'-thumbnail-'.time().$ext;
            $data['image_thumbnail'] = $file_name;
            $request->file('image_thumbnail')->move($path, $file_name);
        }

        if($request->file('image'))
        {
            $path = public_path($this->getStorage());

            if($show->image != '')
            {
                $file = $path.'/'.$show->image;

                if(file_exists($file) && is_file($file))
                {
                    unlink($file);
                }
            }

            $ext = '.'.$request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        $show->update($data);

        return redirect()->route('admin.shows.index')->with('flash_success','Trade show updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        $image_thumbnail = $show->image_thumbnail;
        $image = $show->image;
        $show->delete();

        $file = public_path($this->getStorage()).'/'.$image_thumbnail;
        if(file_exists($file) && is_file($file))
            unlink($file);

        $file = public_path($this->getStorage()).'/'.$image;
        if(file_exists($file) && is_file($file))
            unlink($file);

        return back()->with('flash_success','Trade show deleted successfully.');
    }

    public function getStorage()
    {
        return env('UPLOADS_DIR').'/up_data/shows';
    }
}
