<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\VideosRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Videos';
        $data['p_description']  = 'Here is the list of videos';

        $data['videos']     = Video::paginate(10);

        return view('backend.videos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Video';
        $data['p_description']  = 'Create a new video by filling the form below';

        return view('backend.videos.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideosRequest $request)
    {
        $data = $request->only('title', 'source', 'video_id', 'position', 'status');

        if(!$data)
            return back();

        $video = Video::create($data);

        return redirect()->route('admin.videos.index')->with('flash_success','Video added successfully.');
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
    public function edit(Video $video)
    {
        $data['video']           = $video;
        $data['p_heading']      = 'Update Video';
        $data['p_description']  = 'Modify video by filling the form below';

        return view('backend.videos.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(VideosRequest $request, Video $video)
    {
        $data = $request->only('title', 'source', 'video_id', 'position', 'status');

        if(!$data)
            return back();

        $video->update($data);

        return redirect()->route('admin.videos.index')->with('flash_success','Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return back()->with('flash_success','Video deleted successfully.');
    }
}
