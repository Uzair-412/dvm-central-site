<?php

namespace App\Http\Controllers\ApisV2\Resources;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Redirect;

use DB;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function blogs()
    {
        $date = date('Y-m-d');
        $data['posts'] = BlogPost::where('status', 'Y')->where('publish_date', '<=', $date)->select('id','name','slug','short_content','image_thumbnail','publish_date')->orderBy('publish_date', 'desc')->paginate(12);

        $data['breadcrumbs']    = [];
        $parentSlug    = "resources";
        $parentSlugName    = "Resources";
        
        array_push($data['breadcrumbs'], (array)['name' => $parentSlugName,'link' => $parentSlug]);
        array_push($data['breadcrumbs'], (array)['name' => 'Blogs']);

        return response()->json($data, 200);
    }

    public function blog($slug)
    {
        $date = date('Y-m-d');

        $data['post'] = BlogPost::where('status', 'Y')->where('publish_date', '<=', $date)->where('slug', $slug)->first();

        // return response()->json($data, 200);

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
        array_push($data['breadcrumbs'], (array)['name' => "Blogs",'link' => $slugUrl]);
        array_push($data['breadcrumbs'], ['name' => $data['post']->name]);
        
        //Page Type
        $data['page_type']    = 'blog_detail';

        if ($data['post']) {
            $recent_posts = BlogPost::where('status', 'Y')->where('publish_date', '<=', $date)->select('id','name','slug','short_content','image_thumbnail','publish_date')->orderBy('publish_date', 'desc')->where('id', '!=', $data['post']->id)->paginate(5);
            //return response()->json(['blog'=> $data['post'], 'recent_posts'=>$recent_posts], 200);
            return response()->json(['blog'=> $data['post'], 'recent_posts'=>$recent_posts, 'breadcrumbs'=> $data['breadcrumbs'], 'page_type'=>$data['page_type']], 200);
        } else {
            return response()->json(['page_error' => '404'], 404);
        }
    }
}