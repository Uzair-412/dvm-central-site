<?php

namespace App\Http\Composers;

use App\Http\Controllers\Frontend\LandingController;
use App\Models\Category;
use App\Models\Product;
use App\Models\BusinessType;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

/**
 * Class GlobalComposer.
 */
class GlobalComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        if(!@session()->get('rand_num'))
        {
            session()->put('rand_num', rand(0,1000));
        }
        $view->with('logged_in_user', Auth::user());
        if(str_contains(url()->current(), 'admin')==false)
        {
            /*$menu_categories = Category::getLeftMenuCategories();
            $view->with('menu_categories', $menu_categories);
            $menu_business_type = BusinessType::getLeftMenuBusinessType();
            $view->with('menu_business_type', $menu_business_type);*/

            /*$modal_products = Product::get();
            $view->with('modal_products', $modal_products);*/

            // if(Request::get('utm'))
            // {
            //     session(['ses_utm' => Request::where('status','Y')->get('utm')]);
            // }

            // $business_types = BusinessType::getLeftMenuBusinessTypes();

            // $main_menu = '
            // <ul class="menu--dropdown">';
            
            // $business_types = BusinessType::where(['status' => 'Y'])->limit(4)->get();
            // foreach($business_types as $key=>$business_type)
            // {
            //     $main_categories = Category::getLeftMenuCategories(['business_type' => $business_type->id]);
            //     $business_types[$key]['child_categories'] = $main_categories;
            //     // $main_categories = Category::getLeftMenuCategories();

            // //     $css_child_menu = '';
            //     // if($main_categories)
            //     // {
            //     //     $css_child_menu = 'class="menu-item-has-children has-mega-menu"';
            //     // }

            // //     $main_menu .= '
            // //     <li '. $css_child_menu .'>
            // //         <a href="'. $business_type->slug .'"><i class="'. $business_type->icon_code .'"></i> '. $business_type->name .'</a>
            // //     ';

            // //     // Main Categories

            //     if($main_categories)
            //     {
            // //         $main_menu .= '<div class="mega-menu">';

            //         foreach($main_categories as $mainKey=>$mc)
            //         {
            //             //             $main_menu .= '
            //             //                 <div class="mega-menu__column">
            //             //                     <h4>'. $mc->name .'<span class="sub-toggle"></span></h4>';

            //             $child_categories = Category::getLeftMenuCategories(['parent_id' => $mc->id]);
            //             $business_types[$key]['child_categories'][$mainKey]['child_categories'] = $child_categories;

            //                     // if($child_categories)
            //                     // {
            // //                         $main_menu .= '<ul class="mega-menu__list">';

            //                         foreach($child_categories as $subKey => $cc)
            //                         {
            //                             // $main_menu .= '<li><a href="'. $cc->slug .'">'. $cc->name .'</a></li>';
            //                             $business_types[$key]['child_categories'][$mainKey]['child_categories'][$subKey]['child_categories'] = Category::getLeftMenuCategories(['parent_id' => $cc->id]);
            //                         }

            // //                         $main_menu .= '</ul>';
            //                     // }

            // //                 $main_menu .= '</div>
            // //             ';
            //         }

            // //         $main_menu .= '</div>';
            //     }
            // //     // End Main Categories

            // //     $main_menu .= '</li>';

            // }
            // $view->with('menu_categories', $business_types);
        }

        // $main_menu .= '</ul>';

        // Mobile View
        
        // $main_menu_mobile = '
        // <ul class="menu--mobile">';

        // foreach($business_types as $business_type)
        // {
        //     $main_categories = Category::getLeftMenuCategories(['business_type' => $business_type->id]);

        //     $css_child_menu = '';
        //     if($main_categories)
        //     {
        //         $css_child_menu = 'class="menu-item-has-children has-mega-menu"';
        //     }

        //     $main_menu_mobile .= '
        //     <li '. $css_child_menu .'>
        //         <a href="'. $business_type->slug .'"><i class="'. $business_type->icon_code .'"></i> '. $business_type->name .'</a><span class="sub-toggle"></span>
        //     ';

        //     // Main Categories

        //     if($main_categories)
        //     {
        //         $main_menu_mobile .= '<div class="mega-menu">';

        //         foreach($main_categories as $mc)
        //         {
        //             $main_menu_mobile .= '
        //                 <div class="mega-menu__column">
        //                     <h4 class="d-flex"><div class="w-75">'. $mc->name .'</div><span class="sub-toggle"></span></h4>';
                            
        //                     $child_categories = Category::getLeftMenuCategories(['parent_id' => $mc->id]);

        //                     if($child_categories)
        //                     {
        //                         $main_menu_mobile .= '<ul class="mega-menu__list">';

        //                         foreach($child_categories as $cc)
        //                         {
        //                             $main_menu_mobile .= '<li><a href="'. $cc->slug .'">'. $cc->name .'</a></li>';
        //                         }

        //                         $main_menu_mobile .= '</ul>';
        //                     }

        //                 $main_menu_mobile .= '</div>
        //             ';
        //         }

        //         $main_menu_mobile .= '</div>';
        //     }
        //     // End Main Categories

        //     $main_menu_mobile .= '</li>';

        // }

        // $main_menu_mobile .= '</ul>';

        // $view->with('main_menu', $main_menu)->with('main_menu_mobile',$main_menu_mobile);

        /*$zoom = LandingController::getZoomSession();

        $view->with('zoom', $zoom);*/
    }
}
