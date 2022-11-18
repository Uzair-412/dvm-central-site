<?php

namespace App\Models;

use App\Helpers\General\SiteMapHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'business_type','parent_id','name','slug','short_description','description', 'meta_title', 'meta_keywords', 'meta_description',
                            'image', 'display_mode', 'show_prices', 'banner_id', 'show_in_menu', 'is_main', 'is_featured', 'position', 'status' ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'created_at', 'updated_at' ];

    /**
     * The attribute types will be define here, it's required to return data to API in correct types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
    ];


    public static $display_mode = [
        'products_and_description' => 'Products and Description',
        'products_only' => 'Products Only',
        'description_only' => 'Description Only',
    ];

    public static $categories_list;

    /**
     * Defining relationship with Shop
     */
    /*public function products()
    {
        return $this->hasMany('App\Products');
    }*/

    public static function boot()
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
    }

    public function subcategories()
    {
        $response = $this->hasMany(Category::class, 'parent_id')->where('status', 'Y');
        return $response;
    }

    public function slugs()
    {
        return $this->morphMany('App\Models\Slug', 'sluggable');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }


    /**
     *
     */
    public static function getCategoriesSelect($filter = [])
    {
        $no_parent = false;
        $caption = '- No Parent -';

        $query = self::select('id', 'parent_id', 'name');

        if(isset($filter['no_parent'])) $no_parent = $filter['no_parent'];
        if(isset($filter['caption'])) $caption = $filter['caption'];
        if(isset($filter['business_type'])) $query->where('business_type', $filter['business_type']);

        if(!$no_parent)
            self::$categories_list[0] = $caption;

        $rows = $query->get()->toArray();
        $rows = self::arrangeCategories($rows);

        $rows = self::styleCategories($rows);

        return $rows;
    }

    public static function arrangeCategories(Array $data, $parent = 0) {
        $tree = array();
        foreach ($data as $d)
        {
            if ($d['parent_id'] == $parent)
            {
                $children = self::arrangeCategories($data, $d['id']);

                if (!empty($children))
                {
                    $d['_children'] = $children;
                }
                $tree[] = $d;
            }
        }
        return $tree;
    }

    public static function styleCategories($tree, $r = 0, $p = null)
    {
        foreach ($tree as $i => $t)
        {
            $dash = ($t['parent_id'] == 0) ? '' : str_repeat('&rarr;', $r) .' ';
            self::$categories_list[$t['id']] = $dash.$t['name'];

            if (isset($t['_children']))
            {
                self::styleCategories($t['_children'], $r+1, $t['parent_id']);
            }
        }

        return self::$categories_list;
    }

    public static function getCategoryTree($parent_id = 0)
    {
        $rows = self::select('id', 'parent_id', 'name')->get()->toArray();
        $rows = self::arrangeCategories($rows);
        $rows = self::styleCategories($rows);
        return $rows;
    }

    public static function getLeftMenuCategories($filters = [])
    {
        $parent_id = 0;

        if(isset($filters['limit']))
        {
            $limit = $filters['limit'];
        }
        else
        {
            if($parent_id == 0) $limit = 25;
            else $limit = 100;
        }

        if(isset($filters['parent_id']))
        {
            $parent_id = $filters['parent_id'];
        }
        // dd($parent_id);
        $query = Category::where(['status' => 'Y', 'show_in_menu' => 'Y', 'parent_id' => $parent_id]);

        if(isset($filters['business_type']))
        {
            $query->where('business_type', $filters['business_type']);
        }

        return $query->orderBy('position', 'ASC')->orderBy('name', 'ASC')->limit($limit)->get();
    }

    /*public static function getLeftMenuBusinessCategories($business_type_id){
        return Category::where(['status' => 'Y', 'show_in_menu' => 'Y', 'business_type' => $business_type_id])->orderBy('position', 'ASC')->orderBy('name', 'ASC')->get();
    }*/

    public static function getMainCategories()
    {
        //return Cache::remember('main_categories', (60 * 60), function () {
            return Category::where(['status' => 'Y', 'is_main' => 'Y'])->inRandomOrder()->limit(12)->get();
        //});
    }

    public static function getFeaturedCategories()
    {
        //return Cache::remember('featured_categories', (60 * 60), function () {
            return Category::where(['status' => 'Y', 'is_featured' => 'Y'])->inRandomOrder()->limit(6)->get();
        //});
    }

    public static function getFeaturedCategoryProducts($category)
    {
        //return Cache::remember('featured_cat_products_categories', (60 * 60), function () use ($category) {
            return $category->products()->where('featured', 'Y')->inRandomOrder()->limit(10)->get();
        //});
    }

    public static function getCategories(array $filter = [])
    {
        $query = Category::where('id', '!=', '');

        if(isset($filter['status']))
        {
            $query->where(['status' => $filter['status']]);
        }

        if(isset($filter['name']))
        {
            $query->where('name', 'like', '%'. $filter['name'] .'%');
        }

        if(isset($filter['slug']))
        {
            $query->where('slug', 'like', '%'. $filter['slug'] .'%');
        }

        if(!isset($filter['limit']))
        {
            $filter['limit'] = 10;
        }

        if(isset($filter['order_by']))
        {
            if($filter['order_by'] == 'rand')
            {
                $query->inRandomOrder();
            }
            else
            {
                $order = isset($filter['order']) ? $filter['order'] : 'asc';
                $query->orderBy($filter['order_by'], $order);
            }
        }
        else
        {
            $query->orderBy('name', 'asc');
            $query->orderBy('id', 'desc');
        }

        $result = $query->paginate($filter['limit']);

        return $result;
    }

    public static function categoryBlock($category)
    {
        $name = $category->name;

        //$url = $category->slugs()->first()->slug;
        $url = $category->slug;
        $category->url = $url;

        $path = 'up_data/categories/thumbnails/'.$category->image;
        if($category->image != '' && file_exists($path))
        {

        }
        else
        {
            $path = 'up_data/na.webp';
        }
        // col-xl-2 col-lg-3 col-md-3 col-sm-5 col-5 
        $html = '<div class="col-lg-3 col-md-4 col-sm-5 col-5">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="'. route('frontend.shop-slug', [$url]) .'"><img class="lazyload" data-src="'. asset( $path ) .'" alt="'. $name .'" /></a>
                            <div class="ps-product__actions"><a class="text-center h1 p-5" href="'. route('frontend.shop-slug', [$url]) .'">'. $name .'</a></div>
                        </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="'. route('frontend.shop-slug', [$url]) .'"></a>
                            <div class="ps-product__content"><a class="ps-product__title" href="'. route('frontend.shop-slug', [$url]) .'">'. $name .'</a></div>
                        </div>
                    </div>
            </div>';
        return $html;
    }

    public static function categoryBlockAmp($category)
    {
        $name = $category->name;

        //$url = $category->slugs()->first()->slug;
        $url = $category->slug;
        $category->url = $url;

        $path = 'up_data/categories/large/'.$category->image;
        if($category->image != '' && file_exists($path))
        {

        }
        else
        {
            $path = 'up_data/na.jpg';
        }


        $html = '<div class="col-lg-4 col-sm-6">
                    <div class="pm-product  ">
                        <a href="'. $url .'" class="image"  >
                            <amp-img src="'. $path .'" alt="'. $name .'" width="248" height="248"> </amp-img>
                        </a>
                        <div class="text-center">
                            <span class="font-weight-500"><a href="'. $url .'">'. $name .'</a></span>
                        </div>
                    </div>
                </div>';


        return $html;
    }
}
