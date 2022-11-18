<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Redirect;
use App\Models\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\BusinessType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $storage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['p_heading']      = 'Manage Categories';
        $data['p_description']  = 'Here is the list of categories';

        $filter = [];

        if(trim($request->input('name')) != null)
            $filter['name'] = $request->input('name');
        if(trim($request->input('slug')) != null)
            $filter['slug'] = $request->input('slug');
        if(trim($request->input('status')) != null)
            $filter['status'] = $request->input('status');

        /*echo '<pre>';
        $rows = Category::getCategoryTree();
        print_r($rows);
        die;*/

        //$data['categories']     = Category::paginate(10);
        $data['categories']     = Category::getCategories($filter);

        return view('backend.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Category';
        $data['p_description']  = 'Create a new category by filling the form below';
        $data['business-type']     = BusinessType::get();
        $data['categories']     = Category::getCategoriesSelect();
        $data['banners']        = Banner::getBanners(11);

        $data['show_in_menu'] = $data['is_main'] = $data['is_featured'] = $data['status'] = 'Y';
        $data['display_mode'] = 'products_and_description';

        $data['cmd'] = 'create';

        return view('backend.category.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $slug = $data['slug'];

        $check = (new Slug())->checkIfExists($slug);

        if($check)
        {
            return back()->with('flash_danger','The slug is not unique.');
        }

        if($request->file('image'))
        {
            // $path = public_path($this->getStorage());
            $path = 'categories';
            $file_name = substr($request->file('image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('image')->getClientOriginalExtension();
            //$file_name = time() . '_' . Str::slug($file_name).$ext;
            $file_name = Str::slug($data['name']).'-'.time().$ext;
            // $data['image'] = $file_name;
            // $request->file('image')->move($path, $file_name);
            $data['image'] = str_replace($path.'/','',Storage::disk('ds3')->putFileAs($path, $request->file('image'), $file_name));

            $actual_image = Storage::disk('ds3')->url($path.'/'.$file_name);

            $thumbnail_path = 'up_data/'.$path.'/thumbnails/'.$file_name;
            $img = Image::make($actual_image)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnail_path);
            $thumbnail = Storage::disk('ds3')->putFileAs($path.'/thumbnails', $thumbnail_path, $file_name);
            if($thumbnail){
                unlink($thumbnail_path);
            }

            $medium_path = 'up_data/'.$path.'/medium/'.$file_name;
            $img = Image::make($actual_image)->resize(400, 400, function($constraint) {
                $constraint->aspectRatio();
            })->save($medium_path);
            $medium = Storage::disk('ds3')->putFileAs($path.'/medium', $medium_path, $file_name);
            if($medium){
                unlink($medium_path);
            }

            $large_path = 'up_data/'.$path.'/large/'.$file_name;
            $img = Image::make($actual_image)->resize(600, 600, function($constraint) {
                $constraint->aspectRatio();
            })->save($large_path);
            $large = Storage::disk('ds3')->putFileAs($path.'/large', $large_path, $file_name);
            if($large){
                unlink($large_path);
            }
        }

        $category = Category::create($data);

        $category->slugs()->create(['slug' => $slug]);

        return redirect()->route('admin.category.index')->with('flash_success','Category added successfully.');
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
    public function edit(Category $category)
    {
        $data['category']       = $category;
        $data['p_heading']      = 'Update Category';
        $data['p_description']  = 'Modify category by filling the form below';
        $data['business-type']     = BusinessType::get();
        $data['categories']     = Category::getCategoriesSelect();
        $data['banners']        = Banner::getBanners(11);

        //$data['show_in_menu'] = $data['status'] = 'Y';
        //$data['display_mode'] = 'products_and_description';

        $data['cmd'] = 'edit';

        return view('backend.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $check = false;

        if(isset($data['save_slug']))
        {
            $slug = $data['slug'];
            //$full_slug = (new Slug())->fullSlug($slug, 'category', $data['parent_id']);
            //$check = (new Slug())->checkIfExists($full_slug, $category->id, 'App\Models\Category');

            if(isset($data['create_redirect']))
            {
                $redirect['request_url'] = $category->slug;
                $redirect['target_url'] = $slug;
                $redirect['type'] = 'category';
                $redirect['type_id'] = $category->id;
                Redirect::create($redirect);
            }
        }

        if($check)
        {
            return back()->with('flash_danger','The slug is not unique.');
        }

        if($request->file('image'))
        {
            $path = public_path($this->getStorage());

            if($category->image != '')
            {
                $file = $path.'/'.$category->image;
                error_log($file);
                if(file_exists($file) && is_file($file))
                {
                    unlink($file);

                    $file = $path.'/thumbnails/'.$category->image;
                    if(file_exists($file) && is_file($file))
                    {
                        unlink($file);
                    }

                    $file = $path.'/medium/'.$category->image;
                    if(file_exists($file) && is_file($file))
                    {
                        unlink($file);
                    }

                    $file = $path.'/large/'.$category->image;
                    if(file_exists($file) && is_file($file))
                    {
                        unlink($file);
                    }
                }
            }

            $file_name = substr($request->file('image')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('image')->getClientOriginalExtension();
            //$file_name = time() . '_' . str_slug($file_name).$ext;
            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);

            $actual_image = $path.'/'.$file_name;

            $thumbnail_path = $path.'/thumbnails/'.$file_name;
            $img = Image::make($actual_image)->resize(200, 200, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnail_path);

            $medium_path = $path.'/medium/'.$file_name;
            $img = Image::make($actual_image)->resize(400, 400, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($medium_path);

            $large_path = $path.'/large/'.$file_name;
            $img = Image::make($actual_image)->resize(600, 600, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($large_path);
        }

        $category->update($data);

        if(isset($data['save_slug']))
        {
            $category->slugs()->update(['slug' => $slug]);
        }

        return redirect()->route('admin.category.index')->with('flash_success','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $sub_check = Category::where(['parent_id' => $category->id])->first();

        if($sub_check)
        {
            return back()->with('flash_danger','This category contains sub-categories and cannot be deleted.');
        }

        // check for products
        /*if($prd_check)
        {
            return back()->with('flash_danger','This category contains products and cannot be deleted.');
        }*/

        $image = $category->image;
        $category->delete();

        $file ='categories/thumbnails/'.$image;
        if(Storage::disk('ds3')->exists($file))
            // unlink($file);
            Storage::disk('ds3')->delete($file);

        $file ='categories/medium/'.$image;
        if(Storage::disk('ds3')->exists($file))
            // unlink($file);
            Storage::disk('ds3')->delete($file);

        $file ='categories/large/'.$image;
        if(Storage::disk('ds3')->exists($file))
            // unlink($file);
            Storage::disk('ds3')->delete($file);

        $file ='categories/'.$image;
        if(Storage::disk('ds3')->exists($file))
            // unlink($file);
            Storage::disk('ds3')->delete($file);

        return back()->with('flash_success','Category deleted successfully.');
    }

    public function getStorage()
    {
        return env('UPLOADS_DIR').'/up_data/categories';
    }
}
