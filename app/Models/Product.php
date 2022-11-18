<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    //protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id', 'business_type', 'parent_id', 'type', 'name', 'slug', 'sku', 'sku_stripped', 'sku_variations', 'wholesale_price', 'price', 'price_catalog',
        'price_discounted', 'price_discounted_start', 'price_discounted_end', 'in_stock', 'check_quantity', 'quantity',
        'ship_type', 'weight', 'taxable', 'short_description', 'full_description', 'additional_information', 'pdf_link', 'video_link', 'video_id',
        'meta_title', 'meta_keywords', 'meta_description',
        'related_products','upsell_products','cross_sell_products','tags','competitor_skus','visibility','featured','hot','new', 'deals_of_the_day','position',
        'status', 'image', 'views', 'sales', 'banner_id', 'is_set', 'show_individual', 'link_type', 'level' ,'caption', 'caption_type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The attribute types will be define here, it's required to return data to API in correct types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
    ];


    public static $visibility = [
        '1' => 'Catalog, Search',
        '2' => 'Catalog',
        '3' => 'Search',
        /*'4' => 'Not Visible Individually'*/
    ];

    public static $types = [
        'simple' => 'Simple Products',
        'variation' => 'Product with Variations',
        'child' => 'Child Products',
    ];

    public static $additional_info = [
        '1' => 'Item Type',
        '2' => 'Therapeutic Specialty',
        '3' => 'Instrument Length',
        '4' => 'Tip Size/Sr No',
        '5' => 'Curvature',
        '6' => 'Handle Type',
        '7' => 'Material',
        '8' => 'Material (Secondary)',
        '9' => 'Usage',
        '10' => 'Sterility',
        '11' => 'Grade',
        '12' => 'Unit of Measure',
        '13' => 'Trademark'
    ];

    public static $captions = [
        'Select the size and color you want to order' => 'Select the size and color you want to order',
        'Select the size you want to order' => 'Select the size you want to order',
        'Select the color you want to order' => 'Select the color you want to order',
    ];

    /*public static function boot()
    {
        parent::boot();

        self::created(function($model){
            SiteMapHelper::generate();
        });

        self::updated(function($model){
            SiteMapHelper::generate();
        });

        self::deleted(function($model){
            SiteMapHelper::generate();
        });
    }*/

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function slugs()
    {
        return $this->morphMany('App\Models\Slug', 'sluggable');
    }

    public function files()
    {
        return $this->morphMany('App\Models\Files', 'fileable');
    }

    public function pdfs()
    {
        return $this->morphMany('App\Models\Files', 'fileable')->where('type', '=', 'files');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function video()
    {
        return $this->belongsTo('App\Models\Video');
    }

    public function ordersItems()
    {
        return $this->hasMany('App\Models\OrderItems');
    }

    public function orders_Items_count()
    {
        return $this->hasMany('App\Models\OrderItems')->orderBy('');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public static function getProducts(array $filter = [])
    {
        $query = Product::where('id', '!=', '')->where('status' , 'Y');

        // dd($filter);
        if (isset($filter['parent_id'])) {
            $query->where('parent_id', $filter['parent_id']);
        }
        else
        {
            if(!isset($filter['skus']) && !isset($filter['admin']))
            {
                $query->where(function($query) use ($filter) {

                    $query->orWhere('type', '!=', 'child');
                    $query->orWhere('show_individual', '=', 'Y');

                });
                //$query->where('type', '!=', 'child')->orWhere('show_individual', '=', 'Y');
            }
        }

        if (!isset($filter['admin'])) // to show all items on admin end
        {
            $query->where(['status' => 1]);

            $query->where(function ($query) use ($filter) {

                $query->orWhere('visibility', '=', '1');

                if (isset($filter['keywords']) && $filter['keywords'] != '') {
                    $query->orWhere('visibility', '=', '3');
                } else {
                    $query->orWhere('visibility', '=', '2');
                }
            });
        }

        if (isset($filter['not'])) {
            $query->where('id', '!=', $filter['not']);
        }

        if (isset($filter['find_ids']) && is_array($filter['find_ids']) && count($filter['find_ids']) > 0) {
            $query->whereIn('id', $filter['find_ids']);
        }

        if (isset($filter['category_slug'])) {
            $category = Category::select('id')->where('slug', $filter['category_slug'])->first();
            $filter['category_id'] = $category->id;
        }

        if (isset($filter['category_id']) && $filter['category_id'] > 0) {
            $query->whereIn('id', function ($query) use ($filter) {
                $query->select('product_id')->from('category_product')->where('category_id', $filter['category_id']);
            });

            /*$query->whereHas('categories', function($query) use ($filter) {
                $query->where('id', $filter['category_id']);
            });*/
        }

        if (isset($filter['category_ids']) && count($filter['category_ids']) > 0) {
            $query->whereIn('id', function ($query) use ($filter) {
                $query->select('product_id')->from('category_product')->whereIn('category_id', $filter['category_ids']);
            });
        }

        if (isset($filter['visibility'])) // for admin purpose
        {
            $query->where(['visibility' => $filter['visibility']]);
        }

        if (isset($filter['business_type'])) {
            $query->where(['business_type' => $filter['business_type']]);
        }

        if (isset($filter['vendor_id'])) {
            $query->where(['vendor_id' => $filter['vendor_id']]);
        }

        if (isset($filter['brand_ids']) && count($filter['brand_ids']) > 0) {
            $query->whereIn('vendor_id', $filter['brand_ids']);
        }

        if (isset($filter['type'])) {
            $query->where(['type' => $filter['type']]);
        }

        if (isset($filter['featured'])) {
            $query->with('reviews')->where(['featured' => $filter['featured']]);
        }

        if (isset($filter['hot'])) {
            $query->with('reviews')->where(['hot' => $filter['hot']]);
        }

        if (isset($filter['new'])) {
            $query->with('reviews')->where(['new' => $filter['new']]);
        }

        if (isset($filter['deals_of_the_day'])) {
            $query->with('reviews')->where(['deals_of_the_day' => $filter['deals_of_the_day']]);
        }

        if (isset($filter['related_products'])) {
            $query->with('reviews')->where(['related_products' => $filter['related_products']]);
        }

        if (isset($filter['status'])) {
            $query->with('reviews')->where(['status' => $filter['status']]);
        }

        if (isset($filter['name'])) {
            $query->where('name', 'like', '%' . $filter['name'] . '%');
        }

        if (isset($filter['sku'])) {
            $query->where(function ($query) use ($filter) {
                $query->orWhere('sku', 'like', '%' . $filter['sku'] . '%');
                $query->orWhere('sku_stripped', 'like', '%' . $filter['sku'] . '%');
            });
        }

        if (isset($filter['skus']) && is_array($filter['skus']) && count($filter['skus']) > 0) {
            $query->whereIn('sku', $filter['skus']);
        }

        if (isset($filter['keywords'])) {
            $keywords = $filter['keywords'];
            $singular = Str::singular($keywords);
            $plural = Str::plural($keywords);
            $search = [];
            array_push($search, $keywords);
            if ($singular != $keywords)
                array_push($search, $singular);
            if ($plural != $keywords)
                array_push($search, $plural);

            $query->where(function ($query) use ($search) {
                foreach ($search as $keyword) {
                    $query->orWhere('name', 'like', '%' . $keyword . '%');
                    $query->orWhere('sku', 'like', '%' . $keyword . '%');
                    $query->orWhere('sku_stripped', 'like', '%' . $keyword . '%');
                    $query->orWhere('sku_variations', 'like', '%' . $keyword . '%');
                    $query->orWhere('tags', 'like', '%' . $keyword . '%');
                    $query->orWhere('competitor_skus', 'like', '%' . $keyword . '%');
                    $query->orWhere('short_description', 'like', '%' . $keyword . '%');
                    //$query->orWhere('full_description', 'like', '%' . $keyword . '%');
                    //$query->orWhere('meta_title', 'like', '%' . $keyword . '%');
                    //$query->orWhere('meta_keywords', 'like', '%' . $keyword . '%');
                    //$query->orWhere('meta_description', 'like', '%' . $keyword . '%');
                }
            });
        }

        if (isset($filter['terms'])) {
            $query->where(function ($query) use ($filter) {
                foreach ($filter['terms'] as $term) {

                    $query->orWhere('name', 'like', '%' . $term . '%');
                    $query->orWhere('sku', 'like', '%' . $term . '%');
                    $query->orWhere('sku_stripped', 'like', '%' . $term . '%');
                    $query->orWhere('sku_variations', 'like', '%' . $term . '%');
                    $query->orWhere('tags', 'like', '%' . $term . '%');
                    $query->orWhere('competitor_skus', 'like', '%' . $term . '%');
                    $query->orWhere('short_description', 'like', '%' . $term . '%');
                    $query->orWhere('full_description', 'like', '%' . $term . '%');
                    $query->orWhere('meta_title', 'like', '%' . $term . '%');
                    $query->orWhere('meta_keywords', 'like', '%' . $term . '%');
                    $query->orWhere('meta_description', 'like', '%' . $term . '%');
                }
            });
        }

        if (isset($filter['price_range'])) {
            $pr = Str::replace('$', '', $filter['price_range']);
            $pr = explode('-', $pr);
            $pr_min = trim($pr[0]);
            if($pr_min)
            {
                $query->where('price', '>=', $pr_min);
            }
            if(count($pr) == 2)
            {
                $pr_max = trim($pr[1]);
                $query->where('price', '<=', $pr_max);
            }
        }

        if (!isset($filter['limit'])) {
            $filter['limit'] = 12;
        }

        $best_selling_query = '';
        if (isset($filter['best_selling'])) {
            $best_selling_query = ', (SELECT count(*) FROM orderitems WHERE orderitems.product_id = products.id) as product_counts';
        }
        $result_all = $query->selectRaw('*, CAST((SELECT SUM(reviews.rating) FROM reviews where reviews.product_id=products.id) / (SELECT COUNT(*) FROM reviews where reviews.product_id=products.id) AS UNSIGNED) as current_rating' . $best_selling_query);

        if (isset($filter['order_by'])) {
            if ($filter['order_by'] == 'rand') {
                $query->inRandomOrder();
            } else {
                $order = isset($filter['order']) ? $filter['order'] : 'asc';
                $query->orderBy($filter['order_by'], $order);
            }
        }
        else if (isset($filter['best_selling'])) {
            $query->orderBy(DB::raw('product_counts'), 'desc');
        }
        else {
            $query->orderBy('position', 'asc');
            $query->orderBy('views', 'desc');
            $query->orderBy('id', 'desc');
        }

        /*if(isset($filter['find_ids']))
        {
            $result = $query->toSql();
            error_log($result);
            error_log(json_encode($query->getBindings()));
            die;
        }*/
        
        $query->get();
        $result = $query->paginate($filter['limit']);
        $result->products_all = $result_all;

        return $result;
    }

    public static function getProductFilters($products)
    {
        $category_array = [];
        $tags = [];
        $price = [];
        foreach ($products as $product) {
            foreach ($product->categories as $category) {
                if (trim($category->name) == null)
                    continue;

                $cat_id = $category->id;

                if (array_key_exists($cat_id, $category_array)) {
                    $count = $category_array[$cat_id]['count'];
                    $category_array[$cat_id]['count'] = $count + 1;
                } else {
                    $array = ['id' => $cat_id, 'name' => $category->name, 'count' => 1];
                    $category_array[$cat_id] = $array;
                }
            }

            if (trim($product->tags) != null) {
                $tag = explode(',', $product->tags);
                foreach ($tag as $t) {
                    array_push($tags, $t);
                }
            }

            if ($product->price > 0)
                array_push($price, $product->price);
        }

        if (count($tags) > 0) {
            $tags = array_unique($tags);
        }

        if (count($price) > 0) {
            $min = round(min($price));
            $max = ceil(max($price));

            $prices = ['min' => $min, 'max' => $max, 'show' => true];

            if ($min == $max)
                $prices['show'] = false;
        } else {
            $prices = ['show' => false];
        }

        return ['categories' => $category_array, 'tags' => $tags, 'prices' => $prices];
    }

    public static function getSubItemsCount($id)
    {
        $product = Product::find($id);
        $sub_products = $product->childProducts; //Product::where('parent_id', $id)->get();
        return $sub_products->count();
    }

    public static function getSubItemsPriceRange($id)
    {
        $sub_products = Product::find($id)->childProducts;
        $min = $sub_products->min('price_catalog');
        $max = $sub_products->max('price_catalog');
        if($max - $min == 0)
        {
            return '$' . number_format($max,2);
        }
        return '$' . number_format($min,2) . ' - $' . number_format($max,2);
    }

    public static function productBlock($product, $type = 'small', $show_sub = false, $force_link = null)
    {
        $name = $product->name;
        if (strlen(trim($product->short_description)) > 100)
            $description = strip_tags(substr(trim($product->short_description), 0, 100)) . ' ...';
        else
            $description = strip_tags(trim($product->short_description));

        /*if(isset($product->slugs()->first()->slug))
            $url = $product->slugs()->first()->slug;
        else
            $url = '#';*/

        $alt = Str::replace('"', ' inch', $name);

        $url = $product->slug;

        if($product->type == 'child' && $product->show_individual == 'N')
        {
            if($force_link)
                $url = $force_link.'#'.$product->sku;
            else
                $url = self::getParentSlug($product->id).'#'.$product->sku;
        }
        else if($product->show_individual == 'Y' && $product->link_type == 'variation')
        {
            $url = self::getParentSlug($product->id).'#'.$product->sku;
        }

        $product->url = $url;

        $img_path = 'products/images/thumbnails/'.$product->image;
        $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';

        $product->on_sale = false;

        $info = self::getPriceText($product);
        extract($info);

        $caption = '';

        if ($product->new == 'Y')
            $caption = 'New!';
        else if ($product->hot == 'Y')
            $caption = 'Hot!';
        else if ($product->featured == 'Y')
            $caption = 'Featured!';
        else if ($product->deals_of_the_day == 'Y')
            $caption = 'Deals Of The Day!';
        else if ($product->related_products == 'Y')
            $caption = 'Deals Of The Day!';

        if ($product->on_sale)
            $caption = 'Sale!';

        if ($caption != '')
            $caption = $caption ? '<div class="ps-product__badge"><span class="onsale-badge">' . $caption . '</span></div>' : '';

        if($product->type != 'variation'){
            $btn_link = '<button type="submit" class="btn_add_to_cart" aria-label="Add To Cart" data-placement="top" onclick="this.form.cmd.value=\'add2cart\';" title="Add To Cart"><i class="icon-bag2"></i></button>';
        }else{
            $btn_link = '<a href="' . $url . '" data-placement="top" aria-label="Read More" title="Read More"><i class="icon-bag2"></i></a>';
        }

        if(Auth::user()){
            $wishlist_frm = '<form class="frm_add_to_wishlist" method="post" action="'.url('dashboard/wishlist/store').'">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="product_id" class="product_id" value="'. $product->id .'" />
                                <li><button type="submit" data-placement="top" aria-label="Add to Wishlist" title="Add to Wishlist"><i class="icon-heart"></i></button></li>
                            </form>';
        } else {
            $wishlist_frm = '<form method="get" action="/login">
                                <li><button type="submit" data-placement="top" aria-label="Add to Wishlist" title="Add to Wishlist"><i class="icon-heart"></i></button></li>
                            </form>';
        }

        // $store = Vendor::get_store_name_slug($product->vendor_id);

        $html = '';
        //$html = '<form class="frm_add_to_cart" method="post" action="'.url('cart').'" style="display:contents;">';
        //$html .= '<input type="hidden" name="_token" value="' . csrf_token() . '" />';

        if($type == 'vo-hot-carousel' || $type == 'list-products')
        {
            if($type == 'list-products')
                $html .= '<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">';

            $html .= '<div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="' . $url . ' "  aria-label="Product Link"><img class="lazyload" data-src="' .asset( $path ). '" alt="' . $alt . '" width="189" ></a>
                            ' . $caption . '
                            <ul class="ps-product__actions">
                                <form class="frm_add_to_cart" method="post" action="cart">
                                    <input type="hidden" name="_token" value="'.csrf_token().'" />
                                    <input type="hidden" name="product_id" class="product_id" value="'. $product->id .'" />
                                    <li>'. $btn_link .'</li>
                                    <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                </form>
                                <li><button data-placement="top" aria-label="Quick View" title="Quick View" data-toggle="modal" data-target="#product-quickview" onclick="productQuickViews('.$product->id.')"><i class="icon-eye"></i></button></li>
                                '.$wishlist_frm.'
                                <form method="post" action="comparison-search">
                                    <input type="hidden" name="_token" value="'.csrf_token().'" />
                                    <input type="hidden" name="name" value="'. $product->name .'" />
                                    <li><button type="submit" aria-label="Compare" data-placement="top" title="Compare" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </form>   
                            </ul>
                        </div>
                        <div class="ps-product__container">
                            <a class="ps-product__vendor" href="'. $product->vendor['slug'] .'">'. $product->vendor['name'] .'</a>
                            <div class="ps-product_info__content"><a class="ps-product__title" href="product-default.html"  aria-label="Product Title">'. $name .'</a>
                                <p class="ps-product__price">'.  $price_text . '</p>
                            </div>
                        </div>
                    </div>';

            if($type == 'list-products')
                $html .= '</div>';
        } elseif ($type == 'list-products-wide') {
            $rating = Review::where(['status'=> 'Y','product_id'=> $product->id])->get();
            $ratingcount = round($rating->avg('rating'));
            $html .= '<div class="ps-product ps-product--wide">
                        <div class="ps-product__thumbnail"><a href="' . $url . '"><img class="lazyload" data-src="' .asset( $path ). '" alt="' . $alt . '"></a>
                        </div>
                        <div class="ps-product__container">
                            <div class="ps-product__content"><a class="ps-product__title" href="' . $url . '">'. $product->name .'</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">';
                                    for($i=1; $i <= $ratingcount; $i++){
                                        $html .= '<option value="1">'.$i.'</option>';
                                    }
                                    for($i=5; $i>$ratingcount; $i--){
                                        $html .= '<option value="0">'.$i.'</option>';
                                        $html .= '<option value="2">'.$i.'</option>';
                                    }
                                    $html .= '</select><span>01</span>
                                </div>
                                <p class="ps-product__vendor">Sold by: <a href="'. $product->vendor->slug .'"> '. $product->vendor->name .'</a></p>
                                <p class="ps-product__desc">'. $product->short_description .'</p>
                            </div>
                            <div class="ps-product__shopping">
                                <p class="ps-product__price">'.  $price_text . '</p>
                                <ul class="ps-product__actions">
                                    <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                    <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>';
            $html .= '<input type="hidden" name="ajax" value="1" />';
        } elseif ($type == 'small') {
            $html .= '<div class="single-slide pm-product">
                        <div class="image">
                            <a href="' . $url . '" aria-label="Product Link">
                                <div class="product-image-container  text-center"><img data-src="' .$path. '" alt="' . $alt . '" class="img-fluid" width="170" height="170" srcset="' . $path . ' 500w, ' . $path . ' 1000w, ' . $path . ' 1500w"></div>
                            </a>
                            ' . $caption . '
                        </div>
                        <div class="content">
                            <h3>' . $name . '</h3>
                            <div class="price text-red">
                                ' . $price_text . '
                            </div>
                            <div class="btn-block">
                                ' . $cart_link . '
                            </div>
                        </div>
                    </div>';
            $html .= '<input type="hidden" name="ajax" value="1" />';
        } elseif($type == 'bogo') {
            $html .= '<div class="ps-product">
            <div class="ps-product__thumbnail"><a href="' . route('frontend.shop-slug', [$url]) . '" aria-label="Product Link"><img class="lazyload" data-src="' .$path. '" alt="' . $alt . '" /></a>
                            <div class="ps-product__badge">' . $caption . '</div>
                            <ul class="ps-product__actions">
                                <li>'. $btn_link .'</li>
                                <li><a href="#" data-placement="top" aria-label="Quick View" title="Quick View" data-toggle="modal" data-target="#product-quickview" onclick="productQuickViews('.$product->id.')"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-placement="top" aria-label="Add to Wishlist" title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="#" aria-label="Global Office">Global Office</a>
                            <div class="ps-product__content"><a class="ps-product__title" href="' . route('frontend.shop-slug', [$url]) . '" aria-label="Product Link">' . $name . '</a>
                                <p class="ps-product__price">' . $price_text . '</p>
                            </div>
                            <div class="ps-product__content hover"><a class="ps-product__title" href="' . route('frontend.shop-slug', [$url]) . '" aria-label="Product Link">' . $name . '</a>
                                <p class="ps-product__price">' . $price_text . '</p>
                            </div>
                        </div>
                    </div>';
                    $html .= '<input type="hidden" name="ajax" value="1" />';
        } elseif($type == 'hot_products') {
            $html.= '<div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="' . $url . '" aria-label="Product Link"><img class="lazyload" data-src="' .$path. '" alt="' . $alt . '" width="189" height="189"></a>
                            <div class="ps-product__badge">' . $caption . '</div>
                            <ul class="ps-product__actions">
                            <form class="frm_add_to_cart" method="post" action="cart">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="product_id" class="product_id" value="'. $product->id .'" />
                                <li>'. $btn_link .'</li>
                                <input type="hidden" name="cmd" id="cmd" value="add2cart">
                            </form>
                            <li><button data-placement="top" aria-label="Quick View" title="Quick View" data-toggle="modal" data-target="#product-quickview" onclick="productQuickViews('.$product->id.')"><i class="icon-eye"></i></button></li>
                            '.$wishlist_frm.'
                            <form method="post" action="comparison-search">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="name" value="'. $product->name .'" />
                                <li><button type="submit" data-placement="top" aria-label="Compare" title="Compare" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </form>   
                            </ul>
                        </div>
                    </div>';
        } elseif ($type == 'special') {
            $path = Str::replace('thumbnails', 'medium', $path);
            $html .= '<div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="' . $url . '" aria-label="Product Link"><img class="lazyload" data-src="' .asset( $path ). '" alt="' . $alt . '" width="189" height="189"></a>
                            <div class="ps-product__badge">' . $caption . '</div>
                            <ul class="ps-product__actions">
                                <li>'. $btn_link .'</li>
                                <li><a href="#" data-placement="top" aria-label="Quick View" title="Quick View" data-toggle="modal" data-target="#product-quickview" onclick="productQuickViews('.$product->id.')"><i class="icon-eye"></i></a></li>
                                '.$wishlist_frm.'
                            </ul>
                        </div>
                        <div class="content">
                            <p>' . $name . '</p>
                            <div class="price text-red">
                                ' . $price_text . '
                            </div>
                        </div>
                    </div>';
            $html .= '<input type="hidden" name="ajax" value="1" />';
        } elseif ($type == 'small-amp') {

            $html .= '  <div class="single-slide">
                <div class="pm-product">
                    <div class="grid-product__image">
                    <a href="' . $url . '" aria-label="' . $url . '">
                        <div class="product-image-container  text-center"><amp-img src="' . $path . '" width="144" height="144" alt="' . $alt . '" class="img-fluid"></amp-img></div>
                    </a>
                    ' . $caption . '
                    </div>
                        <div class="grid-product__content">
                            <h3 class="title"><a href="' . $url . '">' . $name . '</a></h3>
                            <div class="price text-red">
                                ' . $price_text . '
                            </div>
                            <div class="btn-block p-details pt--15">
                                ' . $cart_link . '
                            </div>
                            <div submit-success class="alert-msg" id="submit-success">
                            <template type="amp-mustache" >
                            Product successfully added to shopping cart!<br>
                            <a href="' . url('cart') . '"  aria-label="See Your Cart"> <strong>Click Here </strong>To See Your Cart</a>
                            </template>
                            </div>
                            <div submit-error>
                            <template type="amp-mustache">
                            Something Went Wrong
                            </template>
                            </div>

                        </div>
                </div>

        </div>';
            $html .= '<input type="hidden" name="ajax" value="1" />';
        } elseif ($type == 'amp') {

            $html .=  ' <div class="row1">
                            <div class="col-12 grid-product grid-product__image">
                                <a href="' . $url . '" aria-label="' . $alt . '">
                                    <amp-img src="' . $path . '" width="200" height="200" alt="' . $alt . '" srcset="' . $path . ' 470w, ' . $path . ' 820w, ' . $path . ' 1440w" data-hero></amp-img>
                                </a>
                            </div>
                        </div>
                        <div class="row1 ">
                            <div class="col-12">
                                <div class="grid-product__content">
                                    <h3 class="title"><a href="' . $url . '"  aria-label="Product Link">' . $name . '</a></h3>
                                    <div class="price text-red">
                                    ' . $price_text . '
                                    </div>
                                    <br>
                                    <p class="featured-product__content"> ' . $description . '</p>
                                    <div class="feature-btn">
                                    ' . $cart_link . '
                                    </div>
                                    <div submit-success class="alert-msg" id="submit-success">
                                        <template type="amp-mustache" >
                                            Product successfully added to shopping cart!<br>
                                            <a href="cart"  aria-label="See Your Cart"> <strong>Click Here </strong>To See Your Cart</a>
                                        </template>
                                    </div>
                                    <div submit-error>
                                        <template type="amp-mustache">
                                            Something Went Wrong
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>';
            $html .= '  <input type="hidden" name="ajax" value="1" />';
        } elseif ($type == 'hot-products-amp') {

            $html .=  ' <div class="grid-product space-mb--20">
                            <div class="grid-product__image">
                                <a href="' . $url . '" aria-label="' . $alt . '">
                                    <amp-img src="' . $path . '" width="150" height="150" layout="responsive" alt="' . $alt . '" srcset="' . $path . ' 470w, ' . $path . ' 820w, ' . $path . ' 1440w" data-hero></amp-img>
                                </a>
                                <button class="icon" aria-label="icon"><span> ' . $caption . '</span></button>
                            </div>
                            <div class="grid-product__content">
                                <h3 class="title"><a href="' . $url . '" aria-label="Product Link">' . $name . '</a></h3>
                                <div class="price text-red">
                                    ' . $price_text . '
                                </div>
                            </div>
                        </div>';
        } elseif ($type == 'list') {
            $img_id = 'product_' . $product->id . '_img';
            $html .= '<div class="ps-product ps-product--wide">
                        <div class="ps-product__thumbnail"><a href="' . route('frontend.shop-slug', [$url]) . '"><img id="' . $img_id . '" class="lazyload" data-src="' . $path . '" alt="' . $alt . '" /></a></div>
                        <div class="ps-product__container">
                            <div class="ps-product__content"><a class="ps-product__title" href="' . route('frontend.shop-slug', [$url]) . '" aria-label="Product Link">' . $name . '</a>
                                <p class="ps-product__vendor">Sold by: <a href="' .$product->vendor['slug'] . '"  aria-label="Vendor Link">' . $product->vendor['name'] . '</a></p>';

            if (!$show_sub || $product->type != 'variation') {
                $html .= '<div class="ps-product__shopping">
                                <article>
                                    <p>' . $description . '</p>
                                </article>
                                <p class="ps-product__price sale">' . $price_text . '</p>
                                <form class="frm_add_to_cart" method="post" action="cart">
                                    <input type="hidden" name="_token" value="'.csrf_token().'" />
                                    <input type="hidden" name="product_id" class="product_id" value="'. $product->id .'" />
                                    '. $cart_link .$detail_link .'
                                    <input type="hidden" name="cmd" id="cmd" value="add2cart">
                                </form>
                            </div>';
            } else {
                $html .= '
                            <p>' . $description . '</p>
                            <div class="price text-red">Multiple SKUs Available</div>
                ';

                //if($product->childProducts())

                $subs = $product->childProducts()->orderBy('position', 'asc')->orderBy('name', 'asc')->get();

                $html .= '<ul class="ps-product__desc">';

                $inc = 0;
                $max_show = 400;

                $tr_sub_id = 'subs_' . $product->id;

                foreach ($subs as $sub) {
                    $s_path = 'up_data/products/images/thumbnails/' . $sub->image;
                    if ($sub->image != '' && file_exists($s_path)) {
                        $alt_tag = Str::replace('"', ' inch', $sub->name);

                        $m_path = 'up_data/products/images/medium/' . $sub->image;
                        $tip_image = '<span class="d-none"><span id="img_prd_' . $sub->id . '"><img class="lazyload" data-src="' . $m_path . '" alt="' . $alt_tag . '"></span></span>';
                        $tooltip = 'data-tooltip-content="#img_prd_' . $sub->id . '"';
                    } else {
                        $s_path = $path;
                        $tip_image = '';
                        $tooltip = '';
                    }


                    $s_url = $url . '#' . $sub->sku;
                    $inc++;

                    $class = $hide_extra = '';
                    if ($inc > $max_show) {
                        $class = 'd-none';
                        $hide_extra = $tr_sub_id . '_hide';
                    }

                    $sub_price = self::getPriceText($sub);

                    //$html .= '<tr '. $tooltip .' class="'. $tr_sub_id .' '. $hide_extra .' '. $class .'" onmouseover="$(\'#'. $img_id .'\').attr(\'src\', \''. $s_path .'\');">
                    $html .= '<li ' . $tooltip . ' class="tipster ' . $tr_sub_id . ' ' . $hide_extra . ' ' . $class . '">
                                <a href="' . route('frontend.shop-slug', [$s_url]) . '" ><em>' . $sub->sku . '</em></a>
                                ' . $tip_image . '
                                <input type="hidden" name="product_id" value="' . $sub->id . '" />
                                <a href="' . route('frontend.shop-slug', [$s_url]) . '" aria-label="Product Link">' . $sub->name . '</a>
                                <a href="' . route('frontend.shop-slug', [$s_url]) . '" class="ps-product__price sale">' . $sub_price['price_text'] . '</a>
                            </li>';
                }

                if ($inc > $max_show) {
                    $title = ($inc - $max_show) . ' More SKUs, click to view';
                    $html .= '<div class="text-center">
                                <a id="' . $tr_sub_id . '_as" href="javascript:;" onclick="$(\'.' . $tr_sub_id . '\').removeClass(\'d-none\'); $(\'#' . $tr_sub_id . '_as\').addClass(\'d-none\'); $(\'#' . $tr_sub_id . '_ah\').removeClass(\'d-none\');"><img class="lazyload" data-src="static/img/more_skus.png" title="' . $title . '" alt="View More"></a>
                                <a class="d-none" id="' . $tr_sub_id . '_ah" href="javascript:;" onclick="$(\'.' . $tr_sub_id . '_hide\').addClass(\'d-none\'); $(\'#' . $tr_sub_id . '_as\').removeClass(\'d-none\'); $(\'#' . $tr_sub_id . '_ah\').addClass(\'d-none\');"><img class="lazyload" data-src="static/img/more_skus_rev.png" title="Hide extra SKUs" alt="View More"></a>
                            </div>';
                }

                $html .= '</ul>';



                //$html .= 'SUB COUNT::: '. count($subs);
            }

            $html .= '
                                </div>
                            </div>
                        </div>';
        } elseif ($type == 'list-amp') {
            $img_id = 'product_' . $product->id . '_img';
            $html .= '

            <div class="col-lg-12">
            <div class="pm-product product-type-list  ">
                <div class="grid-product__image">
                    <a href="' . $url . '">
                        <amp-img id="' . $img_id . '" src="' . $path . '" width="200" height="200" alt="' . $alt . '" srcset="' . $path . ' 500w, ' . $path . ' 1000w, ' . $path . ' 1500w"></amp-img>
                    </a>    
                </div>
                <div class="content">
                    <h1 class="font-weight-500"><a href="' . $url . '" aria-label="Product Link">' . $name . '</a></h1>';

            if (!$show_sub || $product->type != 'variation') {
                $html .= '      <div class="price text-red ">
                                                            ' . $price_text . '
                                                        </div>
                                                        <div class="card-list-content ">
                                                            <article>
                                                                <p>' . $description . '</p>
                                                            </article>
                                                            <div class="btn-block d-flex">
                                                                ' . $cart_link . $detail_link . '
                                                            </div>

                                                        </div>
                                                        <div submit-success class="alert-msg" id="submit-success">
                                                        <template type="amp-mustache" >
                                                        Product successfully added to shopping cart!<br>
                                                        <a href="' . url('cart') . '" aria-label="See Your Cart"> <strong>Click Here </strong>To See Your Cart</a>
                                                        </template>
                                                        </div>
                                                        <div submit-error>
                                                        <template type="amp-mustache">
                                                        Something Went Wrong
                                                        </template>
                                                        </div>
                                                        ';
                $html .= '<input type="hidden" name="ajax" value="1" />';
            } else {
                $html .= '
                            <p>' . $description . '</p>
                            <div class="price text-red mt3">Multiple SKUs Available</div>
                ';

                //if($product->childProducts())

                $subs = $product->childProducts()->orderBy('position', 'asc')->orderBy('name', 'asc')->get();

                $html .= '<div class="card-list-content">
                            <table width="100%" class="table-sub-products table-hover">
                            ';

                $inc = 0;
                $max_show = 400;

                $tr_sub_id = 'subs_' . $product->id;

                foreach ($subs as $sub) {
                    $s_path = 'up_data/products/images/thumbnails/' . $sub->image;
                    if ($sub->image != '' && file_exists($s_path)) {
                        $alt_tag = Str::replace('"', ' inch', $sub->name);

                        $m_path = 'up_data/products/images/medium/' . $sub->image;
                        $tip_image = '<span class="d-none"><span id="img_prd_' . $sub->id . '"><amp-img src="' . $m_path . '" alt="' . $alt_tag . '" width="200" height="200"></amp-img</span></span>';
                        $tooltip = 'data-tooltip-content="#img_prd_' . $sub->id . '"';
                    } else {
                        $s_path = $path;
                        $tip_image = '';
                        $tooltip = '';
                    }


                    $s_url = $url . '#' . $sub->sku;
                    $inc++;

                    $class = $hide_extra = '';
                    if ($inc > $max_show) {
                        $class = 'd-none';
                        $hide_extra = $tr_sub_id . '_hide';
                    }

                    $sub_price = self::getPriceText($sub);

                    //$html .= '<tr '. $tooltip .' class="'. $tr_sub_id .' '. $hide_extra .' '. $class .'" onmouseover="$(\'#'. $img_id .'\').attr(\'src\', \''. $s_path .'\');">
                    $html .= '<tr ' . $tooltip . ' class="tipster ' . $tr_sub_id . ' ' . $hide_extra . ' ' . $class . '">
                                <td width="15%" valign="top">
                                    <a href="' . $s_url . '"><em>' . $sub->sku . '</em></a>
                                    ' . $tip_image . '
                                </td>
                                <td width="65%" valign="top"><a href="' . $s_url . '" aria-label="Product Link">' . $sub->name . '</a></td>
                                <td width="20%" valign="top"><a href="' . $s_url . '">' . $sub_price['price_text'] . '</a></td>
                            </tr>';
                }
                $html .= '</table>';

                if ($inc > $max_show) {
                    $title = ($inc - $max_show) . ' More SKUs, click to view';
                    $html .= '<div class="text-center">
                                    <a id="' . $tr_sub_id . '_as" href="javascript:;" onclick="$(\'.' . $tr_sub_id . '\').removeClass(\'d-none\'); $(\'#' . $tr_sub_id . '_as\').addClass(\'d-none\'); $(\'#' . $tr_sub_id . '_ah\').removeClass(\'d-none\');"><img class="lazyload" data-src="vsi/image/more_skus.png" title="' . $title . '" alt="View More"></a>
                                    <a class="d-none" id="' . $tr_sub_id . '_ah" href="javascript:;" onclick="$(\'.' . $tr_sub_id . '_hide\').addClass(\'d-none\'); $(\'#' . $tr_sub_id . '_as\').removeClass(\'d-none\'); $(\'#' . $tr_sub_id . '_ah\').addClass(\'d-none\');"><img class="lazyload" data-src="vsi/image/more_skus_rev.png" title="Hide extra SKUs" alt="View More"></a>
                            </div>';
                }

                $html .= '</div>';



                //$html .= 'SUB COUNT::: '. count($subs);
            }

            $html .= '
                                </div>
                            </div>
                        </div>';
        }
        elseif($type == 'special_offer')
        {
            $html .= '<div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="' . $url . '" aria-label="Product Link"><img class="lazyload" data-src="' .asset( $path ). '" alt="' . $alt . ' " height="189px" width="189px"></a>
                            <div class="ps-product__badge">'. $caption .'</div>
                            <ul class="ps-product__actions">
                            <form class="frm_add_to_cart" method="post" action="cart">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="product_id" class="product_id" value="'. $product->id .'" />
                                <li>'. $btn_link .'</li>
                                <input type="hidden" name="cmd" id="cmd" value="add2cart">
                            </form>
                            <li><button data-placement="top" aria-label="Quick View" title="Quick View" data-toggle="modal" data-target="#product-quickview" onclick="productQuickViews('.$product->id.')"><i class="icon-eye"></i></button></li>
                            '.$wishlist_frm.'
                            <form method="post" action="comparison-search">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="name" value="'. $product->name .'" />
                                <li><button type="submit" aria-label="Compare" data-placement="top" title="Compare" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </form>  
                            </ul>
                        </div>
                    </div>';
        }
        elseif($type == 'deals_of_the_day')
        {
            $html .= '<div class="ps-product ps-product--inner">
                        <div class="ps-product__thumbnail"><a href="' . $url . '" aria-label="Product Link"><img class="lazyload" data-src="' .asset( $path ). '" alt="' . $alt . '" height="189px" width="189px"></a>
                            <div class="ps-product__badge">'. $caption .'</div>
                            <ul class="ps-product__actions">
                            <form class="frm_add_to_cart" method="post" action="cart">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="product_id" class="product_id" value="'. $product->id .'" />
                                <li>'. $btn_link .'</li>
                                <input type="hidden" name="cmd" id="cmd" value="add2cart">
                            </form>
                            <li><button data-placement="top" aria-label="Quick View" title="Quick View" data-toggle="modal" data-target="#product-quickview" onclick="productQuickViews('.$product->id.')"><i class="icon-eye"></i></button></li>
                            '.$wishlist_frm.'
                            <form method="post" action="comparison-search">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="name" value="'. $product->name .'" />
                                <li><button type="submit" aria-label="Compare" data-placement="top" title="Compare" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </form>   
                            </ul>
                        </div>
                    </div>';
        }
        elseif($type == 'related_products')
        {
            $html .= '<div class="ps-product ps-product--inner">
                        <div class="ps-product__thumbnail"><a href="' . $url . '" aria-label="Product Link"><img class="lazyload" data-src="' .$path. '" alt="' . $alt . '"></a>
                            <div class="ps-product__badge">'. $caption .'</div>
                            <ul class="ps-product__actions">
                            <form class="frm_add_to_cart" method="post" action="cart">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="product_id" class="product_id" value="'. $product->id .'" />
                                <li>'. $btn_link .'</li>
                                <input type="hidden" name="cmd" id="cmd" value="add2cart">
                            </form>
                            <li><button data-placement="top" aria-label="Quick View" title="Quick View" data-toggle="modal" data-target="#product-quickview" onclick="productQuickViews('.$product->id.')"><i class="icon-eye"></i></button></li>
                            '.$wishlist_frm.'
                            <form method="post" action="comparison-search">
                                <input type="hidden" name="_token" value="'.csrf_token().'" />
                                <input type="hidden" name="name" value="'. $product->name .'" />
                                <li><button type="submit" aria-label="Compare" data-placement="top" title="Compare" data-original-title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </form>   
                            </ul>
                        </div>
                    </div>';
        }
        elseif($type == 'large')
        {
            $html .= '<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="ps-product--horizontal">
                            <div class="ps-product__thumbnail"><a href="' . $url . '" aria-label="Product Link"><img class="lazyload" data-src="' .$path. '" alt="' . $alt . '" width="100" height="100"></a></div>
                            <div class="ps-product__content"><a class="ps-product__title" href="' . $url . '" aria-label="Product Link">' . $name . '</a>
                                <p class="ps-product__price">' . $price_text . '</p>
                            </div>
                        </div>
                    </div>';
            $html .= '<input type="hidden" name="ajax" value="1" />';
        } else {
            $html .= '<div class="single-slide">
                        <div class="pm-product product-type-list">
                            <a href="' . $url . '" class="image">
                                <div class="product-image-container text-center"><img class="lazyload" data-src="' . $path . '" alt="' . $alt . '" class="img-fluid"></div>
                            </a>
                            <div class="content">
                                <h1 class="font-weight-500"> <a href="' . $url . '" aria-label="Product Link">' . $name . '</a></h1>
                                <div class="price text-red mb-3" >
                                    ' . $price_text . '
                                </div>
                                <p>' . $description . '</p>
                                <div class="btn-block">
                                    ' . $cart_link . '
                                </div>
                            </div>
                        </div>
                    </div>';
            $html .= '<input type="hidden" name="ajax" value="1" />';
        }

        //$html .= '<input type="hidden" name="product_id" class="product_id" value="' . $product->id . '" />';

        //$html .= '</form>';

        return $html;
    }

    public static function getPriceText($product, $type = 'listing')
    {
        $price = $product->price_catalog;
        $discount = 0;
        $sale_price = 0;

        if ($product->type != 'variation') {
            $pcss = '';
            if ($type == 'detail')
                $pcss = 'class="new-price font-weight-400"';
            $price_text = '<span ' . $pcss . '>$' . number_format($product->price_catalog, 2) . '</span>';
            if ($product->price_discounted > 0) {
                $today = strtotime(date('Y-m-d'));
                if ($product->price_discounted_start != '' && $product->price_discounted_end != '') {
                    if ($today >= strtotime($product->price_discounted_start) && $today <= strtotime($product->price_discounted_end))
                        $product->on_sale = true;
                } else if ($product->price_discounted_start != '') {
                    if ($today >= strtotime($product->price_discounted_start))
                        $product->on_sale = true;
                } else if ($product->price_discounted_end != '') {
                    if ($today <= strtotime($product->price_discounted_end))
                        $product->on_sale = true;
                } else {
                    $product->on_sale = true;
                }

                if(isset($product->on_sale) && $product->on_sale) {
                    $discount = $price - $product->price_discounted;
                    $sale_price = $product->price_discounted;

                    if ($type == 'listing' || $type == 'amp') {
                        $price_text = '<span class="old">$' . number_format($product->price_catalog, 2) . '</span>
                        <span>$' . number_format($product->price_discounted, 2) . '</span>';
                    } else {
                        if ($type == 'detail') {

                            $price_text = '
                            <span class="new-price font-weight-400">$' . number_format($product->price_discounted, 2) . '</span><br>
                            <span class="old-price">$' . number_format($product->price_catalog, 2) . '</span>
                            ';

                            $dp = round(($discount / $price) * 100, 2);

                            if ($dp > 0)
                                $price_text .= ' <span class="discount-percentage">(-' . $dp . '%)</span>';
                        } else {
                            $price_text = '<span class="old-price">$' . number_format($product->price_catalog, 2) . '</span>
                            <span class="new-price font-weight-400">$' . number_format($product->price_discounted, 2) . '</span>';
                        }
                    }
                }
            }

            $cart_link = '<button type="submit" aria-label="Add to Cart" class="ps-btn mr-2" style="width:auto" onclick="this.form.cmd.value=\'add2cart\';">Add to Cart</button>';
            $detail_link = '<button type="submit" class="ps-btn" onclick="this.form.cmd.value=\'buynow\';">Buy Now</button>';
        } else {
            if ($type == 'listing')
                $price_text = '<span>Multiple SKUs, Click for Details</span>';
            else
                $price_text = '';

            $cart_link = '<a href="' . route('frontend.shop-slug', [$product->url]) . '" class="ps-btn" aria-label="Click for Details">Click for Details</a>';
            $detail_link = '';
        }

        return ['price_text' => $price_text, 'cart_link' => $cart_link, 'detail_link' => $detail_link, 'price' => $price, 'sale_price' => $sale_price, 'discount' => $discount];
    }


    public static function setProductVariationSkus($product)
    {
        if (isset($product->childProducts)) {
            $sub_products = $product->childProducts; //Product::select(['sku','sku_stripped'])->where('parent_id', $product->id)->get();

            $v_skus = [];
            foreach ($sub_products as $sd) {
                array_push($v_skus, $sd->sku);
                array_push($v_skus, $sd->sku_stripped);
                $name = trim(preg_replace('/\s\s+/', ' ', Str::replace("\n", " ", $sd->name)));
                array_push($v_skus, $name);
            }

            if (count($v_skus) > 0) {
                $sku_variations = implode(' ', $v_skus);
                $product->sku_variations = $sku_variations;
                $product->save();
            }
        }
    }

    public static function printAddtionalInformation($additional_information)
    {
        $html = '';
        $show_info = false;

        if (trim($additional_information) != false) {
            $json = json_decode($additional_information, true);
            $html .= '<h3 class="pb-2 font-semibold text-gray-900">Additional Information</h3>';
            $html .= '<table class="border border-b-1 border-t-1 table-additional-info text-gray-500 text-left text-sm w-full">';

            foreach ($json as $k => $v) {
                if ($v == null || $v == '' || $v == 'null') {
                    continue;
                }

                $html .= '<tr class="bg-white border border-gray-300"><td class="py-3 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . Product::$additional_info[$k] . ':</td><td>' . $v . '</td></tr>';
                $show_info = true;
            }

            $html .= '</table>';
        }

        if ($show_info)
            return $html;
        else
            return '';
    }

    public static function printSetProducts($product)
    {
        if ($product->is_set == 'Y') {
            $items = $product->setProducts()->orderBy('pos', 'ASC')->get();
            if (count($items) > 0) {
                $html = '<div class="pt-3 pb-3"><strong>Set Includes:</strong></div><table class="table table-condensed table-hover table-sets">';

                foreach ($items as $item) {
                    $m_path = 'up_data/products/images/medium/' . $item->image;
                    if ($item->image != '') {
                        $alt = Str::replace('"', '``', $item->name);
                        $tip_image = '<span class="d-none"><span id="img_prd_' . $item->id . '"><img class="lazyload" data-src="' . $m_path . '" alt="' . $alt . '"></span></span>';
                        $tooltip = 'data-tooltip-content="#img_prd_' . $item->id . '"';
                    } else {
                        $tip_image = $tooltip = '';
                    }

                    $html .= '<tr ' . $tooltip . ' class="tipster"><td width="5%">' . $item->pivot->qty . '</td><td width="10%" nowrap="nowrap">' . $item->sku . '</td><td width="85%">' . $item->name . $tip_image . '</td></tr>';
                }

                $html .= '</table>';

                return $html;
            }
        }
    }

    public static function printStockInformation($product)
    {
        $html = 'Availability: <span>';
        $in_stock = 'Y';
        if ($product->check_quantity == 'Y')
        {
            if ($product->quantity == 0)
            {
                $html .= 'Out of Stock';
                $in_stock = 'N';
            }
            else
                $html .= 'In Stock (' . $product->quantity . ' Available)';
        }
        else
        {
            if ($product->in_stock == 'Y')
            {
                $html .= 'In Stock';
            }
            else
            {
                $html .= 'Out of Stock';
                $in_stock = 'N';
            }
        }

        return ['message' => '<div class="pb--10 product-meta">' . $html . '</span></div>', 'in_stock' => $in_stock];
    }

    public static function getNewProducts()
    {
        //return Cache::remember('home_new_products', (60 * 60), function () {
            $filter['new'] = 'Y';
            $filter['order_by'] = 'rand';
            return self::getProducts($filter);
        //});
    }

    public static function getHotProducts()
    {
        //return Cache::remember('home_hot_products', (60 * 60), function () {
            $filter['hot'] = 'Y';
            $filter['order_by'] = 'rand';
            return self::getProducts($filter);
        //});
    }

    public static function getFeaturedProducts()
    {
        //return Cache::remember('home_featured_products', (60 * 60), function () {
            $filter['featured'] = 'Y';
            $filter['order_by'] = 'rand';
            return self::getProducts($filter);
        //});
    }

    public static function getDealsOfTheDayProducts()
    {
        //return Cache::remember('home_featured_products', (60 * 60), function () {
            $filter['deals_of_the_day'] = 'Y';
            $filter['order_by'] = 'rand';
            return self::getProducts($filter);
        //});
    }

    public static function getRecommendedProducts($product, $sub_products)
    {
        $name = Str::replace(',', ' ', $product->name);
        $name = explode(' ', $name);
        $tags = explode(',', $product->tags);
        $terms = array_merge($name, $tags);

        if ($product->type == 'variation') {
            foreach ($sub_products as $sp) {
                $name = Str::replace(',', ' ', $sp->name);
                $name = explode(' ', $name);
                $terms = array_merge($name, $terms);
            }
        }

        $terms = array_unique($terms);
        $terms = array_filter($terms, function ($v) {
            return strlen($v) > 3;
        });

        if (count($terms) > 0) {
            $filter['terms'] = $terms;
            $filter['not'] = $product->id;
            $filter['order_by'] = 'rand';

            return self::getProducts($filter);
        } else return null;
    }

    public static function getRelatedProducts($product, $sub_products)
    {
        $rp = [];
        if ($product->type == 'variation') {
            foreach ($sub_products as $sp) {
                $srp = explode(',', $sp->related_products);
                $rp = array_merge($rp, $srp);
            }
        } else {
            $rp = explode(',', $product->related_products);
        }

        $rp = array_unique($rp);
        $rp = array_filter($rp, function ($v) {
            return strlen($v) > 0;
        });

        if (count($rp) > 0) {
            $filter['find_ids'] = $rp;
            $filter['not'] = $product->id;
            $filter['order_by'] = 'rand';

            return self::getProducts($filter);
        } else return null;
    }

    public static function getQrCode($product, $product_id)
    {
        if (is_numeric($product))
            $product = self::find($product);

        $slug = $product->slug;

        if ($product->type == 'child') {
            if ($product_id == '') {
                $parent_slug = self::getParentSlug($product->id);
                $slug = $parent_slug . '#' . $product->sku;
            } else {
                $parent = Product::find($product_id);
                $slug = $parent->slug . '#' . $product->sku;
            }
        }

        $url = 'https://vo.germedusait.com/' . $slug;
        $qrc = QrCode::errorCorrection('M')->format('png')->size(500)->merge('up_data/vo_qr_code_tt.png', .6, true)->generate($url);
        return ['name' => $product->name, 'sku' => $product->sku, 'url' => $url, 'qr_code' => '<img class="lazyload" data-src="data:image/png;base64, ' . base64_encode($qrc) . ' ">'];
    }

    public function childProducts()
    {
        return $this->belongsToMany(Product::class, 'products_products', 'product_id', 'sub_product_id');
    }

    public static function getChildProducts($id)
    {
        return DB::table('products')
            ->join('products_products', 'products.id', '=', 'products_products.sub_product_id')
            ->where('products_products.product_id', '=', $id)
            ->select('products.*')
            ->orderBy('products.position', 'asc')
            ->orderBy('products.name', 'asc')
            ->get();
    }

    public function setProducts()
    {
        return $this->belongsToMany(Product::class, 'products_sets', 'variation_id', 'product_id')->withPivot(['id', 'qty', 'pos']);
    }

    public static function getParentId($id)
    {
        $parent = SubProduct::select('product_id')->where('sub_product_id', $id)->first();
        if ($parent)
            return $parent->product_id;
        else
            return null;
    }

    public static function getProductBySKU($sku)
    {
        $product = self::where('sku', $sku)->first();
        if ($product)
            return $product;
        else
            return null;
    }

    public static function getParentSlug($id)
    {
        $parent = SubProduct::select('product_id')->where('sub_product_id', $id)->first();
        if (isset($parent->product_id)) {
            $slug = Slug::where('sluggable_id', $parent->product_id)->where('sluggable_type', 'App\Models\Product')->first();
            if ($slug)
                return $slug->slug;
            else
                return false;
        }
        return false;
    }

    public static function getProductSlug($product)
    {
        if($product->type == 'child' && ( $product->show_individual == 'N' || $product->link_type == 'variation' ) )
        {
            $slug = self::getParentSlug($product->id).'#'.$product->sku;
        }
        else
        {
            $slug = $product->slug;
        }

        return $slug;
    }

    public static function getProductVendorId($productId)
    {
        $product = Product::find($productId);
        if($product->vendor_id==0)
        {
            $parent_product = Product::find($product->parent_id);
            $vendor_id = $parent_product->vendor_id;
        }
        else
        {
            $vendor_id = $product->vendor_id;
        }
        return $vendor_id;
    }

    public static function getReviews($product_id, $withRating=true)
    {
        $reviews = Review::where(function($query) use ($withRating)
        {
            if($withRating==true)
            {
                $query->where('rating','!=',0);
            }

        })->where([
            ['product_id', $product_id],
            ['status','=','Y']
        ])->select(DB::raw('SUM(rating)/COUNT(*) as Rating'))->first();
        return $reviews->Rating;
    }

    /*public function parentProduct() // won't be using it
    {
        return $this->belongsToMany(Product::class, 'products_products',  'sub_product_id', 'product_id');
    }*/
}
