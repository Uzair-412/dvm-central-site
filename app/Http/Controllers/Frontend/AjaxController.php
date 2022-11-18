<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Product;
use App\Models\State;
use App\Models\Subscribe;
// use Cart;
use \Cart;
use Cartalyst\Stripe\Api\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\ProductViews;
use Illuminate\Support\Facades\Storage;
use App\Helpers\UserSystemInfoHelper;
use App\Models\Slug;

class AjaxController extends Controller
{
    public function show_search(Request $request)
    {
        $filter = ['keywords' => $request->input('term')];
        $products = Product::getProducts($filter);

        $return = [];

        if($products->count() > 0)
        {
            $inc = 0;
            $data['label']  = '<div class="ps-panel--search-result shadow-lg">
                                    <div class="ps-panel__content">';
            foreach($products as $product)
            {
                if($inc == 10) break;
                $inc++;

                $name           = $product->name;
                $data['id']     = $product->id;
                $data['value']  = $name;
                /*$data['label']  = '
                                <a href="javascript:void(0);">
                                    <img src="up_data/products/images/thumbnails/'. $product->image .'" width="50" height="50"/>
                                    <span>'.$name.'</span><br>
                                    <span>'. $product->sku .' | $'. $product->price .'</span>
                                </a>';*/

                /*$data['label']  = '
                                <table border="0" cellpadding="2" cellspacing="2" width="100%">
                                    <tr>
                                        <td><img class="img img-thumbnail" src="up_data/products/images/thumbnails/'. $product->image .'" width="50" height="50"/></td>
                                        <td><a href="javascript:void(0);">'.$name.'</a></td>
                                    </tr>
                                </table>';*/

                $url = $product->slug;//$product->slugs()->first()->slug;
                $url .= '#'.$request->input('term');

                $product->url = $url;
                $info = Product::getPriceText($product);
                extract($info);

                $path = 'products/images/thumbnails/'.$product->image;
                $image = $product->image != '' ? (Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.jpg';

                $data['label']  = '<div class="ps-product ps-product--wide ps-product--search-result">
                                        <div class="ps-product__thumbnail"><a href="'.$url.'"><img data-src="'. $image .'" class="lazyload" alt="'.$name.'"></a></div>
                                        <div class="ps-product__content">
                                            <a class="ps-product__title" href="'.$url.'">'.$name.'
                                                <p class="ps-product__price"><strong>'. $product->sku .'</strong> | <span class="price">'. $price_text .'</span></p>
                                            </a>
                                        </div>
                                    </div>';

                /*$data['label']  = '<table>
                                    <tr>
                                        <td rowspan="2" style="padding:10px;"><a href="'.$url.'"><img class="img img-thumbnail" src="up_data/products/images/thumbnails/'. $product->image .'" width="75" height="75"/></a></td>
                                        <td><a href="'.$url.'" style="display:block;">'.$name.'</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="'.$url.'">'. $product->sku .' | $'. $product->price .'</a></td>
                                    </tr>
                                </table>';*/

                array_push($return, $data);

            }

            if($products->count() > 10)
            {
                $data['id']     = '';
                $data['value']  = '';
                $data['label']  = '</div>
                                    <div class="ps-panel__footer text-center"><a href="search-results?s='. $request->input('term') .'">See all results ('. $products->products_all->count() .')</a></div>
                                </div>';

                array_push($return, $data);
            }

        }
        else
        {
            $data['id']     = '';
            $data['value']  = '';
            $data['label']  = '<table>
                                <tr style="text-align:center">
                                    <td style="padding:5px; text-align: center;">Sorry!, no results found.</td>
                                </tr>
                            </table>';

            array_push($return, $data);
        }

        return $return;
    }

    public function get_states(Request $request)
    {
        $states = State::select('id', 'name')->where('country_id', $request->input('country_id'))->orderBy('name', 'asc')->get();

        if(count($states) > 0)
        {
            return ['status' => '1', 'data' => $states];
        }

        return ['status' => '0'];
    }

    public function check_email_account(Request $request)
    {
        $email = $request->input('email');

        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return Customer::checkAccountWithEmail($email);
        }
        else
        {
            return ['status' => 0];
        }
    }

