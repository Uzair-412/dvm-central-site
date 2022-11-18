<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\BlogPostRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Flyer;
use App\Models\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class FlyersController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Flyers';
        $data['p_description']  = 'Here is the list of Flyers';

        $data['flyers']     = Flyer::orderBy('id', 'desc')->paginate(10);

        return view('backend.flyers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Flyer';
        $data['p_description']  = 'Create a new flyer by filling the form below';

        $data['status'] = 'Y';

        return view('backend.flyers.create', compact('data'));
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

        if($request->file('image'))
        {
            $path = public_path($this->getStorage()).'/images';
            $ext = '.'.$request->file('image')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        if($request->file('pdf_file'))
        {
            $path = public_path($this->getStorage()).'/pdfs';
            $ext = '.'.$request->file('pdf_file')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['pdf_file'] = $file_name;
            $request->file('pdf_file')->move($path, $file_name);
        }

        Flyer::create($data);

        return redirect()->route('admin.flyers.index')->with('flash_success','Flyer added successfully.');
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
    public function edit($id)
    {
        $flyer = Flyer::find($id);

        $data['flyer']          = $flyer;
        $data['p_heading']      = 'Update Flyer';
        $data['p_description']  = 'Modify flyer by filling the form below';

        return view('backend.flyers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flyer $flyer)
    {
        $data = $request->all();

        if($request->file('image'))
        {
            $path = public_path($this->getStorage()).'/images';

            if($flyer->image != '')
            {
                $file = $path.'/'.$flyer->image;

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

        if($request->file('pdf_file'))
        {
            $path = public_path($this->getStorage()).'/pdfs';

            if($flyer->pdf_file != '')
            {
                $file = $path.'/'.$flyer->pdf_file;

                if(file_exists($file) && is_file($file))
                {
                    unlink($file);
                }
            }

            $ext = '.'.$request->file('pdf_file')->getClientOriginalExtension();

            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['pdf_file'] = $file_name;
            $request->file('pdf_file')->move($path, $file_name);
        }

        $flyer->update($data);

        return redirect()->route('admin.flyers.index')->with('flash_success','Flyer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flyer $flyer)
    {
        $image = public_path($this->getStorage()).'/images/'.$flyer->image;
        $pdf_file = public_path($this->getStorage()).'/pdfs/'.$flyer->pdf_file;
        $flyer->delete();

        if(file_exists($image) && is_file($image))
            unlink($image);

        if(file_exists($pdf_file) && is_file($pdf_file))
            unlink($pdf_file);

        return back()->with('flash_success','Flyer deleted successfully.');
    }

    public function getStorage()
    {
        return env('UPLOADS_DIR').'/flyers';
    }
}
