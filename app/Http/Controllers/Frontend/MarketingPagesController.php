<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketingPagesController extends Controller
{
    public function buy_direct(){
        $data['breadcrumb']     = true;
        $data['description'][]  = 'buy direct';
        return view('frontend.pages.marketing.buy-direct', compact('data'));
    }

    public function ce_courses(){
        $data['breadcrumb']     = true;
        $data['description'][]  = 'ce courses';
        return view('frontend.pages.marketing.ce-courses', compact('data'));
    }

    public function educational_resources(){
        $data['breadcrumb']     = true;
        $data['description'][]  = 'educational resources';
        return view('frontend.pages.marketing.educational-resources', compact('data'));
    }

    public function free_webinars(){
        $data['breadcrumb']     = true;
        $data['description'][]  = 'free webinars';
        return view('frontend.pages.marketing.free-webinars', compact('data'));
    }

    public function guides(){
        $data['breadcrumb']     = true;
        $data['description'][]  = 'guides';
        return view('frontend.pages.marketing.guides', compact('data'));
    }

    public function market_place(){
        $data['breadcrumb']     = true;
        $data['description'][]  = 'market place';
        return view('frontend.pages.marketing.market-place', compact('data'));
    }

    public function personalized_store_pages(){
        $data['breadcrumb']     = true;
        $data['description'][]  = 'personalized store pages';
        return view('frontend.pages.marketing.personalized store pages', compact('data'));
    }

    public function seller_central_portal(){
        $data['breadcrumb']     = true;
        $data['description'][]  = 'seller central portal';
        return view('frontend.pages.marketing.seller-central-portal', compact('data'));
    }
}
