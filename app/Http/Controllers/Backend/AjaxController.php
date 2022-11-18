<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\General\SiteMapHelper;
use App\Models\CrmData;
use App\Models\Customer;
use App\Models\Files;
use App\Models\Messages;
use App\Models\MicroSitesProducts;
use App\Models\Order;
use App\Models\Product;
use App\Models\SetProduct;
use App\Models\Settings;
use App\Models\Slug;
use App\Models\State;
use App\Models\SubProduct;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SpeakerFiles;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AjaxController extends Controller
{
    public function slugs(Request $request)
    {
        $data['table'] = $request->input('table');
        $data['name'] = $request->input('name');
        $data['id'] = $request->input('id');
        $data['parent_id'] = $request->input('parent_id');
        $data['business_type'] = $request->input('business_type');
        
        $str_slug = $this->get_slug($data);

        return ['status' => '1', 'cmd' => 'slug', 'slug' => $str_slug];
    }

    public function get_slug($data)
    {
        $name = Str::replace('/','-', $data['name']);

        $temp_str_slug = $str_slug = Str::slug($name);
        $id = $data['id'];

        if($data['table'] == 'category')
        {
            $str_slug = (new Slug())->fullSlug($str_slug, 'category', $data['parent_id'], $data['business_type']);
            $class = 'App\Models\Category';
        }
        elseif($data['table'] == 'pages'){
            $class = 'App\Models\Page';
        }
        elseif($data['table'] == 'blog-posts'){
            $class = 'App\Models\BlogPost';
        }
        elseif($data['table'] == 'business-type'){
            $class = 'App\Models\BusinessType';
        }
        elseif($data['table'] == 'vendor'){
            $str_slug = (new Slug())->fullSlug($str_slug, 'vendor', $data['business_type']);
            $class = 'App\Models\Vendor';
        }
        elseif($data['table'] == 'virtual_events'){
            $class = 'App\Models\Events';
        }
        else{
            $class = 'App\Models\Product';
        }

        //if($data['table'] == 'category')
        {
            $flag = true;
            $inc = 1;
            while($flag)
            {
                if($id == '')
                    $check = $class::where(['slug' => $str_slug])->first();
                else
                    $check = $class::where([['slug', '=', $str_slug], ['id', '!=', $id]])->first();

                if($check)
                {
                    $str_slug = $temp_str_slug . '-' . $inc;
                    $inc++;
                }
                else
                    $flag = false;
            }
        }

        return $str_slug;
    }


    public function set_default_image(Request $request)
    {
        $id = $request->input('id');
        $fileable_id = $request->input('fileable_id');
        Files::where([['fileable_id', '=', $fileable_id], ['fileable_type', '=', 'App\Models\Product']])->update(['default' => 'N']);
        //Files::where('id', $id)->update(['default' => 'Y']);
        $file = Files::find($id);
        $file->default = 'Y';
        $file->save();
        Product::where('id', $fileable_id)->update(['image' => $file->name]);
        return ['status' => '1'];
    }

    public function delete_product_file(Request $request)
    {
        $id = $request->input('id');
        $file = Files::find($id);

        // $path = public_path(env('UPLOADS_DIR').'/products/'.$file->type);
        $path = 'products/'.$file->type;

        error_log($file->type);

        if($file->type == 'images')
        {
            $file_name = $path .'/'. $file->name;
            if(Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            $file_name = $path .'/thumbnails/'. $file->name;
            if(Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            $file_name = $path .'/medium/'. $file->name;
            if(Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            $file_name = $path .'/large/'. $file->name;
            error_log('-------------');
            error_log($file_name);
            error_log('-------------');
            if(Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);
        }
        else
        {
            $file_name = $path .'/'. $file->name;
            if(Storage::disk('ds3')->exists($file_name))
                Storage::disk('ds3')->delete($file_name);

            if($file->type == 'videos')
            {
                $file_name = $path .'/thumbnails/'. $file->video_thumbnail;
                if(Storage::disk('ds3')->exists($file_name))
                    Storage::disk('ds3')->delete($file_name);
            }
        }


        $file->delete();

        return ['status' => '1'];

    }


    public function delete_speaker_file(Request $request)
    {
        $id = $request->input('id');
        $file = SpeakerFiles::find($id);

        // $path = public_path(env('UPLOADS_DIR').'/products/'.$file->type);
        $path = 'speakers/files/';


        $file_name = $path .'/'. $file->file;
        if(Storage::disk('ds3')->exists($file_name))
            Storage::disk('ds3')->delete($file_name);

        $file->delete();

        return ['status' => '1'];

    }

    public function delete_variation(Request $request)
    {
        $id = $request->input('id');
        $product_id = $request->input('product_id');
        SubProduct::where(['product_id' => $product_id, 'sub_product_id' => $id])->delete(); // Only delete the reference

        $parent = Product::find($product_id);
        Product::setProductVariationSkus($parent);

        $check = SubProduct::where(['sub_product_id' => $id])->first(); // Check if this child item relates to any other product
        if(!$check) // if not, change the product to simple product instead of deleting the product entirely
        {
            $product = Product::find($id);
            $product->type = 'simple';

            $product->save();

            $check = Slug::where('sluggable_id', $product->id)->where('sluggable_type', 'App\Models\Product')->first();

            error_log('===============================');
            error_log(json_encode($check));
            error_log('===============================');

            if($check)
            {
                $product->slug = $check->slug;
                $product->save();
            }
            else
            {
                $data['table'] = 'product';
                $data['name'] = $product->name;
                $data['id'] = $product->id;

                $slug = $this->get_slug($data);

                $product->slug = $slug;
                $product->save();

                $product->slugs()->create(['slug' => $slug]);
            }

            /*error_log('Deleting Product');
            $product = Product::find($id);
            $image = $product->files->first()->name;

            $path = public_path(env('UPLOADS_DIR').'/products/images');

            $file_name = $path .'/'. $image;
            if(file_exists($file_name) && is_file($file_name))
                unlink($file_name);

            $file_name = $path .'/thumbnails/'. $image;
            if(file_exists($file_name) && is_file($file_name))
                unlink($file_name);

            $file_name = $path .'/large/'. $image;
            error_log('-------------');
            error_log($file_name);
            error_log('-------------');
            if(file_exists($file_name) && is_file($file_name))
                unlink($file_name);

            $product->files->each->delete();
            $product->delete();*/
        }
        else
        {
            error_log('Not Deleting Product');
        }

        return ['status' => '1'];
    }

    public function edit_variation(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);
        return ['status' => '1', 'product' => $product];
    }

    public function get_qr_code(Request $request)
    {
        $qr = Product::getQrCode($request->input('id'), $request->input('product_id'));
        $qr['status'] = 1;
        return $qr;
    }

    public function verify_crm_data(Request $request)
    {
        $type = $request->input('type');
        $field = 'verified_'.$type;

        $data = CrmData::find($request->input('id'));

        if($data->$field == 'N')
            $set = 'Y';
        else
            $set = 'N';

        $data->$field = $set;

        if($data->first_time_updated_at == null)
            $data->first_time_updated_at = date('Y-m-d H:i:s');

        $data->verified = 'Y';

        $data->save();

        return ['status' => '1'];
    }

    public function get_states(Request $request)
    {
        $states = State::select('id', 'name', 'iso2')->where('country_id', $request->input('country_id'))->orderBy('name', 'asc')->get();

        if(count($states) > 0)
        {
            return ['status' => '1', 'data' => $states];
        }

        return ['status' => '0'];
    }

    public function set_position(Request $request)
    {
        Product::find($request->input('id'))->update(['position' => $request->input('position')]);
    }

    public function check_sku_variation(Request $request)
    {
        $sku = $request->input('sku');
        $product_id = $request->input('product_id');

        $product = Product::where('sku', $sku)->first();

        if($request->input('force'))
        {
            $product->type = 'child';
            $product->parent_id = $product_id;
            $product->save();
        }

        if($product)
        {
            if($product->type == 'child') // all ok, add to product_product table
            {
                $data['product_id'] = $product_id;
                $data['sub_product_id'] = $product->id;
                SubProduct::create($data);

                $parent = Product::find($product_id);
                Product::setProductVariationSkus($parent);

                return ['status' => '1'];
            }
            elseif($product->type == 'simple')
            {
                return ['status' => '3', 'message' => 'This SKU relates to Simple product would you like to convert this item to child and add under this variation?'];
            }
            else
            {
                return ['status' => '0', 'message' => 'This SKU relates to Simple product and cannot be added as variation.'];
            }
        }
        else
        {
            return ['status' => '2'];
        }
    }

    public function add_set_item(Request $request)
    {
        $sku = $request->input('sku');
        $search_field = $request->input('search_field');
        $product_id = $request->input('product_id');

        $product = Product::where($search_field, $sku)->where('status', 'Y')->first();

        if($product)
        {
            if($product->type != 'variation') // all ok, add to product_product table
            {
                $data['variation_id'] = $product_id;
                $data['product_id'] = $product->id;
                SetProduct::create($data);
                return ['status' => '1'];
            }
            else
            {
                return ['status' => '0', 'message' => 'This '. strtoupper($search_field) .' relates to a configurable product and cannot be added as set item.'];
            }
        }
        else
        {
            return ['status' => '0', 'message' => 'Sorry!, could not find any product matching with given '. strtoupper($search_field) .'.'];
        }
    }

    public function delete_set_item(Request $request)
    {
        $id = $request->input('id');
        SetProduct::destroy($id);
        return ['status' => 1];
    }

    public function update_set_item(Request $request)
    {
        $type = $request->input('type');
        SetProduct::find($request->input('id'))->update([$type => $request->input('value')]);
        return ['status' => 1];
    }

    public function get_customer_orders(Request $request)
    {
        $data['request'] = 'ajax';
        $data['customer_id'] = $request->input('customer_id');
        return ['status' => '1', 'data' => Customer::getCustomerOrders($data)];
    }

    public function get_variation_ref(Request $request)
    {
        $sub_product_id = $request->input('sub_product_id');
        error_log('SP: ' . $sub_product_id);
        $products = SubProduct::where('sub_product_id', $sub_product_id)->get();
        $data = '<table class="table table-striped table-hover"><tr><th class="text-left">Product Name</th><th>Action</th></tr>';
        foreach($products as $prd)
        {
            $product = Product::find($prd->product_id);
            $data .= '
            <tr><td width="80%" class="text-left">'. $product->name .'</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="'.  route('admin.product.edit.variations', $product->id)  .'" target="_blank"><i class="fa fa-pencil-alt"></i></a>
                    <a title="Edit Individual Item" class="btn btn-danger btn-sm" href="'.  route('admin.product.edit', $sub_product_id)  .'" target="_blank"><i class="fa fa-pencil-alt"></i></a>
                </td>
                </tr>
            ';
        }
        $data .= '</table>';

        return ['status' => 1, 'data' => $data];
    }

    public function add_micro_site_item(Request $request)
    {
        $sku = $request->input('sku');
        $search_field = $request->input('search_field');
        $site_id = $request->input('site_id');

        $product = Product::where($search_field, $sku)->where('status', 'Y')->first();

        if($product)
        {
            if(true || $product->type != 'variation') // all ok, add to product_product table
            {
                $data['site_id'] = $site_id;
                $data['product_id'] = $product->id;
                MicroSitesProducts::create($data);
                return ['status' => '1'];
            }
            else
            {
                return ['status' => '0', 'message' => 'This '. strtoupper($search_field) .' relates to a configurable product and cannot be added in micro site.'];
            }
        }
        else
        {
            return ['status' => '0', 'message' => 'Sorry!, could not find any product matching with given '. strtoupper($search_field) .'.'];
        }
    }

    public function sitemap_generate()
    {
        $ret = SiteMapHelper::generate();

        $text = 'Generated ' . $ret['categories'] . ' categories, '. $ret['variation_products'] .' configurable and '. $ret['simple_products'] .' simple items.';

        $date = date('M d, Y H:i:s');
        Settings::find(6)->update(['key_value' => $date]);
        Settings::find(7)->update(['key_value' => $text]);

        return ['status' => '1'];
    }

    public function update_micro_site_item(Request $request)
    {
        $type = $request->input('type');
        MicroSitesProducts::find($request->input('id'))->update([$type => $request->input('value')]);
    }

    public function delete_micro_site_item(Request $request)
    {
        $id = $request->input('id');
        MicroSitesProducts::destroy($id);
        return ['status' => 1];
    }

    public function show_followup_message(Request $request)
    {
        $message = Messages::find($request->input('id'));
        return ['status' => '1', 'subject' => $message->subject, 'message' => $message->message];
    }

    public function get_categories(Request $request)
    {
        if($request->input('business_type'))
            $business_type = $request->input('business_type');
        else
        {
            $business_type = Vendor::get_business_type($request->input('vendor_id'));
            if(!$business_type)
            {
                return ['status' => '0', 'message' => 'Store setup is pending for selected vendor, please first create store to add products.'];
            }
        }

        return ['status' => '1', 'data' => Category::getCategoriesSelect(['business_type' => $business_type])];
    }
    
    /*public function getCategories($business_type=0){

        // Fetch Category by Departmentid
            $empData['data'] = Category::orderby("name","asc")
            ->select('id','name')
            ->where('business_type',$business_type)
            ->get();

        return response()->json($empData);
    }*/
}
