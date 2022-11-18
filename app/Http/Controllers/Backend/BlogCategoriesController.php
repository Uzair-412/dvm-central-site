<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogCategoriesController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Categories';
        $data['p_description']  = 'Here is the list of categories';

        $data['categories']     = BlogCategory::paginate(10);

        return view('backend.blog-categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Category';
        $data['status']         = 'Y';

        return view('backend.blog-categories.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'status');

        BlogCategory::create($data);

        return redirect()->route('admin.blog-categories.index')->with('flash_success','Blog category added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BlogCategory::find($id);

        $data['category']       = $category;
        $data['p_heading']      = 'Update category';

        return view('backend.blog-categories.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = BlogCategory::find($id);

        $data = $request->only('name', 'status');

        $category->update($data);

        return redirect()->route('admin.blog-categories.index')->with('flash_success','Blog category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::find($id)->delete();

        return back()->with('flash_success','Blog category deleted successfully.');
    }
}
