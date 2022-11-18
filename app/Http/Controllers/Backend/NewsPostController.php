<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NewsPostRequest;
use App\Models\NewsCategories;
use App\Models\NewsPost;
use Illuminate\Support\Str;

class NewsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage News';
        $data['p_description']  = 'Here is the list of news';

        return view('backend.news.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Post';
        $data['p_description']  = 'Create a new post by filling the form below';
        $data['categories']     = NewsCategories::where('status', 'Y')->pluck('name', 'id');
        $data['status'] = 'Y';

        return view('backend.news.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsPostRequest $request)
    {
        $validated = $request->validated();

        if (!$validated)
            return back();

        $data = $request->only(
            'name',
            'category_id',
            'slug',
            'heading_content',
            'short_content',
            'full_content',
            'image_thumbnail',
            'image',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'publish_date',
            'status'
        );

        if ($request->file('image_thumbnail')) {
            $path = public_path($this->getStorage());
            $ext = '.' . $request->file('image_thumbnail')->getClientOriginalExtension();

            $file_name = $data['slug'] . '-thumbnail-' . time() . $ext;
            $data['image_thumbnail'] = $file_name;
            $request->file('image_thumbnail')->move($path, $file_name);
        }

        if ($request->file('image')) {
            $path = public_path($this->getStorage());
            $ext = '.' . $request->file('image')->getClientOriginalExtension();

            $file_name = $data['slug'] . '-' . time() . $ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        if ($request->file('top_image_banner')) {
            $path = public_path($this->getStorage());
            $ext = '.' . $request->file('top_image_banner')->getClientOriginalExtension();

            $file_name = $data['slug'] . '-' . time() . $ext;
            $data['top_image_banner'] = $file_name;
            $request->file('top_image_banner')->move($path, $file_name);
        }

        NewsPost::create($data);

        return redirect()->route('admin.news-posts.index')->with('flash_success', 'News added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show(NewsPost $newsPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = NewsPost::find($id);

        $data['post']       = $post;
        $data['p_heading']      = 'Update News';
        $data['p_description']  = 'Modify news by filling the form below';
        $data['categories']     = NewsCategories::where('status', 'Y')->pluck('name', 'id');
        return view('backend.news.posts.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(NewsPostRequest $request, $id)
    {
        $post = NewsPost::find($id);
        $validated = $request->validated();

        if (!$validated)
            return back();

        $data = $request->only(
            'name',
            'category_id',
            'slug',
            'heading_content',
            'short_content',
            'full_content',
            'image_thumbnail',
            'image',
            'meta_title',
            'meta_keywords',
            'meta_description',
            'publish_date',
            'status'
        );


        if ($request->file('image_thumbnail')) {
            $path = public_path($this->getStorage());

            if ($post->image_thumbnail != '') {
                $file = $path . '/' . $post->image_thumbnail;

                if (file_exists($file) && is_file($file)) {
                    unlink($file);
                }
            }

            $ext = '.' . $request->file('image_thumbnail')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']) . '-thumbnail-' . time() . $ext;
            $data['image_thumbnail'] = $file_name;
            $request->file('image_thumbnail')->move($path, $file_name);
        }

        if ($request->file('top_image_banner')) {
            $path = public_path($this->getStorage());

            if ($post->top_image_banner != '') {
                $file = $path . '/' . $post->top_image_banner;

                if (file_exists($file) && is_file($file)) {
                    unlink($file);
                }
            }

            $ext = '.' . $request->file('top_image_banner')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']) . '-banner-' . time() . $ext;
            $data['top_image_banner'] = $file_name;
            $request->file('top_image_banner')->move($path, $file_name);
        }

        if ($request->file('image')) {
            $path = public_path($this->getStorage());

            if ($post->image != '') {
                $file = $path . '/' . $post->image;

                if (file_exists($file) && is_file($file)) {
                    unlink($file);
                }
            }

            $ext = '.' . $request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']) . '-' . time() . $ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        $post->update($data);

        return redirect()->route('admin.news-posts.index')->with('flash_success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = NewsPost::find($id);

        $image_thumbnail = $post->image_thumbnail;
        $image = $post->image;
        $top_image_banner = $post->top_image_banner;
        $post->delete();

        $file = public_path($this->getStorage()) . '/' . $image_thumbnail;
        if (file_exists($file) && is_file($file))
            unlink($file);

        $file = public_path($this->getStorage()) . '/' . $image;
        if (file_exists($file) && is_file($file))
            unlink($file);

        $file = public_path($this->getStorage()) . '/' . $top_image_banner;
        if (file_exists($file) && is_file($file))
            unlink($file);

        return back()->with('flash_danger', 'News deleted successfully.');
    }

    public function getStorage()
    {
        return 'up_data/news';
    }
}
