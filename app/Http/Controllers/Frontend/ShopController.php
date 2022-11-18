<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\Slug;
use App\Models\Banner;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use App\Models\Redirect;
use Illuminate\Support\Str;
use App\Models\BusinessType;
use App\Models\ProductViews;
use Illuminate\Http\Request;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\UserSystemInfoHelper;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Frontend\EventsController;
use App\Models\Follow;
use DB;

/**
 * Class ShopController.
 */

class ShopController extends Controller
{
    public function index($slug) // Checking the slug type, redirection etc
    {
        // Start Check for Redirects
        $redirect = Redirect::where('request_url', $slug)->first();
        if($redirect)
        {
            return redirect($redirect->target_url, 301);
        }
        // End Check for Redirects

        $rs = Slug::where('slug', $slug)->first();
        if(isset($rs->sluggable_type))
        {
            if($rs->sluggable_type == 'App\Models\Product')
            {
                $product = Product::findOrFail($rs->sluggable_id);

                if($product->type == 'child' && $product->show_individual == 'N')
                {
                    $parent_slug = Product::getParentSlug($product->id).'#'.$product->sku;
                    return redirect($parent_slug, 301);
                }

                return $this->product($product);
            }
            elseif($rs->sluggable_type == 'App\Models\Category')
            {
                $category = Category::findOrFail($rs->sluggable_id);
                return $this->category($category);
            }
            elseif($rs->sluggable_type == 'App\Models\BusinessType')
            {
                $business_type = BusinessType::findOrFail($rs->sluggable_id);
                return $this->business_type($business_type);
            }
            elseif($rs->sluggable_type == 'App\Models\Vendor')
            {
                $vendor = Vendor::findOrFail($rs->sluggable_id);
                return $this->vendor($vendor);
            }
            elseif($rs->sluggable_type == 'App\Models\Page')
            {
                $page = Page::findOrFail($rs->sluggable_id);
                return $this->vendor_page($page);
            }
        }
        else // nothing found in Slugs table
        {
            $cat_check = Category::where('slug', $slug)->first();
            if($cat_check)
                return $this->category($cat_check);

            $prd_check = Product::where('slug', $slug)->first();
            if($prd_check)
            {
                if($prd_check->type == 'child' && $prd_check->show_individual == 'N')
                {
                    $parent_slug = Product::getParentSlug($prd_check->id).'#'.$prd_check->sku;
                    return redirect($parent_slug, 301);
                }

                return $this->product($prd_check);
            }

            $url = request()->fullUrl();

            $url = Str::replace('https://www.gervetusa.com/', '', $url);
            $url = Str::replace('https://gervetusa.com/', '', $url);
            $url_slash = Str::replace('?', '/?', $url);

            $redirect = Redirect::where('request_url', $url)->orWhere('request_url', $url.'/')->orWhere('request_url', $url_slash)->first();

            if($redirect)
            {
                return redirect($redirect->target_url, 301);
            }

            abort(404);
        }
    }

    // START CATEGORY LISTING AND DETAILS

    public function category($category)
    {
        $categories = Category::where(['parent_id' => $category->id, 'status' => 'Y'])->orderBy('position', 'asc')->orderBy('name', 'asc')->get();

        $data['breadcrumb']     = true;

        $data['breadcrumbs']    = [];

        $pcat = $category->parent_id;

        $show_bc = false;
        while($pcat)
        {
            $show_bc = true;
            $cat = Category::find($pcat);
            $pcat = $cat->parent_id;
            array_push($data['breadcrumbs'], '<a href="'. route('frontend.shop-slug', [$cat->slug]) .'">'.$cat->name.'</a>');
        }

        // $bt = BusinessType::getBusinessType($category->business_type);
        // array_push($data['breadcrumbs'], '<a href="'. route('frontend.shop-slug', [$bt->slug]) .'">'.$bt->name.'</a>');

        if($show_bc)
        {
            $data['breadcrumbs'] = array_reverse($data['breadcrumbs']);
        }

        array_push($data['breadcrumbs'], $category->name);

        if(count($categories) > 0)
        {
            $data['category'] = $category;
            $data['categories'] = $categories;

            $view = 'frontend.shop.categories';

            return view($view, compact('data'));

        }
        else
        {
            $filter['category_id'] = $category->id;
            $products = Product::getProducts($filter);
            $product_filters        = Product::getProductFilters($products->products_all);

            $data['category']               = $category;
            $data['products']               = $products;
            $data['products_categories']    = $product_filters['categories'];
            $data['products_tags']          = $product_filters['tags'];
            $data['products_prices']        = $product_filters['prices'];
            $data['listing_type']           = 'products_list';

            $view = 'frontend.shop.listing';

            return view($view, compact('data'));
        }
    }

