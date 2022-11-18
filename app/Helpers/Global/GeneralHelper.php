<?php

use Carbon\Carbon;
use App\Http\Controllers\Frontend\CartController;
use App\Models\Address;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductShippingCountry;
use App\Models\State;
use App\Models\Vendor;

use function PHPUnit\Framework\returnValue;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'DVM Central');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     *
     * @return Carbon
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {   
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isCustomer()) {
                return 'frontend.user.dashboard';
            } 
        }

        return 'frontend.index';
    }
}

if (! function_exists('product_cart')) {
    function product_cart($session_num="")
    {
        if($session_num != "")
        {
            $session_num = session()->get('rand_num');
            $session_val = $session_num;
            return Cart::session($session_val);
        }
        return false;
    }
}

if (! function_exists('get_shipping_rate')) {
    function get_shipping_rate($mode = 'full', $vendor_id = null)
    {
        $cartController = new CartController();
        $cart = $cartController->sort_cart_by_vendor();
        if($mode == 'full')
        {
            $total_shipping_charges = 0;
            foreach($cart as $key => $vendor_cart)
            {
                if(isset(request()->session()->get('ses_vendor_coupon')[$key])) // adding free shipping
                {
                    $coupon_id = request()->session()->get('ses_vendor_coupon')[$key]['id'];
                    $coupon = Coupon::where([['id', $coupon_id],['free_shipping', 'Y']])->first();
                    if($coupon)
                    {
                        $total_shipping_charges = 0;
                        continue;
                    }
                }

                if(isset($vendor_cart['shipping_charges']['rate']) && $vendor_cart['selected']==true)
                {
                    $total_shipping_charges += $vendor_cart['shipping_charges']['rate'];
                }
            }

            return $total_shipping_charges;
        }
    }
}

if (! function_exists('get_tax')) {
    function get_tax($vendor_id = null)
    {
        $cartController = new CartController();
        $cart = $cartController->sort_cart_by_vendor();
        $total_tax = 0;
        if($vendor_id == null)
        {
            foreach($cart as $key => $vendor_cart)
            {
                if(isset($vendor_cart['tax']) && $vendor_cart['selected']==true)
                {
                    $total_tax += $vendor_cart['tax'];
                }
            }
        }
        else
        {
            return $cart[$vendor_id]['tax'];
        }

        return $total_tax;
    }
}

if (! function_exists('get_discount')) {
    function get_discount($mode = 'full', $vendor_id = null)
    {
        if($mode == 'full')
        {
            $discount = 0;
            $coupons = request()->session()->get('ses_vendor_coupon'); // Get all coupons by vendor
            $product_cart = product_cart(session()->get('rand_num'));
            $cartItems = $product_cart->getContent(); // get all cart items
            foreach($coupons as $key => $coupon)
            {
                foreach ($cartItems as $cart) {
                    if($cart->attributes->vendor_id==$key && $cart->selected==true) // If vendor is selected
                    {
                        if ($coupon['type'] == 'amount') {
                            $discount = $coupon['value'];
                        } else {
                            $discount += (($cart->price * $cart->quantity) * $coupon['value']) / 100;
                        }
                    }
                }
            }
            return $discount;
        }
    }
}

if (!function_exists('get_vendor_discount')) {
    function get_vendor_discount($mode = 'full', $vendor_id=null)
    {
        if ($mode == 'full') {
            $discount = 0;
            if (request()->session()->get('ses_vendor_coupon')) {
                $coupons = request()->session()->get('ses_vendor_coupon');
                $product_cart = product_cart(session()->get('rand_num'));
                $cartItems = $product_cart->getContent();
                
                foreach($coupons as $key => $coupon)
                {
                    if($vendor_id==null || ($vendor_id!=null && $key==$vendor_id))
                    {
                        foreach ($cartItems as $cart) {
                            if($cart->attributes->vendor_id==$key && $cart->selected==true)
                            {
                                if ($coupon['type'] == 'amount') {
                                    $discount = $coupon['value'];
                                } else {
                                    $discount += (($cart->price * $cart->quantity) * $coupon['value']) / 100;
                                }
                            }
                        }
                    }
                }
            }
            $discount = number_format($discount, 2);
            $discount = (float)str_replace(',', '', $discount);
            return (float)$discount;
        }
    }
}


if (!function_exists('get_selected_cart_total')) {
    function get_selected_cart_total($type='total', $vendor=null)
    {
        $total = 0;
        $total_tax = 0;
        $product_cart = product_cart(session()->get('rand_num'));
        $cartItems = $product_cart->getContent();
        foreach ($cartItems as $cart) {
            if( ($cart->selected==true && $vendor==null) || ($cart->selected==true && $vendor!=null && $vendor==$cart->attributes->vendor_id) )
            {
                if($cart->attributes->discount == 0)
                {
                    $total += (float)($cart->attributes->price_catalog * $cart->quantity);
                }
                else
                {
                    $total += (float)($cart->attributes->price_discounted * $cart->quantity);
                }
            }
        }
        if($type=='total')
        {
            $vendor_discount = get_vendor_discount();
            $shipping_cost = get_shipping_rate();
            $total = (float)$total - (float)$vendor_discount;
            $total += (float)$shipping_cost;
        }
        $total = number_format($total, 2);
        $total = (float)str_replace(',', '', $total);
        return (float)$total;
    }
}