    public function get_shipping_rates(Request $request)
    {
        $request->session()->forget('ses_shipping_method');
        $request->session()->forget('ses_shipping_details');

        $this::clear_shipping_conditions();

        $data['shipping_details'] = $request->all();

        $checkoutController = new CheckoutController();
        $rates = $checkoutController->get_shipping_rates($data);

        // Hard Coded Data Started Here
        /*$rates = [
            0 => [
              "enc" => "SW50ZXJuYXRpb25hbCBTYXZlcl9fNjQwLjEz",
              "service" => "International Saver",
              "rate" => 640.13,
              "selected" => false,
            ],
            1 => [
              "enc" => "SW50ZXJuYXRpb25hbCBXb3JsZHdpZGUgRXhwZWRpdGVkX182MDEuOTQ=",
              "service" => "International Worldwide Expedited",
              "rate" => 601.94,
              "selected" => false,
            ]
          ];*/
        //   Hard Coded Data Ended Here

        $request->session()->put('ses_shipping_details', $request->except('_token'));

        if(count($rates) > 0 && !isset($rates['status']))
        {
            $cartController = new CartController();
            $totals = $cartController->get_cart_totals();
            return ['status' => 1, 'data' => $rates, 'grand_total' => '$'.number_format($totals['grand_total'], 2)];
        }
        else
        {
            if(isset($rates['message']))
                $message = $rates['message'];
            else
                $message = 'Sorry, no quotes available for your shipping address, please make sure you have entered correct shipping address.';

            return ['status' => 0, 'message' => $message];
        }
    }

    public function set_shipping_method(Request $request)
    {
        $data = self::set_order_shipping($request->input('shipping_service'), $request->input('notes'));

        return ['status' => 1, 'data' => $data];
    }

