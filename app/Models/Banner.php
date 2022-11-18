<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banners';

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
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public static $areas = [
        1 => 'Home Page Slider',
        2 => 'Home Page Banner 1 390x193',
        3 => 'Home Page Banner 2 390x193',
        4 => 'Home Page Main Categories Banner 1 530x285',
        5 => 'Home Page Main Categories Banner 2 530x285',
        6 => 'Home Page Main Categories Banner 3 530x285',
        7 => 'Home Page Special Banner 1 1090x245',
        8 => 'Home Page Special Banner 2 530x245',
        9 => 'Business Type Page Banner - 290px Width',
        10 => 'Blog Detail Page Banner - 270px Width',
        11 => 'Category Listing Left Banner - 270px Width',
        12 => 'Product Listing Left Banner - 270px Width',
        13 => 'Category Listing - Top Banner - Special Offers',
        14 => 'Product Detail - Top Banner - Special Offers',
        15 => 'Vendor Page Top Banner 1520 × 305 ',
        16 => 'Vendor Page Left Banner 290 × 400',
        17 => 'Vendor Page Between Banner 1459 × 365',
        18 => 'Vendor Page Bottom Left Banner 400 × 250',
        19 => 'Vendor Page Bottom Center Banner 400 × 250',
        20 => 'Vendor Page Bottom Right Banner 400 × 250',
        21 => 'Today Deals Page Top Banner 1519 × 304',
        22 => 'Hot Selling Items Page Top Banner 1519 × 304',
        23 => 'Order What You Like Page Top Banner 1519 × 304',
        24 => 'Special Offers Page Top Banner 1519 × 304',
        25 => 'Hot New Arrivals Page Top Banner 1519 × 304',
        26 => 'Seller Page Top Banner 1519 × 304',
        27 => 'Seller Page Left Banner 290 × 400',
        404 => '404 Page Banner',
    ];

    public static function showBanner($area_id, $css = '')
    {
        $html = '';

        if($area_id == 1)
        {
            $banners = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->orderBy('id', 'desc')->get();

            foreach($banners as $banner)
            {
                $image = 'banners/'.$banner->image;
                if($banner->image != '' &&  Storage::disk('ds3')->exists($image))
                { 
                    $path = Storage::disk('ds3')->url($image);
                    
                    $image = '<img src="'. $path .'" alt="'. $banner->name .'" class="img-fluid">';

                    $link = '';
                    if($banner->link != '')
                        $image = '<a class="ps-banner__overlay" href="'. $banner->link .'"  aria-label="'. $banner->name .'">'.$image.'</a>';
                    
                    $html .= '<div>'. $image .'</div>';
                }
            }
        } // 1 - Slider
        elseif($area_id == 2 || $area_id == 3)
        {
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                $image = 'banners/'.$banner->image;
                if($banner->image != '' && Storage::disk('ds3')->exists($image)){ 
                    $path = Storage::disk('ds3')->url($image);
                } else {
                    $path = 'https://via.placeholder.com/390x193';
                }
                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href=\''. $banner->link .'\'   aria-label="'. $banner->name .'">';

                    $html .= '<img class="img-responsive ps-collection lazyload '. $css .'" data-src="'. $path .'" alt="'. $banner->name .'" srcset="'. $path .' 470w, '. $path .' 820w, '. $path .' 1440w">';

                if($banner->link != '')
                    $html .= '</a>';
            }
        }
        elseif($area_id == 4 || $area_id == 5 || $area_id == 6)
        {
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                $image = 'banners/'.$banner->image;
                if($banner->image != '' && Storage::disk('ds3')->exists($image)){ 
                    $path = Storage::disk('ds3')->url($image);
                } else {
                    $path = 'https://via.placeholder.com/530x285';
                }
                $html .= '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 d-o-d-banners">';
                if($banner->link != '')
                    $html .= '<a class="overflow-hidden '. $css .'" href="'. $banner->link .'"   aria-label="'. $banner->name .'">';
                else
                    $html .= '<div class="overflow-hidden '. $css .'">';
                    $html .= '<img class="img-responsive ps-collection lazyload hover-effect '. $css .'" data-src="'. $path .'" alt="'. $banner->name .'" srcset="'. $path .' 470w, '. $path .' 820w, '. $path .' 1440w">';
                if($banner->link != '')
                    $html .= '</a>';
                else
                    $html .= '</div>';
                $html .= '</div>';
            }
        }
        elseif($area_id == 7)
        {
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                $image = 'banners/'.$banner->image;
                if($banner->image != '' && Storage::disk('ds3')->exists($image)){ 
                    $path = Storage::disk('ds3')->url($image);
                } else {
                    $path = 'https://via.placeholder.com/1090x245';
                }
                
                $html .= '<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">';
                
                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href="'. $banner->link .'"   aria-label="'. $banner->name .'">';
                
                $html .= '<img class="ps-collection lazyload '. $css .'" data-src="'. $path .'" alt="'. $banner->name .'" srcset="'. $path .' 470w, '. $path .' 820w, '. $path .' 1440w">';

                if($banner->link != '')
                    $html .= '</a>';
                
                $html .= '</div>';
            }
        }
        elseif($area_id == 8){
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                $image = 'banners/'.$banner->image;

                if($banner->image != '' && Storage::disk('ds3')->exists($image))
                { 
                    $path = Storage::disk('ds3')->url($image);
                } 
                else 
                {
                    $path = 'https://via.placeholder.com/530x245';
                }

                $html .= '<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 s-o-banner">';

                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href="'. $banner->link .'"  aria-label="'. $banner->name .'">';

                $html .= '<img class="ps-collection lazyload '. $css .'" data-src="'. $path .'" alt="'. $banner->name .'" srcset="'. $path .' 470w, '. $path .' 820w, '. $path .' 1440w">';

                if($banner->link != '')
                    $html .= '</a>';

                $html .= '</div>';
            }
        }
        elseif($area_id == 9){
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href="'. $banner->link .'"  aria-label="'. $banner->name .'">';
                $html .= '<img class="ps-collection '. $css .'" data-src="up_data/banners/'. $banner->image .'" alt="'. $banner->name .'" class="w-100" srcset="up_data/banners/'. $banner->image .' 470w, up_data/banners/'. $banner->image .' 820w, up_data/banners/'. $banner->image .' 1440w">';
                if($banner->link != '')
                    $html .= '</a>';
            }
        }
        else
        {
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                if($banner->image != ''){
                    $location = 'banners/'.$banner->image;
                    $path = Storage::disk('ds3')->exists($location) ? Storage::disk('ds3')->url($location) : 'https://via.placeholder.com/290x537.png?text=Image+Not+Available+In+The+Bucket';
                }else{
                    $path = 'https://via.placeholder.com/290x537.png';
                }
                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href=\''. $banner->link .'\'  aria-label="'. $banner->name .'">';
                    $html .= '<img src="'. $path .'" alt="'. $banner->name .'">';

                if($banner->link != '')
                    $html .= '</a>';
            }
        }

        return $html;
    }

    public static function showBannerAmp($area_id, $css = '')
    {
        $html = '';

        if($area_id == 1)
        {
            $banners = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->orderBy('id', 'desc')->get();
            foreach($banners as $banner)
            {
                $image = $banner->image_amp;
                if(trim($image) == null)
                    $image = $banner->image;

                if($banner->link != '')
                    $html .= '<a href="'. $banner->link .'"  aria-label="'. $banner->name .'">';
                $html .= '<amp-img alt="'. $banner->name .'" src="up_data/banners/'. $image .'" width="500" height="300" ></amp-img>';

                if($banner->link != '')
                    $html .= '</a>';
            }

        } // 1 - Slider
        elseif($area_id == 5 || $area_id == 6)
        {
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                $image = $banner->image_amp;
                if(trim($image) == null)
                    $image = $banner->image;

                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href=\''. $banner->link .'\' aria-label="'. $banner->name .'">';

                $html .= '<amp-img alt="'. $banner->name .'" src="up_data/banners/'. $image .'"  width="350" height="120"></amp-img>';

                if($banner->link != '')
                    $html .= '</a>';
            }
        }
        elseif($area_id == 2 || $area_id == 8)
        {
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                $image = $banner->image_amp;
                if(trim($image) == null)
                    $image = $banner->image;

                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href=\''. $banner->link .'\' aria-label="'. $banner->name .'">';

                $html .= '<amp-img alt="'. $banner->name .'" src="up_data/banners/'. $image .'"width="350" height="120"></amp-img>';

                if($banner->link != '')
                    $html .= '</a>';
            }
        }
        elseif($area_id == 3 || $area_id == 4)
        {
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                $image = $banner->image_amp;
                if(trim($image) == null)
                    $image = $banner->image;

                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href=\''. $banner->link .'\' aria-label="'. $banner->name .'">';

                $html .= '<amp-img alt="'. $banner->name .'" src="up_data/banners/'. $image .'" width="350" height="250"></amp-img>';

                if($banner->link != '')
                    $html .= '</a>';
            }
        }
        else
        {
            $banner = Banner::where(['area_id' => $area_id, 'status' => 'Y'])->inRandomOrder()->first();

            if($banner)
            {
                $image = $banner->image_amp;
                if(trim($image) == null)
                    $image = $banner->image;

                if($banner->link != '')
                    $html .= '<a class="'. $css .'" href=\''. $banner->link .'\' aria-label="'. $banner->name .'">';

                $html .= '<amp-img alt="'. $banner->name .'" src="up_data/banners/'. $image .'" width="270" height="400"></amp-img>';

                if($banner->link != '')
                    $html .= '</a>';
            }
        }

        return $html;
    }


    public static function getBanners($area_id)
    {
        return Banner::where('area_id', $area_id)->pluck('name','id')->toArray();
    }

    public static function getBanner($id)
    {
        $show_banner = false;
        $html = '';
        $banner = self::find($id);

        if($banner)
        {
            if($banner->date_start == '' && $banner->date_end == '')
                $show_banner = true;
            else
            {
                $today = date('Y-m-d');
                if($banner->date_start != '' && $banner->date_end != '')
                {
                    if($today >= $banner->date_start && $today <= $banner->date_end)
                        $show_banner = true;
                }
                elseif($banner->date_start != '')
                {
                    if($today >= $banner->date_start)
                        $show_banner = true;
                }
                elseif($banner->date_end != '')
                {
                    if($today <= $banner->date_end)
                        $show_banner = true;
                    else
                        $show_banner = false;
                }
            }

            if($show_banner)
            {
                if($banner->link != '')
                    $html .= '<a href=\''. $banner->link .'\'" aria-label="'. $banner->name .'">';
                    $html .= '<img class="lazyload" data-src="up_data/banners/'. $banner->image .'" alt="'. $banner->name .'">';

                if($banner->link != '')
                    $html .= '</a>';

                return $html;
            }
        }

        return $show_banner;
    }
}