<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsCategories;
use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage News Categories';
        $data['p_description']  = 'Here is the list of News Categories';

        return view('backend.news.categories.index', $data);
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

        return view('backend.news.categories.create', $data);
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

        NewsCategories::create($data);

        return redirect()->route('admin.news-categories.index')->with('flash_success', 'News category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsCategories  $newsCategories
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategories $newsCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsCategories  $newsCategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['news_category']       = NewsCategories::find($id);
        $data['p_heading']      = 'Update category';
        return view('backend.news.categories.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsCategories  $newsCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = NewsCategories::find($id);
        $data = $request->only('name', 'status');
        $category->update($data);
        return redirect()->route('admin.news-categories.index')->with('flash_success', 'News category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsCategories  $newsCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NewsCategories::find($id)->delete();

        return back()->with('flash_danger', 'News category deleted successfully.');
    }
}