    public static function set_order_shipping($shipping_service, $notes = '')
    {
        $dec = explode('__', base64_decode($shipping_service));
        $data['enc'] = $shipping_service;
        $data['service'] = $dec[0];
        $data['rate'] = $dec[1];
        $data['notes'] = $notes;

        self::clear_shipping_conditions();

        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $data['service'].' ($'. $data['rate'] .')',
            'type' => 'shipping',
            'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
            'value' => '+'.$data['rate'],
            'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
        ));
        Cart::condition($condition);

        session()->put('ses_shipping_rate', $data['rate']);

        // BOGO

        $carts = Cart::getContent();
        $sub_total = 0;
        $bogo_discount = 0;
        foreach($carts as $cart)
        {
            $is_freebie = false;
            $freebie_qty = 0;
            if($cart->attributes->freebie)
            {
                $is_freebie = true;
                $freebie_qty = $cart->attributes->freebie_qty;
                error_log('its freebie');
                $item_price = 0;
                $sub_total += $item_price;
            }
            else
            {
                error_log('its not freebie');
                $item_price = $cart->getPriceWithConditions();
                $sub_total += $item_price * $cart->quantity;
            }

            if($cart->bogo_free)
            {
                $total_price_discount = $cart->bogo_free * $item_price;
                $bogo_discount += $total_price_discount;
            }

            if($cart->bogod_count)
            {
                $discounted_price = ($item_price * $cart->bogod_percent) / 100;
                $total_price_discount = $cart->bogod_count * $discounted_price;
                $bogo_discount += $total_price_discount;
            }
        }

        //$grand_total = Cart::getTotal() - $bogo_discount;

        $discount = 0;

        if(session()->get('ses_coupon'))
        {
            $coupon = session()->get('ses_coupon');

            if($coupon['type'] == 'amount')
            {
                $discount = $coupon['value'];
            }
            else
            {
                $discount = ($sub_total * $coupon['value']) / 100;
            }
        }

        if($bogo_discount)
        {
            $discount += $bogo_discount;
        }

        if(session()->get('ses_shipping_rate'))
            $shipping_rate = session()->get('ses_shipping_rate');
        else
            $shipping_rate = 0;

        $grand_total = (($sub_total + $shipping_rate) - $discount);

        session()->put('ses_grand_total', $grand_total);

        // END BOGO

        $data['grand_total'] = '$'.number_format($grand_total, 2);

        session()->put('ses_shipping_method', $data);

        return $data;
    }

    public function set_shipping_address(Request $request)
    {
        $request->session()->forget('ses_shipping_method');

        $this::clear_shipping_conditions();

        $address['shipping_details'] = Address::select(['id', 'first_name', 'last_name', 'company', 'address1', 'address2', 'state', 'city', 'zip', 'country', 'phone', 'vat'])->where('id', $request->input('sp_id'))->first()->toArray();

        $address['shipping_details']['notes'] = '';

        $checkoutController = new CheckoutController();
        $rates = $checkoutController->get_shipping_rates($address);

        $request->session()->put('ses_shipping_details', $address['shipping_details']);

        // BOGO

        $carts = Cart::getContent();
        $sub_total = 0;
        $bogo_discount = 0;
        foreach($carts as $cart)
        {
            $is_freebie = false;
            $freebie_qty = 0;
            if($cart->attributes->freebie)
            {
                $is_freebie = true;
                $freebie_qty = $cart->attributes->freebie_qty;
                error_log('its freebie');
                $item_price = 0;
                $sub_total += $item_price;
            }
            else
            {
                error_log('its not freebie');
                $item_price = $cart->getPriceWithConditions();
                $sub_total += $item_price * $cart->quantity;
            }

            if($cart->bogo_free)
            {
                $total_price_discount = $cart->bogo_free * $item_price;
                $bogo_discount += $total_price_discount;
            }

            if($cart->bogod_count)
            {
                $discounted_price = ($item_price * $cart->bogod_percent) / 100;
                $total_price_discount = $cart->bogod_count * $discounted_price;
                $bogo_discount += $total_price_discount;
            }
        }

        //$grand_total = Cart::getTotal() - $bogo_discount;

        $discount = 0;

        if($request->session()->get('ses_coupon'))
        {
            $coupon = $request->session()->get('ses_coupon');

            if($coupon['type'] == 'amount')
            {
                $discount = $coupon['value'];
            }
            else
            {
                $discount = ($sub_total * $coupon['value']) / 100;
            }
        }

        if($bogo_discount)
        {
            $discount += $bogo_discount;
        }

        // Special AAEP Discount // Also Revert Shipping Change
        /*if($sub_total >= 300)
        {
            $discount += 30;
        }
        elseif($sub_total >= 200)
        {
            $discount += 20;
        }
        elseif($sub_total >= 100)
        {
            $discount += 10;
        }*/
        // Special AAEP Discount

        if($request->session()->get('ses_shipping_rate'))
            $shipping_rate = $request->session()->get('ses_shipping_rate');
        else
            $shipping_rate = 0;

        $grand_total = (($sub_total + $shipping_rate) - $discount);

        $request->session()->put('ses_grand_total', $grand_total);

        // END BOGO

        // END BOGO

        if(count($rates) > 0)
        {
            return ['status' => 1, 'data' => $rates, 'grand_total' => '$'.number_format($grand_total, 2)];
        }
        else
        {
            return ['status' => 0, 'message' => 'Sorry, no quotes are available for this order at this time, please contact support for details.'];
        }
    }

    public static function clear_shipping_conditions()
    {
        $cartConditions = Cart::getConditions();
        foreach($cartConditions as $condition)
        {
            $name = $condition->getName();
            if($condition->getType() == 'shipping')
            {
                Cart::removeCartCondition($name);
            }
        }
    }

    // public function subscribe(Request $request)
    // {
    //     $data['email'] = $request->email;

    //     $check = Subscribe::where('email', $data['email'])->first();

    //         if(!$check)
    //     {
    //         Subscribe::create($data);
    //     }
    //     else
    //     {
    //         $check->update($data);
    //     }

    //     mail::to('zakriya.gmit@gmail.com')->send(new SubscribeMail($details));



    //     return ['status' => 1];
    // }

    public function subscribe(Request $request)
    {
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');

        $data['phone'] = $request->input('phone');
        $data['speciality'] = $request->input('speciality');
        $data['role'] = $request->input('role');
        $data['company'] = $request->input('company');
        $data['product_updates'] = $request->input('product_updates') ? 'Y' : 'N';
        $data['newsletter'] = $request->input('newsletter') ? 'Y' : 'N';

        $data['source'] = ($request->input('subs_type') == 'footer') ? 'footer-subscribe' : 'popup-subscribe';
        $data['code'] = md5(microtime());

        $check = Subscribe::where('email', $data['email'])->first();
        $message = '';
        if(!$check)
        {
            Subscribe::create($data);
            Customer::sendSubscriptionWithCoupon($data);
            $message = 'User Subscribed Successfully.';
            return ['status' => 1, 'message' => $message];
        }
        else
        {
            $message = 'User Already Subscribed.';
            return ['status' => 2, 'message' => $message];
        }
    }

    /*public function subscribe(Request $request)
    {
        $data['email'] = $request->input('email');

        Subscribe::create($data);

        return ['status' => 1];
    }*/

    public function loginUser()
    {
        $user = \App\Models\Auth\User::findOrFail(request('user_id'));
        Auth::login($user);
        return response()->json(['success'=>true]);
    }

    public function search_vendor_item(Request $request)
    {
        
        $vendor_id = Vendor::where('user',  $request->id)->first();

        $products = Product::where('name','LIKE','%'.$request->term.'%')->where(['vendor_id' => $vendor_id->id , 'status' => 'Y' ])->get();

        // dd($vendor_id);

        $return = [];

        if($products->count() > 0)
        {
            $inc = 0;
            $data['label']  = '<div class="ps-panel--search-result shadow-lg">
                                    <div class="ps-panel__content">';
            foreach($products as $product)
            {
                if($inc == 10) break;
                $inc++;

                $name           = $product->name;
                $data['id']     = $product->id;
                $data['value']  = $name;
                /*$data['label']  = '
                                <a href="javascript:void(0);">
                                    <img src="up_data/products/images/thumbnails/'. $product->image .'" width="50" height="50"/>
                                    <span>'.$name.'</span><br>
                                    <span>'. $product->sku .' | $'. $product->price .'</span>
                                </a>';*/

                /*$data['label']  = '
                                <table border="0" cellpadding="2" cellspacing="2" width="100%">
                                    <tr>
                                        <td><img class="img img-thumbnail" src="up_data/products/images/thumbnails/'. $product->image .'" width="50" height="50"/></td>
                                        <td><a href="javascript:void(0);">'.$name.'</a></td>
                                    </tr>
                                </table>';*/

                $url = $product->slug;//$product->slugs()->first()->slug;
                $url .= '#'.$request->input('term');

                $product->url = $url;
                $info = Product::getPriceText($product);
                extract($info);

                $path = 'products/images/thumbnails/'.$product->image;
                $image = $product->image != '' ? (Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.jpg';

                $data['label']  = '<div class="ps-product ps-product--wide ps-product--search-result">
                                        <div class="ps-product__thumbnail"><a href="'.$url.'"><img data-src="'. $image .'" class="lazyload" alt="'.$name.'"></a></div>
                                        <div class="ps-product__content">
                                            <a class="ps-product__title" href="'.$url.'">'.$name.'
                                                <p class="ps-product__price"><strong>'. $product->sku .'</strong> | <span class="price">'. $price_text .'</span></p>
                                            </a>
                                        </div>
                                    </div>';

                /*$data['label']  = '<table>
                                    <tr>
                                        <td rowspan="2" style="padding:10px;"><a href="'.$url.'"><img class="img img-thumbnail" src="up_data/products/images/thumbnails/'. $product->image .'" width="75" height="75"/></a></td>
                                        <td><a href="'.$url.'" style="display:block;">'.$name.'</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="'.$url.'">'. $product->sku .' | $'. $product->price .'</a></td>
                                    </tr>
                                </table>';*/
                // dd($product->id);
                array_push($return, $data);

            }

            if($products->count() > 10)
            {
                $data['id']     = '';
                $data['value']  = '';
                $data['label']  = '</div>
                                    <div class="ps-panel__footer text-center"><a href="search-result?id='. $vendor_id->user .'&s='. $request->input('term') .'">See all results ('. $products->count() .')</a></div>
                                </div>';

                array_push($return, $data);
            }

        }
        else
        {
            $data['id']     = '';
            $data['value']  = '';
            $data['label']  = '<table>
                                <tr style="text-align:center">
                                    <td style="padding:5px; text-align: center;">Sorry!, no results found.</td>
                                </tr>
                            </table>';

            array_push($return, $data);
        }

        return $return;
    }

    public function add_impression(Request $request)
    {

        $values = $request->product_val;

        $data['products'] = Product::whereIn('id', $values)->get();
        
        $slug = $request->slug;
        
        if($slug == '')
        {
            $page = "Home Page";
        }
        elseif($slug == 'Search Page' || $slug == "Business Type Page" || $slug == 'Vendor Search Page' || $slug == 'Vendor Detail Page' || $slug == 'Today\'s Deals Page' || $slug == 'Hot Selling Items Page' || $slug == 'Special Offers Page' || $slug == 'Hot New Arrivals Page' || $slug == 'Order You Like Page' || $slug == 'Comparison Products Page' || $slug == 'WishList Page'){
            $page = $slug;
        }else{
            $slug_type = Slug::where('slug', $slug)->value('sluggable_type');
            $type = explode("\\", $slug_type);
            $page = $type[2];
        }
        
        if($page == "Product"){
            $page = "Product Detail Page";
        }elseif($page == "Category"){
            $page = "Category Detail Page";
        }

        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getdevice = UserSystemInfoHelper::get_device();
        $getos = UserSystemInfoHelper::get_os();
        $customer_id = Auth::user() == null ? NULL : Auth::user()->id;
        $productViews = array();
        foreach($data['products'] as $product){
            if($customer_id){
                $productViews[] = ([
                    'product_id' => $product->id,
                    'vendor_id' => $product->vendor_id,
                    'customer_id' => $customer_id,
                    'type' => 'impression',
                    'section' => $page,
                    'ip_address' => $getip,
                    'borwser' => $getbrowser,
                    'operating_system' => $getos,
                    'user_agent' => $getdevice,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }else{
                $productViews[] = ([
                    'product_id' => $product->id,
                    'vendor_id' => $product->vendor_id,
                    'type' => 'impression',
                    'section' => $page,
                    'ip_address' => $getip,
                    'borwser' => $getbrowser,
                    'operating_system' => $getos,
                    'user_agent' => $getdevice,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        
        $data['productViews'] = ProductViews::insert($productViews);
        
        return response()->json([
            'status'=>200,
            'message' => "success",
        ]);
    }
    
}
