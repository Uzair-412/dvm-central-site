<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\BusinessType;
use App\Models\Category;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Page;
use App\Models\Flyer;
use App\Models\Show;
use App\Models\Video;
use App\Models\Faqs;
use App\Models\BlogPost;
use App\Models\Redirect;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Block;
use App\Models\Follow;
use App\Models\Review;
use App\Models\Speaker;
use App\Models\Vendor;
use App\Models\VendorJob;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Composer\XdebugHandler\Status;
use DB;
/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // public function index() // Splash page
    // {
    //     $speakers = Speaker::where('status', 'Y')->get();
    //     $jobs = VendorJob::filter();
    //     return view('frontend.index', compact('speakers', 'jobs'));
    // }

    public function mobile()
    {
        $speakers = Speaker::where('status', 'Y')->get();
        $jobs = VendorJob::filter();
        return view('frontend.mobile', compact('speakers', 'jobs'));
    }

    public function index()
    {
        $data['main-categories'] = Block::where('status', 'Y')->get();
        $data['top-categories'] = Category::where([
            'is_main' => 'Y',
            'status' => 'Y',
        ])->inRandomOrder()->limit(10)->get();
        // $data['hot_products'] = Product::getHotProducts();
        $data['new_products'] = Product::getNewProducts();
        $data['featured_products'] = Product::getFeaturedProducts();
        $data['deals_of_the_day'] = Product::getDealsOfTheDayProducts();
        $data['menu_categories'] = Category::getLeftMenuCategories();
        $data['banners'] = Banner::where(['status' => 'Y', 'area_id' => 1])
            ->orderBy('id', 'desc')
            ->get();
        return view('frontend.shop', compact('data'));
    }

    public function aboutus()
    {
        $data['breadcrumb'] = true;
        $data['page'] = Page::where('slug', 'about-us')->first();
        if (!$data['page']) {
            abort(404);
        }

        $view = 'frontend.pages.index';
        return view($view, compact('data'));
    }

    public function our_mission()
    {
        $data['breadcrumb'] = true;
        $data['page'] = Page::where('slug', 'our-mission')->first();
        if (!$data['page']) {
            abort(404);
        }

        $view = 'frontend.pages.index';
        return view($view, compact('data'));
    }

    public function privacy()
    {
        $data['breadcrumb'] = true;
        $data['page'] = Page::where('slug', 'privacy-policy')->first();
        if (!$data['page']) {
            abort(404);
        }

        $view = 'frontend.pages.index';
        return view($view, compact('data'));
    }

    public function terms()
    {
        $data['breadcrumb'] = true;
        $data['page'] = Page::where('slug', 'terms-and-conditions')->first();
        if (!$data['page']) {
            abort(404);
        }

        $view = 'frontend.pages.index';
        return view($view, compact('data'));
    }


    public function pages($slug)
    {    
        $data['breadcrumb'] = true;
        $slug = 'pages/'.$slug;
        $data['page'] = Page::where('slug', $slug)->first();
        
        if (!$data['page']) {
            abort(404);
        }
        
        $data['breadcrumbs'][] = $data['page']->heading;
        $view = 'frontend.pages.index';
        return view($view, compact('data'));
        

        if (
            $data['page']->id == 14 ||
            $data['page']->id == 15 ||
            $data['page']->id == 16 ||
            $data['page']->id == 23 ||
            $data['page']->id == 24
        ) {
            // 14 = BOGO Free, 15 = BOGO 50%, 16 = Show Special , 23 = Special Offer
            $get_coupon = true;

            if ($data['page']->id == 14) {
                $type = 3;
            } elseif ($data['page']->id == 15) {
                $type = 4;
            } elseif ($data['page']->id == 23) {
                $type = 5;
            } else {
                //dd('here');
                $get_coupon = false;
            }

            if ($get_coupon) {
                $coupon = Coupon::where([
                    'type' => $type,
                    'status' => 'Y',
                ])->first();
            }

            $category = new \stdClass();
            $category->name = $data['page']->name;
            $category->description = $data['page']->content;
            $category->do_index = null;
            $category->status = 'Y';

            $data['category'] = $category;

            if ($get_coupon && $coupon) {
                $error = false;
                $ts_current = strtotime(date('Y-m-d')); //date('Y-m-d');
                if ($coupon->date_from || $coupon->date_to) {
                    if ($coupon->date_from) {
                        $ts_from = strtotime($coupon->date_from);
                        if ($ts_current < $ts_from) {
                            $error = true;
                        }
                    }
                    if ($coupon->date_to) {
                        $ts_to = strtotime($coupon->date_to);
                        if ($ts_current > $ts_to) {
                            $error = true;
                        }
                    }
                }

                if (!$error) {
                    $skus = explode(',', $coupon->buy_skus);

                    $bogo_categories = [];
                    $bogo_products = [];
                    foreach ($skus as $sku) {
                        $product = Product::where([
                            'sku' => $sku,
                            'status' => 'Y',
                        ])->first();
                        if ($product) {
                            $categories = $product->categories;
                            $prd_cats = [];

                            foreach ($categories as $category) {
                                if (trim($category->name) == null) {
                                    continue;
                                }

                                if (
                                    array_key_exists(
                                        $category->id,
                                        $bogo_categories
                                    )
                                ) {
                                    $count =
                                        $bogo_categories[$category->id][
                                            'count'
                                        ] + 1;
                                } else {
                                    $count = 1;
                                }

                                $bogo_categories[$category->id] = [
                                    'name' => $category->name,
                                    'id' => $category->id,
                                    'count' => $count,
                                ];
                                array_push($prd_cats, $category->id);
                            }

                            $p_id = Product::getParentId($product->id);
                            if ($p_id) {
                                $parent = Product::find($p_id);
                                $categories = $parent->categories;

                                foreach ($categories as $category) {
                                    if (trim($category->name) == null) {
                                        continue;
                                    }

                                    if (
                                        array_key_exists(
                                            $category->id,
                                            $bogo_categories
                                        )
                                    ) {
                                        $count =
                                            $bogo_categories[$category->id][
                                                'count'
                                            ] + 1;
                                    } else {
                                        $count = 1;
                                    }

                                    $bogo_categories[$category->id] = [
                                        'name' => $category->name,
                                        'id' => $category->id,
                                        'count' => $count,
                                    ];
                                    array_push($prd_cats, $category->id);
                                }
                            }

                            $product->cats = $prd_cats;
                            array_push($bogo_products, $product);
                        }
                    }

                    $data['bogo_categories'] = $bogo_categories;
                    $data['bogo_products'] = $bogo_products;

                    $view = 'frontend.shop.bogo';

                    return view($view, compact('data'));
                }
            } else {
                $data['products'] = null;
                $data['listing_type'] = 'products_list';

                $data['left_categories'] = Category::getLeftMenuCategories();

                if ($data['page']->id == 16) {
                    // Show Special
                    $data['special_header'] = true;
                    $data['special_header_img'] = 'show-special-vdf-vet.jpg';
                    $data['show-rhs-nav'] = true;

                    $view = 'frontend.shop.show-special';

                    $data['show_products'] = [
                        'Kit Packs' => [
                            'GV-2020-09',
                            'GD50-3888',
                            'GD2017-04',
                            'GD50-350',
                            'GD50-176',
                            'GD50-175',
                        ],
                        'Scissors' => [
                            'GD50-915',
                            'GD50-915 SC',
                            'GD50-915 TCSC',
                            'G18-282',
                            'G18-280',
                            'G18-284',
                            'G18-286',
                            'G17-68 S',
                            'G17-55 S',
                            'G17-69 S',
                            'G17-128',
                            'G17-169',
                        ],
                        'Elevators' => [
                            'GLW-2018-11',
                            'GLT-2020-22',
                            'GD50-3997',
                            'GD50-3998',
                            'GD50-3999',
                            'GD50-3890',
                            'GD50-3891',
                            'GD50-3892',
                            'GD50-3893',
                            'GD50-3894',
                            'GD50-3895',
                            'GD50-3896',
                            'GD50-6889',
                            'GD50-6890',
                            'GD50-6891',
                            'GD50-6892',
                            'GD50-6893',
                            'GD50-6894',
                        ],
                        'Needle Holders' => [
                            'G17-140',
                            'G17-70',
                            'G17-71',
                            'G17-68 C',
                            'G17-55 C',
                            'G17-68 S',
                            'G17-55 S',
                            'G17-69 S',
                            'G17-128',
                            'G17-169',
                        ],
                        'Probes' => [
                            'GD50-735',
                            'GD50-740',
                            'GD50-750',
                            'GD50-99',
                            'GD50-86',
                            'GD50-85',
                        ],
                        'Forceps' => [
                            'GD50-4234',
                            'GD50-4085',
                            'GD50-3485',
                            'GD50-5122',
                            'GD50-435',
                            'GD50-5124',
                            'GD50-5126',
                            'GD50-5130',
                            'GD50-5132',
                            'GD50-5128',
                        ],
                        'Periotome' => [
                            'GD-1091',
                            'GD-1024',
                            'GD50-6910',
                            'GD50-6912',
                        ],
                        'Heidbrink' => ['GD50-123', 'GD50-124', 'GD50-125'],
                        'Curettes' => ['GD50-204', 'GD50-205', 'GD50-206'],
                    ];
                } elseif ($data['page']->id == 24) {
                    // Equine Special
                    $data['special_header'] = true;
                    $data['special_header_img'] = 'equine-show-special.jpg';
                    $data['show-rhs-nav'] = true;

                    $view = 'frontend.shop.show-special';

                    $data['show_products'] = [
                        'Equine Dental Elevators' => [
                            'VG2016-29',
                            'VG70-78',
                            'V2019-40',
                            'V2019-30',
                            'VG70-510',
                            'VG70-530',
                            'VG70-520',
                            'VG70-540',
                            'VG70-545',
                            'VG70-93',
                            'VG70-51',
                            'VG70-114',
                        ],
                        'Equine Dental Root Fragment Forceps' => [
                            'V2019-51',
                            'V2019-50',
                            'V70-98',
                        ],
                        'Equine Dental Extractors' => [
                            'VG70-99',
                            'VG70-106^dental-forceps-set.html',
                            'VG70-107^dental-forceps-set.html',
                            'VG70-108^dental-forceps-set.html',
                            'VG70-109^dental-forceps-set.html',
                            'VG70-108A',
                            'VG70-83',
                        ],
                        'Equine Dental Probes and Mirror' => [
                            'V2019-21',
                            'V2019-22',
                            'VG70-18',
                        ],
                        'Periotomes' => [
                            'GD50-6912',
                            'GD-1024A',
                            'GD-1037',
                            'GD-1039',
                        ],
                        'Emasculators' => [
                            'VG601-01A',
                            'VG601-01',
                            'VG604-02',
                            'VG604-05',
                        ],
                        'Equine Trephines and Biopsy Instruments' => [
                            'VG70-40',
                            'VG70-105',
                            'V70-213',
                        ],
                        'Equine Hoof Tester' => ['V90-1101', 'V90-1100'],
                    ];
                } else {
                    $view = 'frontend.shop.listing';
                }

                //if(AMP::check())
                //$view .= '-amp';

                return view($view, compact('data'));
            }
            
        }
        else{
            abort(404);
        }
     }
        /*$filter['category_id'] = $category->id;
        $products = Product::getProducts($filter);

        $product_filters        = Product::getProductFilters($products->products_all);

        $data['category']               = $category;
        $data['products']               = $products;
        $data['products_categories']    = $product_filters['categories'];
        $data['products_tags']          = $product_filters['tags'];
        $data['products_prices']        = $product_filters['prices'];

        $data['listing_type']           = 'products_list';

        return view('frontend.shop.listing', compact('data'));*/
    

    public function downloads()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Downloads';

        $data['flyers'] = Flyer::where('status', 'Y')
            ->orderBy('position', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(16);

        $view = 'frontend.pages.downloads';

        return view($view, compact('data'));
    }

    public function shows()
    {
        $monthsArray = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];

        $data['page'] = Page::find(6);

        $data['meta_title']     = $data['page']->meta_title;
        $data['meta_keywords']     = $data['page']->meta_keywords;
        $data['meta_description']     = $data['page']->meta_description;

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = $data['page']->heading;

        $query = Show::where('status', 'Y');
        if(request()->get('year') != '')
        {
            $query->whereYear('start_date', request()->get('year'));
            if(request()->get('month') != '')
                $query->whereMonth('start_date', request()->get('month'));

            $data['selected_date'] = 'Listing Trade Shows for ' . $monthsArray[request()->get('month')].', '.request()->get('year');
        }
        else $data['selected_date'] = 'Listing All Trade Shows';

        $years = Show::selectRaw(\DB::raw('MAX(YEAR(start_date)) AS mx_year, min(YEAR(start_date)) AS mn_year'))->where('status', 'Y')->first();
        $data['start_year'] = $years['mx_year'];
        $data['end_year'] = $years['mn_year'];

        $data['shows'] = $query->orderBy('position', 'asc')->orderBy('start_date', 'asc')->paginate(15);
        $view = 'frontend.pages.shows';

        return view($view, compact('data','monthsArray'));
    }

    /**
     * faqs
     *
     * @return void
     */
    public function faqs()
    {
        $data['breadcrumb'] = true;
        $data['meta_title']     = 'FAQ\'s - Frequently Asked Questions About VetandTech';
        $data['meta_description']   = 'Have some question about Vet Tech Marketplace? Find out the answers of some common questions, what is VetandTech and how it works?';
        $data['breadcrumbs'][] = "Frequently Asked Question's";
        $data['faqs'] = Faqs::where('status', 'Y')->get();
        $view = 'frontend.pages.faqs';
        return view($view, compact('data'));
    }

    public function blog()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Blog';

        $date = date('Y-m-d');

        $data['posts'] = BlogPost::where('status', 'Y')
            ->where('publish_date', '<=', $date)
            ->orderBy('publish_date', 'desc')
            ->paginate(12);

        $view = 'frontend.pages.blog';

        return view($view, compact('data'));
    }

    public function privacy_policy()
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'privacy-policy';
        $view = 'frontend.pages.privacy-policy';

        return view($view, compact('data'));
    }
    public function blog_detail($slug)
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Blog';

        $date = date('Y-m-d');

        $data['post'] = BlogPost::where('status', 'Y')
            ->where('publish_date', '<=', $date)
            ->where('slug', $slug)
            ->first();

        // Check for blog redirects
        if (!$data['post']) {
            $slug = 'blog/' . $slug;
            $redirect = Redirect::where('request_url', $slug)->first();
            if ($redirect) {
                return redirect($redirect->target_url, 301);
            }
        }
        // End check for blog redirects

        if ($data['post']) {
            $data['breadcrumbs'][] = $data['post']->name;

            $data['recent_posts'] = BlogPost::where('status', 'Y')
                ->where('publish_date', '<=', $date)
                ->orderBy('publish_date', 'desc')
                ->where('id', '!=', $data['post']->id)
                ->paginate(5);

            $view = 'frontend.pages.blog-detail';

            return view($view, compact('data'));
        } else {
            abort(404);
        }
    }

    public function track_order(Request $request)
    {
        $data['breadcrumb'] = true;
        $data['breadcrumbs'][] = 'Track Your Order';

        if ($request->input('tracking_code')) {
            $order = Order::trackOrder($request->input('tracking_code'));
            $data['order'] = $order;
            $data['search'] = true;
        }

        $view = 'frontend.pages.track';

        return view($view, compact('data'));
    }

    public function vendor_page($slug, $url)
    {   
        $data['page'] = Page::where('slug', $slug . '/page/' . $url)->first();

        $data['banner'] = Banner::where([
            'user_id' => $data['page']->user_id,
            'status' => 'Y',
        ])->get();
        $data['banner_header'] = Banner::where([
            'user_id' => $data['page']->user_id,
            'area_id' => 15,
            'status' => 'Y',
        ])->first();
        $data['page_list'] = Page::where(
            'user_id',
            $data['page']->user_id
        )->get();
        $vendor = Vendor::where(
            'user',
            $data['page']->user_id
        )->first();

        $data['hide_slider'] = true;

        $reviews = Review::whereHas('product', function ($query) use($vendor) {
            $query->where('vendor_id','=',$vendor->id);
        })->where([
            ['rating','!=',0],
            ['status','=','Y']
        ])->select(DB::raw('SUM(rating)/COUNT(*) as Rating'))->first();
        $data['ratingPercentage'] = ($reviews->Rating / 5) * 100;
        $data['vendor'] = $vendor;
        $data['followers'] = Follow::where('vendor_id', $vendor->id)->count();
        
        $view = 'frontend.shop.index';
        return view($view, compact('data'));
    }

    public function products(Request $request, $url)
    {
        if ($url == 'today-deals') {
            $data['breadcrumb'] = true;
            $data['breadcrumbs'][] = 'Today\'s Deals';
            $data['heading'] = 'Today\'s Deals';
            $data['short_description'] = 'Best Deals are hear.';
            $data['products'] = Product::where([
                'deals_of_the_day' => 'Y',
                'status' => 'Y',
            ])->paginate(15);
            $data['banner_header'] = Banner::where([
                'area_id' => 21,
                'status' => 'Y',
            ])->first();
            $view = 'frontend.pages.products';
        } elseif ($url == 'hot-selling') {
            $data['breadcrumb'] = true;
            $data['breadcrumbs'][] = 'Hot Selling Items';
            $data['heading'] = 'Hot Selling Items';
            $data['short_description'] = ' ';
            $data['products'] = Product::where([
                'hot' => 'Y',
                'status' => 'Y',
            ])->paginate(15);
            $data['banner_header'] = Banner::where([
                'area_id' => 22,
                'status' => 'Y',
            ])->first();

            $view = 'frontend.pages.products';
        } elseif ($url == 'special-offer') {
            $data['breadcrumb'] = true;
            $data['breadcrumbs'][] = 'Special Offers';
            $data['heading'] = 'Special Offers';
            $data['short_description'] = ' ';
            $data['products'] = Product::where([
                'featured' => 'Y',
                'status' => 'Y',
            ])->paginate(15);
            $data['banner_header'] = Banner::where([
                'area_id' => 24,
                'status' => 'Y',
            ])->first();

            $view = 'frontend.pages.products';
        } elseif ($url == 'new-arrivals') {
            $data['breadcrumb'] = true;
            $data['breadcrumbs'][] = 'Hot New Arrivals';
            $data['heading'] = 'Hot New Arrivals';
            $data['short_description'] = ' ';
            $data['products'] = Product::where([
                'new' => 'Y',
                'status' => 'Y',
            ])->paginate(15);
            $data['banner_header'] = Banner::where([
                'area_id' => 25,
                'status' => 'Y',
            ])->first();

            $view = 'frontend.pages.products';
        } elseif ($url == 'order-you-like') {
            $data['breadcrumb'] = true;
            $data['breadcrumbs'][] = 'Order You Like';
            $data['heading'] = 'Order You Like';
            $data['short_description'] = ' ';
            $data['banner_header'] = Banner::where([
                'area_id' => 25,
                'status' => 'Y',
            ])->first();

            $view = 'frontend.pages.order-you-like';
        }
        if(empty($view)){
            abort(404);
        }
        return view($view, compact('data'));
    }

    public function stripe()
    {
        $recipient = Stripe::accounts()->create([
            'name' => 'Farhan Asim',
            'type' => 'express',
            //'bank_account' => 'PK12SCBL0000001964157201',
            'email' => 'farhan@germedusa.com',
            'description' => 'Testing with Stripe for account',
        ]);
        dd($recipient);
        //dd('here i am');
    }

    public function save_lat_lng(Request $request)
    {
        $address = Address::where('id', $request->address_id);
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->save();
        return ['status'=> 1, 'message'=>'latitude and longitude saved!'];
    }
}
