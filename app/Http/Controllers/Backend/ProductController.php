<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProductBasicRequest;
use App\Http\Requests\Backend\ProductDetailsRequest;
use App\Models\AdditionalInfo;
use App\Models\Auth\User;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Files;
use App\Models\Product;
use App\Models\Redirect;
use App\Models\SubProduct;
use App\Models\Vendor;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Slug;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['p_heading']      = 'Manage Products';
        $data['p_description']  = 'Here is the list of all the products';

        $filter['admin'] = true;

        if ($request->input('category_id') > 0)
            $filter['category_id'] = $request->input('category_id');
        if (trim($request->input('name')) != null)
            $filter['name'] = $request->input('name');
        if (trim($request->input('sku')) != null)
            $filter['sku'] = $request->input('sku');
        if (trim($request->input('type')) != null)
            $filter['type'] = $request->input('type');
        if (trim($request->input('visibility')) != null)
            $filter['visibility'] = $request->input('visibility');
        if (trim($request->input('status')) != null)
            $filter['status'] = $request->input('status');

        $data['products']       = Product::getProducts($filter);
        $data['categories']     = Category::getCategoriesSelect(false, 'Please Select ...');

        return view('backend.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $data['p_heading']      = 'Create Product';
        $data['p_description']  = 'Create a new product by filling the form below';
        $data['categories']     = Category::where('status', 'Y')->pluck('name', 'id');
        $data['vendors']        = Vendor::where(['status' => 'Y'])->pluck('name', 'id');
        $data['levels']         = Level::select(DB::raw('CONCAT(name," - ",description) AS name'), 'id')->pluck('name', 'id');
        $data['type'] = 'simple';
        $data['is_set'] = 'N';
        $data['show_individual'] = 'N';
        $data['link_type'] = 'variation';
        $data['selected_categories'] = null;
        $data['cmd'] = 'create';
        return view('backend.product.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductBasicRequest $request)
    {
        $validated = $request->validated();
        
        if (!$validated)
            return back();

        $data = $request->all();
       
        $slug = $data['slug'];

        $check = (new Slug())->checkIfExists($slug);

        if ($check) {
            return back()->with('flash_danger', 'The slug is not unique.');
        }

        $data['sku_stripped'] = Str::replace('-', '', $data['sku']);
        $product = Product::create($data);

        $product->slugs()->create(['slug' => $slug]);

        $product->categories()->sync($data['category']);

        return redirect()->route('admin.product.edit.details', ['product' => $product->id])->with('flash_success', 'Basic details of product saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $data['breadcrumb'] =true;
        $data['p_heading']      = 'Modify Product';
        $data['p_description']  = 'Update product by filling the form below';
        $data['categories']     = Category::where('status' , 'Y')->pluck('name', 'id');
        $data['vendors']        = Vendor::where(['status' => 'Y'])->pluck('name', 'id');
        $data['levels']         = Level::select(DB::raw('CONCAT(name," - ",description) AS name'), 'id')->pluck('name', 'id');
        $data['product']        = $product;
        $data['breadcrumbs']    = $product->name;
        $data['type']           = $product->type;
        $data['is_set']         = $product->is_set;
        $data['show_individual'] = $product->show_individual;
        $data['link_type']      = $product->link_type;
        $data['vendor_id']      = $product->vendor_id;
        $data['selected_categories'] = $data['product']->categories->pluck('id')->toArray();
        $data['cmd'] = 'edit';

        return view('backend.product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductBasicRequest $request, Product $product)
    {
        $validated = $request->validated();

        if (!$validated)
            return back();

        $data = $request->all();

        if (isset($data['save_slug'])) {
            $slug = $data['slug'];
            $check = (new Slug())->checkIfExists($slug, $product->id, 'App\Models\Product');

            if ($check) {
                return back()->with('flash_danger', 'The slug is not unique.');
            }

            if (isset($data['create_redirect'])) {
                $redirect['request_url'] = $product->slug;
                $redirect['target_url'] = $slug;
                $redirect['type'] = 'product';
                $redirect['type_id'] = $product->id;
                Redirect::create($redirect);
            }
        }

        $data['sku_stripped'] = Str::replace('-', '', $data['sku']);

        $product->update($data);

        if (isset($data['save_slug'])) {
            $product->slugs()->update(['slug' => $slug]);
        }

        $product->categories()->sync($data['category']);

        return redirect()->route('admin.product.edit.details', ['product' => $product->id])->with('flash_success', 'Basic details of product saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   
        $id = $product->id;

        //check if product order is complete or not
        foreach ($product->ordersItems as $ordersItem) {

        $checkVars = array('1', '2', '3', '5', '6');
        if(in_array($ordersItem->order->order_status, $checkVars)){
            return redirect()->route('admin.product.index')->with('flash_danger', 'Product can\'t be deleted until it\'s order gets complete.');
        }
        //    if ($ordersItem->order->order_status == '1' || $ordersItem->order->order_status == '2' || $ordersItem->order->order_status == '3' || $ordersItem->order->order_status == '5' || $ordersItem->order->order_status == '6'){
        //         return redirect()->route('admin.product.index')->with('flash_danger', 'Product can\'t be deleted until it\'s order gets complete.');
        //     }
        }
        $sub_products = Product::where('parent_id', $id)->get();

        foreach ($sub_products as $sp) {
            $image = $sp->files->first()->name;

            $file_name = 'products/images/' . $image;
            if (Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            $file_name = 'products/images/thumbnails/' . $image;
            if (Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            $file_name = 'products/images/medium/' . $image;
            if (Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            $file_name = 'products/images/large/' . $image;
            if (Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            $sp->files->each->delete();
            $sp->delete();
        }

        $files = $product->files;

        foreach ($files as $file) {

            $name = $file->name;

            $file_name = 'products/' . $file->type . '/' . $name;
            if (Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            if ($file->type == 'images') {
                $file_name = 'products/' . $file->type . '/thumbnails/' . $name;
                if (Storage::disk('ds3')->exists($file_name))
                    Storage::disk('ds3')->delete($file_name);

                $file_name = 'products/' . $file->type . '/medium/' . $name;
                if (Storage::disk('ds3')->exists($file_name))
                    Storage::disk('ds3')->delete($file_name);

                $file_name = 'products/' . $file->type . '/large/' . $name;
                if (Storage::disk('ds3')->exists($file_name))
                    Storage::disk('ds3')->delete($file_name);
            }

            $file->delete();
        }


        $product->categories()->detach();

        $product->delete();


        return redirect()->route('admin.product.index')->with('flash_success', 'Product deleted successfully.');
    }

    public function edit_details(Product $product)
    {   
        $data['breadcrumb'] = true;
        $data['p_heading']      = 'Manage Details';
        $data['p_description']  = 'Give details of product to complete the product creation';
        $data['product']        = $product;
        $data['breadcrumbs'] = $product->name;
        $data['product']->related_products = explode(',', $data['product']->related_products);
        $data['product']->upsell_products = explode(',', $data['product']->upsell_products);
        $data['product']->cross_sell_products = explode(',', $data['product']->cross_sell_products);

        $infos = AdditionalInfo::all();

        if ($product->type == 'simple') {

            if (trim($product->additional_information) != false) {
                $json = json_decode($product->additional_information, true);
            }

            foreach (Product::$additional_info as $key => $value) {
                $infos = AdditionalInfo::select('info_text')->where('info_id', $key)->get();

                $data['additional_info'][$key][''] = '';

                if (isset($json[$key]))
                    $data['additional_information'][$key] = $json[$key];
                else
                    $data['additional_information'][$key] = '';

                if ($infos->count() > 0) {
                    foreach ($infos as $info) {
                        $data['additional_info'][$key][$info->info_text] = $info->info_text;
                    }
                } else {
                    $data['additional_info'][$key] = [];
                }
            }
        }

        $data['products']       = $this->getProductsForVariations(); //['1' => 'G50-11 Tungstun Extraction', '2' => 'GD17-59 Angleluxvator Kit'];
        $tags                   = explode(',', $data['product']->tags);
        $competitor_skus        = explode(',', $data['product']->competitor_skus);

        if (trim($data['product']->tags) != null && is_array($tags) && count($tags) > 0) {
            foreach ($tags as $tag) {
                $data['tags'][$tag] = $tag;
            }
            $data['product']->tags = $tags;
        } else {
            $data['tags'] = [];
        }

        if (trim($data['product']->competitor_skus) != null && is_array($competitor_skus) && count($competitor_skus) > 0) {
            foreach ($competitor_skus as $competitor_sku) {
                $data['competitor_skus'][$competitor_sku] = $competitor_sku;
            }
            $data['product']->competitor_skus = $competitor_skus;
        } else {
            $data['competitor_skus'] = [];
        }

        $data['banners']        = Banner::getBanners(12);

        $data['videos']         = Video::pluck('title', 'id');

        return view('backend.product.details', compact('data'));
    }
    
    public function update_details(ProductDetailsRequest $request, Product $product)
    {
        $data = $request->all();
        if (isset($data['weight']) && $data['weight'] == '')
            $data['weight'] = 1;

        if ($product->type == 'simple') {
            if (isset($data['additional_info']) && is_array($data['additional_info']) && count($data['additional_info']) > 0) {
                foreach ($data['additional_info'] as $key => $value) {
                    $info = ['info_id' => $key, 'info_text' => $value];
                    $check = AdditionalInfo::where($info)->first();
                    if (!$check) {
                        AdditionalInfo::create($info);
                    }
                }

                $data['additional_information'] = json_encode($data['additional_info']);
            }

            if ($data['price_discounted']) $data['price'] = $data['price_discounted'];
            else $data['price'] = $data['price_catalog'];
        }

        if (isset($data['related_products']) && is_array($data['related_products']) && count($data['related_products']) > 0){
            $data['related_products'] = implode(',', $data['related_products']);
        }else{
            $data['related_products'] = null;
        }

        if (isset($data['upsell_products']) && is_array($data['upsell_products']) && count($data['upsell_products']) > 0)
            $data['upsell_products'] = implode(',', $data['upsell_products']);

        if (isset($data['cross_sell_products']) && is_array($data['cross_sell_products']) && count(($data['cross_sell_products'])) > 0)
            $data['cross_sell_products'] = implode(',', $data['cross_sell_products']);

        if (isset($data['tags']) && is_array($data['tags']))
            $data['tags'] = implode(',', $data['tags']);
        else
            $data['tags'] = NULL;

        if (isset($data['competitor_skus']) && is_array($data['competitor_skus']))
            $data['competitor_skus'] = implode(',', $data['competitor_skus']);

        $product->update($data);
        // dd($product['additional_information']);
        return redirect()->route('admin.product.edit.details', ['product' => $product->id])->with('flash_success', 'Product details saved successfully.');
    }

    public function edit_files(Product $product)
    {
        $data['p_heading']      = 'Manage Files';
        $data['p_description']  = 'Please upload pictures, videos and files to attach with this product.';
        $data['product']        = $product;
        $data['breadcrumb'] = true;
        $data['breadcrumbs'] = $product->name;
        $data['images'] = $product->files()->where('type', 'images')->get();
        $data['videos'] = $product->files()->where('type', 'videos')->get();
        $data['files'] = $product->files()->where('type', 'files')->get();

        return view('backend.product.files', compact('data'));
    }

    public function upload_files(Request $request, Product $product)
    {      
        $type = $request->input('type');

        if ($type !== 'videos' || ($type == 'videos' && $request->video_type == 'file')) // pdf/file or video file
        {   
            if(($files = $request->file($type)))
            {
                $path = 'up_data/products/images/';
                foreach($files as $file)
                {
                    $file_name = substr($file->getClientOriginalName(),0,-4);
                    $ext = '.'.$file->getClientOriginalExtension();
                    if($ext != '.jpg' && $ext != '.jpeg' && $ext != '.png' && $type == 'images')
                    {
                        return redirect()->back()->with('flash_danger','Only product image format e.g. (jpg, jpeg and png) is required.');
                    }
                    
                    if($type == 'images')
                    {
                        $file_name = Str::slug($product->sku.'_'.$product->name).'-'.time().'-'.$ext;
                        $data['image'] = str_replace('products/' . $type . '/', '', Storage::disk('ds3')->putFileAs('products/' . $type, $file, $file_name));
                    }
                    else
                    {
                        $file_name = time() . '_' . Str::slug($file_name).$ext;

                        $file->move('up_data/products/' . $type . '/', $file_name);
                    }
                
                    $product->files()->create(['name' => $file_name, 'type' => $type, 'video_type' => $request->video_type]);
                    if($type == 'images')
                    {
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

                        if(trim($product->image) == null)
                        {
                            $product->image = $file_name;
                            $product->save();
                        }
                    }
                }
            }
        }
        else{ 
            $file_name = $request->name;
            $product->files()->create(['name' => $file_name, 'type' => $type, 'video_type' => $request->video_type]);
            $redirectParams['sub_tab'] = 'videos';
        }
        $flash_success = 'Product ' . $type . ' saved successfully.';

        return back()->with(compact('flash_success', 'type'));
    }

        public function update_files(Request $request)
        {   
        $type = $request->input('type');
        $titles = $request->input('title');
        $ids = $request->input('id'); 

        for ($i = 0; $i < sizeof($ids); $i++) {
            $id = $ids[$i];
            $file = Files::find($id);
            $data['title'] = $titles[$i];
            // dd($request->all(),$file);
            if ($type == 'videos') {
                $thumbnail = $request->file('thumbnail_' . $id);
                if ($thumbnail != null) {
                    $path = 'products/videos/thumbnails';

                    if ($file->video_thumbnail != '') {
                        $old = $path . '/' . $file->video_thumbnail;
                        if (Storage::disk('ds3')->exists($old))
                            Storage::disk('ds3')->delete($old);
                    }
                    $file_name = substr($thumbnail->getClientOriginalName(), 0, -4);
                    $ext = '.' . $thumbnail->getClientOriginalExtension();

                    $file_name = time() . '_' . Str::slug($file_name) . $ext;

                    $data['video_thumbnail'] = str_replace($path . '/', '', Storage::disk('ds3')->putFileAs($path, $thumbnail, $file_name));
                }

                $video_image = $request->file('video_image_' . $id);
                if ($video_image != null) {
                    $path = 'products/videos/images';

                    if ($file->video_image != '') {
                        $old = $path . '/' . $file->video_image;
                        if (Storage::disk('ds3')->exists($old))
                            Storage::disk('ds3')->delete($old);
                    }
                    $file_name = substr($video_image->getClientOriginalName(), 0, -4);
                    $ext = '.' . $video_image->getClientOriginalExtension();

                    $file_name = time() . '_' . Str::slug($file_name) . $ext;

                    $data['video_image'] = str_replace($path . '/', '', Storage::disk('ds3')->putFileAs($path, $video_image, $file_name));
                }
            }
// dd( $data['video_image'] );
            $file->update($data);

            unset($data);
        }



        $flash_success = ucfirst(\Str::singular($type)) . ' titles updated successfully';
        return back()->with(compact('flash_success', 'type'));
    }

    public function edit_variations(Product $product)
    {
        /*set_time_limit(0);

        $childs = Product::select(['id', 'parent_id', 'sku'])->where('type', 'child')->get();

        foreach($childs as $child)
        {
            $data['product_id'] = $child->parent_id;
            $data['sub_product_id'] = $child->id;
            SubProduct::create($data);

            $parent = Product::find($child->parent_id);
            Product::setProductVariationSkus($parent);

            error_log($child->sku);
        }

        die('here');*/
        $data['breadcrumb'] = true;
        $data['p_heading']      = 'Manage Variations';
        $data['p_description']  = 'Please upload variations for this product.';
        $data['product']        = $product;
        $data['products']       = $this->getProductsForVariations(); //['1' => 'G50-11 Tungstun Extraction', '2' => 'GD17-59 Angleluxvator Kit'];
        $data['variations']     = $product->childProducts()->orderBy('position', 'ASC')->get(); //Product::where('parent_id', $product->id)->get();
        $data['videos']         = Video::pluck('title', 'id');

        $data['breadcrumbs'] = $data['product']->name;

        foreach (Product::$additional_info as $key => $value) {
            $infos = AdditionalInfo::select('info_text')->where('info_id', $key)->get();

            $data['additional_info'][$key][''] = '';

            $data['additional_information'][$key] = '';

            if ($infos->count() > 0) {
                foreach ($infos as $info) {
                    $data['additional_info'][$key][$info->info_text] = $info->info_text;
                }
            } else {
                $data['additional_info'][$key] = [];
            }
        }


        /*foreach($data['variations'] as $v)
        {
            dd( $v->files()->first()->name );

            echo '<hr>';
        }

        die;*/

        return view('backend.product.variations', compact('data'));
    }

    public function upload_variations(Request $request, Product $product)
    {
        $data = $request->all();
        if (isset($data['weight']) && $data['weight'] == '')
            $data['weight'] = 1;

        if ($data['price_discounted']) $data['price'] = $data['price_discounted'];
        else $data['price'] = $data['price_catalog'];

        if (isset($data['related_products'])){
            $data['related_products'] = implode(',', $data['related_products']);
        }else{
                $data['related_products'] = null;
        }

        if (isset($data['upsell_products']))
            $data['upsell_products'] = implode(',', $data['upsell_products']);

        if (isset($data['cross_sell_products']))
            $data['cross_sell_products'] = implode(',', $data['cross_sell_products']);

        $data['slug'] = Str::slug($data['name']) . '_' . time();
        $data['sku_stripped'] = Str::replace('-', '', $data['sku']);

        if (isset($data['additional_info']) && is_array($data['additional_info']) && count($data['additional_info']) > 0) {
            foreach ($data['additional_info'] as $key => $value) {
                $info = ['info_id' => $key, 'info_text' => $value];
                $check = AdditionalInfo::where($info)->first();
                if (!$check) {
                    AdditionalInfo::create($info);
                }
            }

            $data['additional_information'] = json_encode($data['additional_info']);
        }

        if ($request->input('cmd') == 'add') {
            $data['type'] = 'child';
            $data['parent_id'] = $product->id;

            $sub_product = Product::create($data);

            $data_sub = ['product_id' => $product->id, 'sub_product_id' => $sub_product->id];
            SubProduct::create($data_sub);

            $flash_success = 'Product variation added successfully.';
        } else {
            $sub_product = Product::find($request->input('variation_id'));
            $sub_product->update($data);

            $flash_success = 'Product variation updated successfully.';
        }

        if ($request->file('image')) {
            $path = 'products/images';

            if ($request->input('cmd') != 'add') {
                $images = $sub_product->files()->get();
                foreach ($images as $img) {
                    $file_name = $img->name;

                    $full_path = $path . '/' . $file_name;
                    if (Storage::disk('ds3')->exists($full_path))
                        Storage::disk('ds3')->delete($full_path);

                    $full_path = $path . '/large/' . $file_name;
                    if (Storage::disk('ds3')->exists($full_path))
                        Storage::disk('ds3')->delete($full_path);

                    $full_path = $path . '/medium/' . $file_name;
                    if (Storage::disk('ds3')->exists($full_path))
                        Storage::disk('ds3')->delete($full_path);

                    $full_path = $path . '/thumbnails/' . $file_name;
                    if (Storage::disk('ds3')->exists($full_path))
                        Storage::disk('ds3')->delete($full_path);
                }

                $sub_product->files->each->delete();
            }

            $type = 'images';
            $base_path = 'products/' . $type;
            $local_base_path = 'up_data/' . $base_path;

            $file = $request->file('image');

            $file_name = substr($file->getClientOriginalName(), 0, -4);
            $ext = '.' . $file->getClientOriginalExtension();
            $file_name = Str::slug($sub_product->sku . '_' . $sub_product->name) . '-' . time() . $ext;

            $local_file_path = $local_base_path . '/' . $file_name;
            $file->move($local_base_path, $file_name);

            //Storage::disk('ds3')->putFileAs($base_path, $local_file_path, $file_name); // Saving main image file

            $data['image'] = $file_name;
            $sub_product->files()->create(['name' => $data['image'], 'type' => $type]);

            // Saving Thumbnail Image
            $thumbnail_path = $base_path . '/thumbnails/';
            $local_thumbnail_path = $local_base_path . '/thumbnails/' . $file_name;
            Image::make($local_file_path)->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($local_thumbnail_path);
            //$stored = Storage::disk('ds3')->putFileAs($thumbnail_path, $local_thumbnail_path, $file_name);
            /*if($stored)
            {
                unlink($local_thumbnail_path);
            }*/
            // End Saving Thumbnail Image

            // Saving Medium Image
            $medium_path = $base_path . '/medium/';
            $local_medium_path = $local_base_path . '/medium/' . $file_name;
            Image::make($local_file_path)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($local_medium_path);
            //$stored = Storage::disk('ds3')->putFileAs($medium_path, $local_medium_path, $file_name);
            /*if($stored)
            {
                unlink($local_medium_path);
            }*/
            // End Saving Medium Image

            // Saving Large Image
            $large_path = $base_path . '/large/';
            $local_large_path = $local_base_path . '/large/' . $file_name;
            $img = Image::make($local_file_path)->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            });

            /*$watermark = Image::make('up_data/gvu_water_mark.png');
            $img->insert($watermark, 'center');*/
            $img->save($local_large_path);

            /*$stored = Storage::disk('ds3')->putFileAs($large_path, $local_large_path, $file_name);
            if($stored)
            {
                unlink($local_large_path);
            }*/
            // End Saving Large Image

            // Removing Actual File stored on local server
            /*if(is_file($local_file_path) && file_exists($local_file_path))
                unlink($local_file_path);*/

            $sub_product->image = $file_name;
            $sub_product->save();
        }

        Product::setProductVariationSkus($product);

        return back()->with(compact('flash_success'));
    }

    public function edit_set_items(Product $product)
    {   
        $data['breadcrumb'] = true;
        $data['p_heading']      = 'Manage Set Items';
        $data['p_description']  = 'Please upload variations for this product.';
        $data['product']        = $product;
        $data['items']          = $product->setProducts()->orderBy('pos', 'ASC')->get();
        $data['breadcrumbs'] = $data['product']->name;
        return view('backend.product.set-items', compact('data'));
    }

    public function resizeImages()
    {
        die('...');
        set_time_limit(0);

        $products = Product::where('image', '!=', '')->where('resized', 'N')->get();

        $path = 'products/images';

        $inc = 0;
        foreach ($products as $prd) {
            $actual_image = Storage::disk('ds3')->url($path . '/' . $prd->image);

            echo '&bull; ' . $actual_image . '<br>';

            if (Storage::disk('ds3')->exists($actual_image)) {
                $thumbnail_path = 'up_data/products/images/thumbnails/' . $prd->image;
                $img = Image::make($actual_image)->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($thumbnail_path);
                $thumbnail = Storage::disk('ds3')->putFileAs($path . '/thumbnails', $thumbnail_path, $prd->image);
                if ($thumbnail) {
                    unlink($thumbnail_path);
                }

                $medium_path = 'up_data/products/images/medium/' . $prd->image;
                $img = Image::make($actual_image)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($medium_path);
                $medium = Storage::disk('ds3')->putFileAs($path . '/medium', $medium_path, $prd->image);
                if ($medium) {
                    unlink($medium_path);
                }

                $large_path = 'up_data/products/images/large' . $prd->image;
                $img = Image::make($actual_image)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $watermark = Image::make('up_data/gvu_water_mark.png');
                $img->insert($watermark, 'center');
                $img->save($large_path);
                $large = Storage::disk('ds3')->putFileAs($path . '/large', $large_path, $prd->image);
                if ($large) {
                    unlink($large_path);
                }

                $prd->resized = 'Y';

                $prd->save();

                $inc++;
            } else {
                echo 'not found :: ' . $prd->id;
            }
        }

        echo '<hr>' . $inc;



        /*$actual_image = $path.'/'.$file_name;

        $thumbnail_path = $path.'/thumbnails/'.$file_name;
        $img = Image::make($actual_image)->resize(200, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnail_path);

        $large_path = $path.'/large/'.$file_name;
        $img = Image::make($actual_image)->resize(600, 600, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($large_path);

        if(trim($product->image) == null)
        {
            $product->image = $file_name;
            $product->save();
        }*/
    }

    public function watermarkImages()
    {
        set_time_limit(0);

        $products = Product::where('image', '!=', '')->get();

        $path = 'products/images';

        $inc = 0;
        foreach ($products as $prd) {
            $actual_image = Storage::disk('ds3')->url($path . '/' . $prd->image);

            echo '&bull; ' . $actual_image . '<br>';

            if (Storage::disk('ds3')->exists($actual_image)) {
                $img_path = $path . '/large/' . $prd->image;

                $large_path = 'up_data/products/images/large/' . $prd->image;

                if (Storage::disk('ds3')->exists($img_path)) Storage::disk('ds3')->delete($img_path);

                $img = Image::make($actual_image)->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $watermark = Image::make('up_data/gvu_water_mark.png');
                $img->insert($watermark, 'center');
                $img->save($large_path);
                $large = Storage::disk('ds3')->putFileAs($path . '/large', $large_path, $prd->image);
                if ($large) {
                    unlink($large_path);
                }

                $inc++;
            } else {
                echo 'not found :: ' . $prd->id;
            }
        }

        echo '<hr>' . $inc;
    }

    public function showImages()
    {
        $images = Product::select('id', 'name', 'sku', 'image', 'type')->where('image', '!=', '')->paginate(100);

        $data['p_heading']      = 'Manage Product Images';
        $data['p_description']  = 'Here is the list of all product images';
        $data['images']         = $images;

        return view('backend.product.images', compact('data'));
    }

    public function getProductsForVariations()
    {
        $return = [];
        $filter['admin'] = true;
        $filter['limit'] = 100000;
        $products        = Product::getProducts($filter);
        foreach ($products as $product) {
            $return[$product->id] = $product->name . ' (' . $product->sku . ')';
        }
        return $return;
    }

    public function generateVariations()
    {
        set_time_limit(0);

        $variations = Product::where(['type' => 'variation'])->get();

        foreach ($variations as $product) {
            if ($product) {
                Product::setProductVariationSkus($product);
            }
        }

        die('done');
    }

    public function getStorage($type = 'images')
    {
        return 'up_data/products/' . $type;
    }
}