if (!function_exists('get_selected_cart_items')) {
    function get_selected_cart_items()
    {
        $items = [];
        $product_cart = product_cart(session()->get('rand_num'));
        $cartItems = $product_cart->getContent();
        foreach ($cartItems as $cart) {
            if($cart->selected==true)
            {
                $items[] = $cart;
            }
        }
        return $items;
    }
}

if (!function_exists('clear_selected_cart_items')) {
    function clear_selected_cart_items()
    {
        $product_cart = product_cart(session()->get('rand_num'));
        $cartItems = $product_cart->getContent();
        foreach ($cartItems as $key => $cart) {
            if($cart->selected==true)
            {
                $product_cart->remove($key);
            }
        }
        return true;
    }
}


if (!function_exists('check_available_shipping_country')) {
    function check_available_shipping_country()
    {
        $product_cart = product_cart(session()->get('rand_num'));
        $Cart = $product_cart->getContent();
        $returnValue = true;
        foreach ($Cart as $vendor_id => $cart_item) {
            $check_available = check_available_shipping_for_product($cart_item->id);
            if($check_available == false) // if product avaiable for shippment
            {
                $returnValue = false;
                break;
            }
        }
        if($returnValue == false)
        {
            session()->flash('flash_danger', 'Some of these products shippment not available for your provided address!');
        }
        return $returnValue;
    }
}


if (!function_exists('check_available_shipping_for_product')) {
    function check_available_shipping_for_product($productId)
    {
        $returnValue = array('success'=>true,'message'=> '');
        $product = Product::find($productId);
        if($product->parent_id!=0)
        {
            $product = Product::find($product->parent_id);
        }
        if($product->shipping_type == 'place')
        {
            $shpping_product = ProductShippingCountry::where('product_id',$product->id)->get();
            if($shpping_product->count() > 0 && session()->get('ses_shipping_details')) // if product has limited shippment areas
            {
                $country = Country::where(function($q){
                    $q->orWhere('iso2',session()->get('ses_shipping_details')['country']);
                    $q->orWhere('id',session()->get('ses_shipping_details')['country']);
                })->first();
                $state = State::where(['country_id'=>$country->id,'iso2'=>session()->get('ses_shipping_details')['state']])->first();
                foreach($shpping_product as $shipping)
                {
                    $message_place = '';
                    if($shipping->shipping_country_id != 0 && $shipping->shipping_state_id!=null && $shipping->shipping_zip_code!=null) // when vendor added country, state and zip code
                    {
                        $data= [
                            'shipping_country_id'=> $country->id,
                            'shipping_state_id'=> $state->id,
                            'shipping_zip_code'=> session()->get('ses_shipping_details')['zip'],
                            'product_id'=> $product->id
                        ];
                        $message_place = 'zip code';
                    }
                    else if($shipping->shipping_country_id != 0 && $shipping->shipping_state_id!=null && $shipping->shipping_zip_code==null) // when vendor added country and state
                    {
                        $data= [
                            'shipping_country_id'=> $country->id,
                            'shipping_state_id'=> $state->id,
                            'product_id'=> $product->id
                        ];
                        $message_place = 'state';
                    }
                    else // when vendor added only country
                    {
                        $data= [
                            'shipping_country_id'=> $country->id,
                            'product_id'=> $product->id
                        ];
                        $message_place = 'country';
                    }
                    // if selected product shippment matched with shipping details by vendor
                    $check_product_with_country = ProductShippingCountry::where($data)->first();
                    if(empty($check_product_with_country)) // If product not exist for specific place or area
                    {
                        $returnValue = array('success'=>false,'message'=> 'This product is not available for shippment in selected '.$message_place.'!');
                    }
                    else
                    {
                        $returnValue = array('success'=>true,'message'=> '');
                        break;
                    }
                }
            }
        }
        else if($product->shipping_type == 'miles')
        {
            if(@session()->get('ses_shipping_details')['id'])
            {
                $vendor_id = $product->vendor_id;
                if($product->vendor_id==0)
                {
                    $parent_product = Product::find($product->parent_id);
                    $vendor_id = $parent_product->vendor_id;
                }
                $address = Address::where('id',session()->get('ses_shipping_details')['id'])->select('latitude', 'longitude')->first();
                $vendor = Vendor::where('id',$vendor_id)->select('latitude', 'longitude')->first();
                $miles = calculateDistance((float)$address->latitude, (float)$address->longitude, (float)$vendor->latitude, (float)$vendor->longitude);
                if($miles>$product->shipping_miles)
                {
                    $returnValue = array('success'=>false,'message'=> 'This product is not available for shippment in selected area!');
                }
            }
        }
        return $returnValue;
    }
}

if (!function_exists('calculateDistance')) {
    function calculateDistance($lat1, $long1, $lat2, $long2){
        $theta = $long1 - $long2;
        $miles = (sin(deg2rad($lat1))) * sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        return $miles;
    }
}