    public function listing(Request $request) // Product Listing / Search Results
    {
        $data['breadcrumb']     = true;

        if($request->input('s') !== '') // Start Search
        {
            $filter['keywords']     = $request->input('s');
            if($request->input('category_id') != '')
                $filter['category_id'] = $request->input('category_id');

            if($request->input('price_range') != '')
                $filter['price_range'] = $request->input('price_range');

            $products               = Product::getProducts($filter);

            $product_filters        = Product::getProductFilters($products->products_all);

            $data['products']               = $products;
            $data['products_categories']    = $product_filters['categories'];
            $data['products_tags']          = $product_filters['tags'];
            $data['products_prices']          = $product_filters['prices'];
            $data['breadcrumbs']            = ['Search Results for "'. $request->input('s') .'"'];

            $data['listing_type']           = 'products_search';

            $view = 'frontend.shop.listing';

            return view($view, compact('data'));

        } // End Search
    }

    // END CATEGORY LISTING AND DETAILS

    // START PRODUCT DETAIL, AND PRODUCT RELATED FUNCTIONS / HELPERS

    public function product($product) // Product Detail
    {

        $data['product']        = Product::whereHas('vendor')->where(['id' => $product->id, 'status' => 'Y'])->first();
        
        if($data['product']){ // Check Products For Status Yes or Not;

            $data['sub_products']   = $product->childProducts()->where('status', 'Y')->orderBy('position','asc')->orderBy('name','asc')->get();
            //Product::getProducts(['parent_id' => $product->id]);
            $data['product_categories'] = $product->categories()->select('name','slug','show_prices','banner_id')->where('status', 'Y')->get();
    
            $data['images']         = $product->files()->where('type', 'images')->get();
            $data['videos']         = $product->files()->where('type', 'videos')->get();
            $data['files']          = $product->files()->where('type', 'files')->get();
            $data['counts']         = explode(",",($data['product']->related_products));

            foreach($data['counts'] as $num)
            {
                $data['related_products'][] = Product::where(['id' => $num, 'status' => 'Y'])->first();
            }
            $data['same_products'] = Product::where(['vendor_id' => $data['product']->vendor_id, 'status' => 'Y'])->where('id', '!=', $product->id)->inRandomOrder()->get()->take(3);
            $data['ratings'] = $product->reviews()->where('status', 'Y')->get();
            $data['warranty'] = Page::select('content')->where('id', 4)->value('content');
            $data['breadcrumb']     = true;
            $data['sid'] = '';
    
            if(\Request::input('s'))
            {
                $sid = Product::select('id')->where('sku', \Request::input('s'))->first();
                if(isset($sid->id))
                    $data['sid'] = $sid->id;
            }
    
            $bread_crumb = [];
            /*$slugs = explode('/',$product->categories->first->slugs->slugs->first->slug->slug); /// Farhan Fix IT
            foreach($slugs as $slug)
            {
                $cat = Category::where('slug', $slug)->first();
                $url = $cat->slugs()->first()->slug;
                $bread_crumb[] = '<a href="'. $url .'">'.$cat->name.'</a>';
            }*/
    
            $bread_crumb[] = $product->name;
    
            if(count($bread_crumb) > 0)
            {
                $data['breadcrumbs'] = $bread_crumb;
            }
    
            $data['recommended_products'] = Product::getRecommendedProducts($product, $data['sub_products']);
            $promos = Coupon::getActiveCoupons();
    
            $data['promos'] = $promos;
    
            $data['free_shipping'] = Coupon::getFreeShipping();
    
            // Banners on Product
            $banner = false;
            if($product->banner_id > 0)
            {
                $banner = Banner::getBanner($product->banner_id);
            }
            if(!$banner)
            {
                $banner_id = null;
                foreach($data['product_categories'] as $pc)
                {
                    if($pc->banner_id > 0)
                        $banner_id = $pc->banner_id;
                }
    
                if($banner_id > 0)
                {
                    $banner = Banner::getBanner($banner_id);
                }
            }
            $data['banner'] = $banner;

            $getip = UserSystemInfoHelper::get_ip();
            $getbrowser = UserSystemInfoHelper::get_browsers();
            $getdevice = UserSystemInfoHelper::get_device();
            $getos = UserSystemInfoHelper::get_os();
            
            $customer_id = Auth::user() == null ? NULL : Auth::user()->id;

            if($customer_id){
                $data['productViews'][] = ([
                    'product_id' => $data['product']->id,
                    'vendor_id' => $data['product']->vendor_id,
                    'customer_id' => $customer_id,
                    'type' => 'view',
                    'section' => "Product Detail Page",
                    'ip_address' => $getip,
                    'borwser' => $getbrowser,
                    'operating_system' => $getos,
                    'user_agent' => $getdevice,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }else{
                $data['productViews'][] = ([
                    'product_id' => $data['product']->id,
                    'vendor_id' => $data['product']->vendor_id,
                    'type' => 'view',
                    'section' => "Product Detail Page",
                    'ip_address' => $getip,
                    'borwser' => $getbrowser,
                    'operating_system' => $getos,
                    'user_agent' => $getdevice,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            
            ProductViews::insert($data['productViews']);
            $view = 'frontend.shop.details';
            // Chat window
            $chat_resp = Vendor::find($product->vendor_id);
            $data['chat_data'] = null;
            $data['vendor_id'] = $product->vendor_id;
            if(auth()->user())
            {
                $ses_user_id = auth()->user()->id;
                $data['chat_data'] = EventsController::chat_setup(['chat_resp' => $chat_resp, 'ses_user_id' => $ses_user_id, 'chat_sender_user_type' => 'customer']);
            }
            // End Chat window
            return view($view, compact('data'));
        }else{
            return redirect('/');
        }
    }

    public function save_review(Request $request)
    {
        $data = $request->all();
        Review::create($data);
        
        return ['status' => '1', 'message' => 'Thank you for your feedback, we have received your comments.'];
    }

    public function viewed_products(Request $request)
    {
        $data = $request->data;
        shuffle($data); 
        $viewed_products = Product::with('vendor')->whereIn('id', $data)->get();

        $csrf_token = csrf_token();

        $url = url('dashboard/wishlist/store');

        return response()->json([
            'status'=>200,
            'message' => "success",
            'data' => $viewed_products,
            'csrf_token' => $csrf_token,
            'url' => $url,
        ]);
    }

    public function modal_products(Request $request)
    {
        // dd($request->data);
        $id = $request->data;
        $data = Product::with('vendor')->where(['id' => $id, 'status' => 'Y'])->first();
        $path = 'products/images/medium/';
        
        if($data){
            $data['sub_products']   = $data->childProducts()->orderBy('position','asc')->orderBy('name','asc')->get();
            $data['images']         = $data->files()->where('type', 'images')->get();
            $img_url = [];
            if($data->image != ''){
                if($data->type == 'variation'){
                    if($data['images']->count() > 1 || $data['sub_products']->count() > 0){
                        foreach($data['images'] as $image){
                            if($image->name != ''){
                                $img_url[] = $image->name != '' ? (Storage::disk('ds3')->exists($path.$image->name) ? Storage::disk('ds3')->url($path.$image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                            }
                        }
                    }
                    foreach($data['sub_products'] as $sub_product){
                        $sp_images = $sub_product->files()->where('type', 'images')->get();
                        foreach($sp_images as $image){
                            if($image){
                                $img_url[] =  $image->name != '' ? (Storage::disk('ds3')->exists($path.$image->name) ? Storage::disk('ds3')->url($path.$image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                            }
                        }
                    }
                }else{
                    foreach($data['images'] as $image){
                        $img_url[] =  $image->name != '' ? (Storage::disk('ds3')->exists($path.$image->name) ? Storage::disk('ds3')->url($path.$image->name) : 'https://via.placeholder.com/400x400.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                    }
                }
            }
        }

        $csrf_token = csrf_token();

        return response()->json([
            'status'=>200,
            'message' => "success",
            'data' => $data,
            'csrf_token' => $csrf_token,
            'img_url' => $img_url,
        ]);
    }

    // END PRODUCT DETAIL, AND PRODUCT RELATED FUNCTIONS / HELPERS

    // START BUSINESS TYPE AND IT'S RELATED FUNCTIONS / HELPERS

    public function business_type($business_type)
    {
        $data['business-type']      = $business_type;

        $data['main-categories']    = Category::getLeftMenuCategories(['parent_id' => 0, 'business_type' => $business_type->id, 'limit' => 30]);
        $data['hot-products']       = Product::whereHas('vendor')->where(['hot' => 'Y', 'business_type' => $business_type->id, 'status' => 'Y'])->inRandomOrder()->limit(10)->get();
        $data['list-products']      = Product::whereHas('vendor')->where(['business_type' => $business_type->id, 'status' => 'Y'])->inRandomOrder()->limit(300)->paginate(12);

        $data['breadcrumb']         = true;
        $data['breadcrumbs']        = [$business_type->name];

        $view = 'frontend.shop.business-type';

        return view($view, compact('data'));
    }

    // START BUSINESS TYPE AND IT'S RELATED FUNCTIONS / HELPERS


    // START VENDOR AND IT'S RELATED FUNCTIONS / HELPERS

    public function vendor($vendor)
    {
        $data['vendor']      = $vendor;
        
        $data['banner']             = Banner::where(['user_id' => $vendor->user, 'status' => 'Y'])->get();
        $data['banner_header']      = Banner::where(['user_id' => $vendor->user, 'area_id' => 15, 'status' => 'Y'])->first();
        $data['email']              = User::select('email')->where('id', $vendor->user)->first();
        $data['main-categories']    = Category::getLeftMenuCategories(['parent_id' => 0, 'business_type' => $vendor->business_type, 'limit' => 30]);
        $data['hot-products']       = Product::whereHas('vendor')->where(['hot' => 'Y', 'vendor_id' => $vendor->id, 'status' => 'Y'])->inRandomOrder()->limit(300)->get();
        $data['list-products']      = Product::whereHas('vendor')->where(['vendor_id' => $vendor->id, 'status' => 'Y'])->inRandomOrder()->limit(300)->paginate(12);
        $data['page_list']          = Page::where('user_id', $vendor->user)->get();
        $data['hide_slider']        = true;
        
        // Chat window
        $chat_resp = $vendor;
        $data['chat_data'] = null;
        $data['vendor_id'] = $vendor->id;
        if(auth()->user())
        {
            $ses_user_id = auth()->user()->id;
            $data['chat_data'] = EventsController::chat_setup(['chat_resp' => $chat_resp, 'ses_user_id' => $ses_user_id,  'chat_sender_user_type' => 'customer']);
        }

        $reviews = Review::whereHas('product', function ($query) use($vendor) {
            $query->where('vendor_id','=',$vendor->id);
        })->where([
            ['rating','!=',0],
            ['status','=','Y']
        ])->select(DB::raw('SUM(rating)/COUNT(*) as Rating'))->first();
        $data['ratingPercentage'] = ($reviews->Rating / 5) * 100;
        // End Chat window
        $data['followers'] = Follow::where('vendor_id', $vendor->id)->count();
        if($data['vendor']->activated_account =='N'){
            $view = 'errors.404';
        }else{
            $view = 'frontend.shop.vendor';
        }
        
        return view($view, compact('data'));
    }

    public function listings(Request $request) // Product Listing / Search Results
    {
        $data['hide_slider'] = true;

        if($request->input('s') != '') // Start Search
        {
            $data['listing_type'] = 'products_list';
            $data['search'] = $request->s;
            $data['banner'] = Banner::where(['user_id' => $request->id, 'status' => 'Y'])->get();
            $data['banner_header'] = Banner::where(['user_id' => $request->id, 'area_id' => 15, 'status' => 'Y'])->first();
            $data['page_list'] = Page::where('user_id', $request->id)->get();
            $data['vendor'] = Vendor::where('user', $request->id )->first();
            $data['list-products'] = Product::whereHas('vendor')->where('name','LIKE','%'.$request->s.'%')->where(['vendor_id'=> $data['vendor']->id, 'status' => 'Y'])->paginate(40);

            return view('frontend.shop.listings', compact('data'));

        } else {
            return redirect()->back();
        }
    }
}
