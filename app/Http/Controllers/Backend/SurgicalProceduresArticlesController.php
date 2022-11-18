<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\SurgicalProceduresArticleRequest;
use App\Models\Slug;
use App\Models\SurgicalProceduresArticle;
use App\Models\SurgicalProceduresCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SurgicalProceduresArticlesController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Articles';
        $data['p_description']  = 'Here is the list of articles';

        $data['posts']     = SurgicalProceduresArticle::paginate(10);

        return view('backend.sp-posts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Article';
        $data['p_description']  = 'Create a new article by filling the form below';
        $data['categories']     = SurgicalProceduresCategory::pluck('name', 'id');

        $data['status'] = 'Y';

        return view('backend.sp-posts.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurgicalProceduresArticleRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->only('name', 'category_id', 'slug', 'heading_content', 'short_content',
            'full_content', 'image_thumbnail', 'image', 'meta_title', 'meta_keywords',
            'meta_description', 'publish_date', 'status');

        if($request->file('image_thumbnail'))
        {
            $path = public_path($this->getStorage());
            $ext = '.'.$request->file('image_thumbnail')->getClientOriginalExtension();

            $file_name = $data['name'].'-thumbnail-'.time().$ext;
            $data['image_thumbnail'] = $file_name;
            $request->file('image_thumbnail')->move($path, $file_name);
        }

        if($request->file('image'))
        {
            $path = public_path($this->getStorage());
            $ext = '.'.$request->file('image')->getClientOriginalExtension();

            $file_name = $data['name'].'-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        SurgicalProceduresArticle::create($data);

        return redirect()->route('admin.surgical-procedures-articles.index')->with('flash_success','Article added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = SurgicalProceduresArticle::find($id);

        $data['post']       = $post;
        $data['p_heading']      = 'Update Article';
        $data['p_description']  = 'Modify article by filling the form below';
        $data['categories']     = SurgicalProceduresCategory::pluck('name', 'id');

        return view('backend.sp-posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(SurgicalProceduresArticleRequest $request, $id)
    {
        $post = SurgicalProceduresArticle::find($id);

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->only('name', 'category_id', 'slug', 'heading_content', 'short_content',
            'full_content', 'image_thumbnail', 'image', 'meta_title', 'meta_keywords',
            'meta_description', 'publish_date', 'status');


        if($request->file('image_thumbnail'))
        {
            $path = public_path($this->getStorage());

            if($post->image_thumbnail != '')
            {
                $file = $path.'/'.$post->image_thumbnail;

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

            if($post->image != '')
            {
                $file = $path.'/'.$post->image;

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

        $post->update($data);

        return redirect()->route('admin.surgical-procedures-articles.index')->with('flash_success','Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = SurgicalProceduresArticle::find($id);

        $image_thumbnail = $post->image_thumbnail;
        $image = $post->image;
        $post->delete();

        $file = public_path($this->getStorage()).'/'.$image_thumbnail;
        if(file_exists($file) && is_file($file))
            unlink($file);

        $file = public_path($this->getStorage()).'/'.$image;
        if(file_exists($file) && is_file($file))
            unlink($file);

        return back()->with('flash_success','Article deleted successfully.');
    }

    public function getStorage()
    {
        return 'up_data/surgical-procedures';
    }
}
