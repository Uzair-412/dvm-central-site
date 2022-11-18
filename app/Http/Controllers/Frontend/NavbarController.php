<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use App\Models\Category;
use Illuminate\Support\Facades\Request;


class NavbarController extends Controller
{
    public function DesktopNav()
    {
        if(Request::get('utm'))
        {
            session(['ses_utm' => Request::where('status','Y')->get('utm')]);
        }

        $business_types = BusinessType::getLeftMenuBusinessTypes();

        $main_menu = '
        <ul class="menu--dropdown">';

        foreach($business_types as $business_type)
        {
            $main_categories = Category::getLeftMenuCategories(['business_type' => $business_type->id]);

            $css_child_menu = '';
            if($main_categories)
            {
                $css_child_menu = 'class="menu-item-has-children has-mega-menu"';
            }

            $main_menu .= '
            <li '. $css_child_menu .'>
                <a href="'. $business_type->slug .'"><i class="'. $business_type->icon_code .'"></i> '. $business_type->name .'</a>
            ';

            // Main Categories

            if($main_categories)
            {
                $main_menu .= '<div class="mega-menu">';

                foreach($main_categories as $mc)
                {
                    $main_menu .= '
                        <div class="mega-menu__column">
                            <h4>'. $mc->name .'<span class="sub-toggle"></span></h4>';
                            
                            $child_categories = Category::getLeftMenuCategories(['parent_id' => $mc->id]);

                            if($child_categories)
                            {
                                $main_menu .= '<ul class="mega-menu__list">';

                                foreach($child_categories as $cc)
                                {
                                    $main_menu .= '<li><a href="'. $cc->slug .'">'. $cc->name .'</a></li>';
                                }

                                $main_menu .= '</ul>';
                            }

                        $main_menu .= '</div>
                    ';
                }

                $main_menu .= '</div>';
            }
            // End Main Categories

            $main_menu .= '</li>';

        }

        $main_menu .= '</ul>';

        return response()->json([
            'status'=>200,
            'message' => "success",
            'data' => $main_menu,
        ]);
    }

    public function MobileNav()
    {
        if(Request::get('utm'))
        {
            session(['ses_utm' => Request::where('status','Y')->get('utm')]);
        }

        $business_types = BusinessType::getLeftMenuBusinessTypes();

         $main_menu_mobile = '
        <ul class="menu--mobile">';

        foreach($business_types as $business_type)
        {
            $main_categories = Category::getLeftMenuCategories(['business_type' => $business_type->id]);

            $css_child_menu = '';
            if($main_categories)
            {
                $css_child_menu = 'class="menu-item-has-children has-mega-menu"';
            }

            $main_menu_mobile .= '
            <li '. $css_child_menu .'>
                <a href="'. $business_type->slug .'"><i class="'. $business_type->icon_code .'"></i> '. $business_type->name .'</a><span class="sub-toggle"></span>
            ';

            // Main Categories

            if($main_categories)
            {
                $main_menu_mobile .= '<div class="mega-menu">';

                foreach($main_categories as $mc)
                {
                    $main_menu_mobile .= '
                        <div class="mega-menu__column">
                            <h4 class="d-flex"><div class="w-75">'. $mc->name .'</div><span class="sub-toggle"></span></h4>';
                            
                            $child_categories = Category::getLeftMenuCategories(['parent_id' => $mc->id]);

                            if($child_categories)
                            {
                                $main_menu_mobile .= '<ul class="mega-menu__list">';

                                foreach($child_categories as $cc)
                                {
                                    $main_menu_mobile .= '<li><a href="'. $cc->slug .'">'. $cc->name .'</a></li>';
                                }

                                $main_menu_mobile .= '</ul>';
                            }

                        $main_menu_mobile .= '</div>
                    ';
                }

                $main_menu_mobile .= '</div>';
            }
            // End Main Categories

            $main_menu_mobile .= '</li>';

        }

        $main_menu_mobile .= '</ul>';

        // $view->with('main_menu', $main_menu)->with('main_menu_mobile',$main_menu_mobile);

        return response()->json([
            'status'=>200,
            'message' => "success",
            'data' => $main_menu_mobile,
        ]);
    }
}
