<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductViews;
use App\Models\Redirect;
use App\Models\Slug;
use App\Models\Vendor;
use App\Models\Banner;
use App\Models\Coupon;
use Illuminate\Support\Str;
use App\Http\Controllers\Frontend\EventsController;
use App\Helpers\UserSystemInfoHelper;
use App\Models\Follow;
use App\Models\Review;
use App\Domains\Auth\Models\User;
use App\Models\OrderItems;
use App\Models\ProductAnswer;
use App\Models\ProductQuestion;
use App\Models\ReviewImage;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index($slug)
    {    
        // Start Check for Redirects
        $redirect = Redirect::where('request_url', $slug)->first();
        if($redirect)
        {
            return response()->json(['target_url' => $redirect->target_url], 301);
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
                    return response()->json(['target_url' => $parent_slug], 301);
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
                    return response()->json(['target_url' => $parent_slug], 301);
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
                return response()->json(['target_url' => $redirect->target_url], 301);
            }

            return response()->json(['error' => '404'], 404);
        }
    }

    public function product($product) // Product Detail
    {   
        $data['product'] = Product::where(['id' => $product->id, 'status' => 'Y'])->first();
        
        if($data['product']){ // Check Products For Status Yes or Not;

            $data['sub_products']   = $product->childProducts()->with('files')->orderBy('position','asc')->orderBy('name','asc')->get();//Product::getProducts(['parent_id' => $product->id]);
            $data['product_categories'] = $product->categories()->select('name','slug','show_prices','banner_id')->where('status', 'Y')->get();
    
            $data['images']         = $product->files()->where('type', 'images')->get();
            $data['videos']         = $product->files()->where('type', 'videos')->get();
            $data['files']          = $product->files()->where('type', 'files')->get();
            $data['counts']         = explode(",",($data['product']->related_products));

            foreach($data['counts'] as $num)
            {
                $data['related_products'][] = Product::where(['id' => $num, 'status' => 'Y'])->first();
            }
            $data['same_products'] = Product::where(['vendor_id' => $data['product']->vendor_id, 'status' => 'Y'])->inRandomOrder()->get()->take(3);
            $data['ratings'] = Review::with('product')->with('customer')->get();

            //Calculating product rating
            $rating_count=0;
            foreach($data['ratings'] as $rating){
                $rating_count += $rating->rating;
                $data['product_rating'] = $rating_count/ $data['ratings']->count();
                $data['product_rating'] =  round($data['product_rating']);
            }

            //getting total sold units for this product
            $data['unit_sold'] = DB::table('orders')
            ->join('orderitems', 'orderitems.order_id', '=', 'orders.id')
            ->where('orderitems.product_id', $data['product']->id)
            ->where('orders.order_status', 7)
            ->select(DB::raw('SUM(orderitems.quantity) as quantity'))->count();

            //review this product
            $data['product_for_review'] = Product::where(['vendor_id' => $data['product']->vendor_id, 'status' => 'Y'])->where('featured' ,'Y')->inRandomOrder()->get()->take(1);

            //rating segrigation for the product
            $total_stars = ['1', '2', '3', '4', '5'];
            for ($i = 1; $i <= count($total_stars) ; $i++) {
            $data['rating_segrigation'][$i] =Review::where('product_id', $data['product']->id)->where('rating', $i)->count();
            }

            //product related questions answers
            $data['product_questions']['question'] = ProductQuestion::with('answers')->where('product_id', $data['product']->id)->get();

            // dd($data['product_questions']['question'][0]['answers']);
            if(isset($data['product_questions']['question']) && isset($data['product_questions']['question'][0])){
                $data['product_questions']['count'] = count($data['product_questions']['question'][0]['answers']);
            }

            //vendor rating
            $data['vendor_rating'] = $data['product']->vendor->vendor_rating($data['product']->vendor_id);
            // $data['vendor_response_rate'] = ProductQuestion::with('answers')->where('vendor_id', $data['product']->vendor_id)->get();

            //review with images
            $data['review_with_images'] =ReviewImage::where('product_id', $data['product']->id)->get();

            //related category products based on shopping trend
            $product_category = $data['product']->categories->first();
            $categories_list = Category::where('parent_id' ,$product_category->parent_id)->get();

            foreach($categories_list as $category){
                $data['products_shopping_trend'][] = Product::where('parent_id' ,$category->id)->first();
            }

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
            // Chat window
            $chat_resp = Vendor::find($product->vendor_id);
            $data['chat_data'] = null;
            $data['vendor'] = $product->vendor;
            $data['vendor']['total_followers'] = Follow::where('vendor_id', $product->vendor->id)->count();
            $data['vendor']['rating'] = Vendor::vendor_rating($product->vendor->id);
            if(auth()->user())
            {
                $ses_user_id = auth()->user()->id;
                $data['chat_data'] = EventsController::chat_setup(['chat_resp' => $chat_resp, 'ses_user_id' => $ses_user_id, 'chat_sender_user_type' => 'customer']);
            }
            // End Chat window
            $data['page_type'] = 'Product_detail';
            return response()->json($data, 200);
        }else{
            return response()->json(['target_url' => '/'], 200);
        }
    }

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
            array_push($data['breadcrumbs'], (array)['name' => $cat->name,'link' => $cat->slug]);
        }

        // $bt = BusinessType::getBusinessType($category->business_type);

        // array_push($data['breadcrumbs'], '<a href="'. route('frontend.shop-slug', [$bt->slug]) .'">'.$bt->name.'</a>');

        if($show_bc)
        {
            $data['breadcrumbs'] = array_reverse($data['breadcrumbs']);
        }

        array_push($data['breadcrumbs'], ['name' => $category->name]);

        if(count($categories) > 0)
        {
            $data['category'] = $category;
            $data['categories'] = $categories;
            $data['page_type'] = 'Shop_Categories';
            return response()->json($data, 200);
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
            $data['brands_list']            = Vendor::whereHas('products', function($q) use($filter) {
                $q->whereIn('id', function ($query) use ($filter) {
                    $query->select('product_id')->from('category_product')->where('category_id', $filter['category_id']);
                });
            })->orderBy('name', 'ASC')->pluck('name', 'id');
            $data['categories_list']        = Category::whereHas('products', function($q) use($data) {
                $q->whereIn('vendor_id', array_keys($data['brands_list']->toArray()));
            })->orderBy('name', 'ASC')->pluck('name', 'id');
            $data['page_type']              = 'Products_list';
            return response()->json($data, 200);
        }
    }

    public function business_type($business_type)
    {
        $data['business-type']      = $business_type;

        $data['main-categories']    = Category::getLeftMenuCategories(['parent_id' => 0, 'business_type' => $business_type->id, 'limit' => 30]);
        $data['hot-products']       = Product::where(['hot' => 'Y', 'business_type' => $business_type->id, 'status' => 'Y'])->inRandomOrder()->limit(10)->get();
        $data['list-products']      = Product::where(['business_type' => $business_type->id, 'status' => 'Y'])->inRandomOrder()->limit(300)->paginate(12);

        $data['breadcrumb']         = true;
        $data['breadcrumbs']        = [$business_type->name];
        $data['page_type']           = 'Business_types';
        return response()->json($data, 200);
    }

    public function vendor($vendor)
    {
        $data['vendor']      = $vendor;
        
        $data['banner']             = Banner::where(['user_id' => $vendor->user, 'status' => 'Y'])->get();
        $data['banner_header']      = Banner::where(['user_id' => $vendor->user, 'area_id' => 15, 'status' => 'Y'])->first();
        $data['email']              = User::select('email')->where('id', $vendor->user)->first();
        $data['main-categories']    = Category::getLeftMenuCategories(['parent_id' => 0, 'business_type' => $vendor->business_type, 'limit' => 30]);
        $data['hot-products']       = Product::where(['hot' => 'Y', 'vendor_id' => $vendor->id, 'status' => 'Y'])->inRandomOrder()->limit(300)->get();
        $data['list-products']      = Product::where(['vendor_id' => $vendor->id, 'status' => 'Y'])->inRandomOrder()->limit(300)->paginate(12);
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
        $data['page_type'] = 'Shop_Vendor';
        return response()->json($data, 200);
    }
}
