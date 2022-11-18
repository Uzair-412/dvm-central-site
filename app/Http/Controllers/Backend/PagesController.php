<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\PageRequest;
use App\Models\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Web Pages';
        $data['p_description']  = 'Here is the list of web pages';

        $data['pages']     = Page::paginate(10);

        return view('backend.pages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Web Page';
        $data['p_description']  = 'Create a new web page by filling the form below';

        return view('backend.pages.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->only('user_id' ,'name', 'slug', 'heading', 'content', 'meta_title', 'meta_keywords', 'meta_description');

        $page = Page::create($data);

        return redirect()->route('admin.pages.index')->with('flash_success','Page added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $data['page']           = $page;
        $data['p_heading']      = 'Update Web Page';
        $data['p_description']  = 'Modify web page by filling the form below';

        return view('backend.pages.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->only('name', 'slug', 'heading', 'content', 'meta_title', 'meta_keywords', 'meta_description');

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('flash_success','Web page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('flash_success','Web page deleted successfully.');
    }

    public function file_manager()
    {
        $data['p_heading']      = 'File Manager';
        $data['p_description']  = 'You can manage files from this section';

        return view('backend.file-manager.index', compact('data'));
    }
}
