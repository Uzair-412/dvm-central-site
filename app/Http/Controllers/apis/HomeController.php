<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessType;
use App\Models\Category;
use App\Models\Banner;
use App\Models\BlogPost;
use App\Models\Faqs;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Redirect;
use App\Models\Show;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\ContactMail;
use App\Models\Block;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        // $data['main-categories'] = Block::with(['blockCategories' => function($q) {
        //     $q->with('category');
        // }])->where('status', 'Y')->get();

        $data['main_categories'] = Category::whereHas('subcategories')->where([
            'parent_id' => '0',
            'status' => 'Y',
        ])->get();

        $data['top-categories'] = Category::whereHas('products')->where([
            'is_main' => 'Y',
            'status' => 'Y',
        ])->inRandomOrder()->limit(6)->get();

        // $data['hot_products'] = Product::getHotProducts();
        $data['new_products'] = Product::getNewProducts();
        $data['featured_products'] = Product::getFeaturedProducts();
        $data['deals_of_the_day'] = Product::getDealsOfTheDayProducts();
        $data['menu_categories'] = Category::getLeftMenuCategories();
        $data['banners'] = Banner::where(['status' => 'Y', 'area_id' => 1])
            ->orderBy('id', 'desc')
            ->get();
        return response()->json($data, 200);
    }

    public function shop_by_department()
    {
        $shop_by_department = BusinessType::where(['status' => 'Y'])->limit(10)->get();
        foreach ($shop_by_department as $key => $business_type) {
            $main_categories = Category::getLeftMenuCategories(['business_type' => $business_type->id]);
            $shop_by_department[$key]['child_categories'] = $main_categories;

            if ($main_categories) {

                foreach ($main_categories as $mainKey => $mc) {

                    $child_categories = Category::getLeftMenuCategories(['parent_id' => $mc->id]);
                    $shop_by_department[$key]['child_categories'][$mainKey]['child_categories'] = $child_categories;

                    foreach ($child_categories as $subKey => $cc) {
                        $shop_by_department[$key]['child_categories'][$mainKey]['child_categories'][$subKey]['child_categories'] = Category::getLeftMenuCategories(['parent_id' => $cc->id]);
                    }
                }
            }
        }
        return response()->json($shop_by_department, 200);
    }

    public function web_shop_by_department()
    {
        $shop_by_department = Category::with(['subcategories' => function($q){
            $q->with('subcategories');
        }])->where(['status' => 'Y', 'show_in_menu' => 'Y', 'parent_id' => 0])
        ->orderBy('name', 'ASC')->get();
        return response()->json($shop_by_department, 200);
    }

    public function search(Request $request)
    {
        $filter = (array)array_merge(['keywords' => @$request->search_input], $request->except('search_input'));
        $products = Product::getProducts($filter);
        return response()->json($products, 200);
        // if(@$request->search_input)
        // {
            
        // }
        // else
        // {
        //     return response()->json(['error'=>'Unauthorized API'], 401);
        // }
    }

    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return response()->json($page, 200);
    }

    public function faqs()
    {
        $faqs = Faqs::where('status', 'Y')->get();
        return response()->json($faqs, 200);
    }

    public function blogs()
    {
        $date = date('Y-m-d');
        $posts = BlogPost::where('status', 'Y')
            ->where('publish_date', '<=', $date)
            ->orderBy('publish_date', 'desc')
            ->paginate(12);
        return response()->json($posts, 200);
    }

    public function blog($slug)
    {
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
                return response()->json(['target_url' => $redirect->target_url], 301);
            }
        }
        // End check for blog redirects
        
        //Breadcrumbs
        $slugUrl = 'blogs';
        $data['breadcrumb'] = true;
        $data['breadcrumbs']    = [];
        array_push($data['breadcrumbs'], (array)['name' => $slugUrl,'link' => $slugUrl]);
        array_push($data['breadcrumbs'], ['name' => $data['post']->name]);
        
        //Page Type
        $data['page_type']    = 'blog_detail';

        if ($data['post']) {
            $recent_posts = BlogPost::where('status', 'Y')->where('publish_date', '<=', $date)->orderBy('publish_date', 'desc')->where('id', '!=', $data['post']->id)->paginate(5);
            //return response()->json(['blog'=> $data['post'], 'recent_posts'=>$recent_posts], 200);
            return response()->json(['blog'=> $data['post'], 'recent_posts'=>$recent_posts, 'breadcrumbs'=> $data['breadcrumbs'], 'page_type'=>$data['page_type']], 200);
        } else {
            return response()->json(['page_error' => '404'], 404);
        }
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
        $start_year = $years['mx_year'];
        $end_year = $years['mn_year'];

        $data['years_record'] = [];
        for($i = $start_year ; $i >= $end_year ; $i--)
        {
            foreach($monthsArray as $month => $name)
            {
                $data['years_record'][$i][$month] = ['month' => $name,'counts' => Show::whereYear('start_date', $i)->whereMonth('start_date', $month)->count()];
            }
        }

        $data['shows'] = $query->orderBy('position', 'asc')->orderBy('start_date', 'asc')->paginate(15);
        $data['monthsArray'] = $monthsArray;
        return response()->json($data, 200);
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
        } elseif ($url == 'order-you-like') {
            $data['breadcrumb'] = true;
            $data['breadcrumbs'][] = 'Order You Like';
            $data['heading'] = 'Order You Like';
            $data['short_description'] = ' ';
            $data['banner_header'] = Banner::where([
                'area_id' => 25,
                'status' => 'Y',
            ])->first();
        }
        return response()->json($data, 200);
    }

    public function track_order(Request $request)
    {
        if ($request->input('tracking_code')) {
            $order = Order::trackOrder($request->input('tracking_code'));
            $data['order'] = $order;
        }

        return response()->json($data, 200);
    }

    public function seller_store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if($validation->fails())
            return response()->json(['error' => $validation->messages()], 200);

        $details = $request->all();
        
        Mail::send(new ContactMail($details));

        return response()->json(['success' => 'Mail sent successfully, Our team will be contact you soon.'], 200);
    }

    public function countries()
    {
        $countries = Country::orderBy('name', 'ASC')->get();
        return response()->json($countries);
    }

    public function states_by_country(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->orderBy('name', 'ASC')->get();
        return response()->json($states);
    }
}
