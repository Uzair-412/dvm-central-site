<?php

namespace App\Http\Controllers\ApisV2\Resources;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use App\Models\Program;
use DB;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{

    public function news()
    {
        $news = NewsPost::where('status', 'Y')->select('id','slug','image_thumbnail','publish_date')->orderBy('publish_date', 'DESC')->paginate(15);
        return response()->json($news, 200);
    }

    public function single_news($slug)
    {
        /* Fetching Specific news details */
        $data['news'] = NewsPost::where([['slug', $slug],['status', 'Y']])->select('id','name','full_content','slug','top_image_banner','meta_title','meta_keywords','meta_description','publish_date')->first();

        /* Fetching Recent News in DESC order with limit 5 */
        $data['recentNews'] = NewsPost::where('status', 'Y')->select('id','slug','image_thumbnail','publish_date')->orderBy('publish_date', 'DESC')->limit(5)->get();
        
        //Breadcrumbs
        $data['breadcrumbs']    = [];
        $parentSlug    = "resources";
        $parentSlugName    = "Resources";

        $parentSlug2    = "resources/news";
        $parentSlug2Name    = "News";

        array_push($data['breadcrumbs'], (array)['name' => $parentSlugName,'link' => $parentSlug]);
        array_push($data['breadcrumbs'], (array)['name' => $parentSlug2Name,'link' => $parentSlug2]);
        array_push($data['breadcrumbs'], (array)['name' => $data['news']->name]);
        
        //Page Type
        $data['page_type']    = 'news_detail';
        return response()->json($data, 200);
    }
}