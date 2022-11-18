<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\General\ShippingUPSHelper;
use App\Models\Coupon;
use App\Models\CouponUses;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\ZipCodes;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Str;

class CartController extends Controller
{
    protected $product_cart;
    
    public function __construct()
    {
        $this->product_cart = product_cart(session()->get('rand_num'));
    }

    public function index(Request $request)
    {
        if(!@session()->get('rand_num'))
        {
            return redirect('/shop');
        }
        // session()->forget('ses_vendor_coupon');
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Shopping Cart';
        //$data['cart']           = Cart::getContent();
        //$request->session()->forget('ses_shipping_details');
        $data['cart']           = self::sort_cart_by_vendor();

        //dd($data['cart']);

        /*if($request->ajax())
        {
            return ['status' => 1, 'cart' => $data['cart'], 'sub_total' => number_format(Cart::getSubTotal(), 2), 'total_qty' => Cart::getTotalQuantity()];
        }*/

        if($request->session()->has('ses_shipping_method'))
        {
            $shipping = $request->session()->get('ses_shipping_method');
            $rate = '$'.number_format($shipping['rate'], 2);
        }
        else $rate = null;

        $data['shipping_rate'] = $rate;

        return view('frontend.cart.index', compact('data'));
    }

    public function show()
    {
        if(auth()->user()){
            $this->product_cart = product_cart(session()->get('rand_num'));
            if( isset($this->product_cart)){
            $data['cart'] = $this->product_cart->getContent();
            }
            $totals = self::get_cart_totals();
        
        return ['status' => 1, 'cart' => $data['cart'], 'sub_total' => number_format($totals['sub_total'], 2), 'total_qty' => $this->product_cart->getTotalQuantity()];
        }
        else
        {
            return redirect('/login');
        }
    }

    public function store(Request $request)
    {  
        if(!auth()->user())
        {
            return ['status' => 0, 'message' => 'Please login before continuing shopping!'];
        }
        $request->user_id =auth()->user()->id;
        $user = Customer::find($request->user_id);
        if($user->email_verified_at==null)
        {
            return ['status' => 2, 'message' => 'Please verify your email before continuing shopping!'];
        }
        $this->product_cart = product_cart(session()->get('rand_num'));
        $data = array('product_id' => $request->input('product_id'), 'qty' => $request->input('qty'));
        if($request->ajax() || $request->input('ajax')== '1')
        {
            $Product = Product::find($request->input('product_id'));

            if($user->level < $Product->level)
            {
                return ['status' => 2, 'message' => 'This product is only available for level '.$Product->level.' customers!'];
            }
            $cart_item = @$this->product_cart->get($request->input('product_id'));
            $current_quantity = @(int)$cart_item->quantity+(int)$request->input('qty');
            if($current_quantity > (int)$Product->quantity)
            {
                if($Product->quantity == 0){
                    return ['status' => 2, 'message' => 'Product is out of stock'];
                }
                else
                {
                    return ['status' => 2, 'message' => 'Quantity exceeded, Max stock available is '.(int)$Product->quantity];
                }
            }
        }
        self::addToCart($data);

        $message = 'Product successfully added to shopping cart.';
        $status = '1';

        if($request->ajax() || $request->input('ajax')== '1')
        {
            $selected_product = Product::where(['id' => $request->input('product_id'), 'status' => 'Y'])->first();
            if($selected_product->type=='simple')
            {
                $products = Product::where(['vendor_id' => $selected_product->vendor_id, 'status' => 'Y']);
            }
            else {
                $parent = Product::where(['id' => $request->input('parent_id'), 'status' => 'Y'])->first();
                $products = Product::where(['vendor_id' => $parent->vendor_id, 'status' => 'Y'])->where([
                    ['type', '!=', 'child'],
                    ['id', '!=' , $parent->id]
                ]);
            }
            $products = $products->where('id', '!=' , $request->input('product_id'))->inRandomOrder()->get()->take(6);
            
            $same_products = [];
            foreach($products as $key=> $product)
            {
                $url = $product->slug;

                if ($product->type == 'child' && $product->show_individual == 'N') {
                    $url = \App\Models\Product::getParentSlug($product->id) . '#' . $product->sku;
                } else if ($product->show_individual == 'Y' && $product->link_type == 'variation') {
                    $url = \App\Models\Product::getParentSlug($product->id) . '#' . $product->sku;
                }
                $same_products[$key]['url'] = $url;
                $img_path = 'products/images/thumbnails/' . $product->image;
                $path = $product->image != '' ? (Storage::disk('ds3')->exists($img_path) ? Storage::disk('ds3')->url($img_path) :
                    'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';
                $same_products[$key]['path'] = $path;
                $product->on_sale = false;

                $info = \App\Models\Product::getPriceText($product);
                $same_products[$key]['info'] = $info;
                $caption = '';

                if ($product->new == 'Y')
                    $caption = 'New!';
                else if ($product->hot == 'Y')
                    $caption = 'Hot!';
                else if ($product->featured == 'Y')
                    $caption = 'Featured!';
                else if ($product->deals_of_the_day == 'Y')
                    $caption = 'Deals Of The Day!';
                else if ($product->related_products == 'Y')
                    $caption = 'Deals Of The Day!';

                if ($product->on_sale)
                    $caption = 'Sale!';
                $same_products[$key]['caption'] = $caption;
                $same_products[$key]['alt'] = Str::replace('"', ' inch', $product->name);
                $same_products[$key]['name'] = $product->name;
                $same_products[$key]['vendor']['slug'] = @$product->vendor['slug'];
                $same_products[$key]['vendor']['name'] = @$product->vendor['name'];
            }
            return ['status' => $status, 'message' => $message, 'cart' => $this->product_cart->getContent(), 'sub_total' => number_format($this->product_cart->getSubTotal(), 2), 'total_qty' => $this->product_cart->getTotalQuantity(), 'same_products' => $same_products];
        }

        return redirect()->back()->with('flash_success', $message);
    }


    public function addToCart(array $data = [])
    {
        $product = Product::findOrFail($data['product_id']);
        $qty = $data['qty'];
        if(!$qty) $qty = 1;

        $price_info = Product::getPriceText($product);
        $discount = $price_info['discount'];

        $link = '/'.$product->slug;
        if($product->type == 'child')
        {
            $url = Product::getParentSlug($product->id).'?s='.$product->sku;
            $link = '/'.$url;
        }

        $path = 'products/images/thumbnails/'.$product->image;
        $image = $product->image != '' ? (Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/200x200.png?text=Image+Not+Available+In+The+Bucket') : 'up_data/na.webp';

        $attribs = [
            'type' => $product->type,
            'sku' => $product->sku,
            'slug' => $product->slug,
            'image' => $image,
            'weight' => $product->weight,
            'link' => $link,
            'discount' => $price_info['discount'],
            'price_catalog' => $product->price_catalog,
            'price_discounted' => $product->price_discounted,
            'price_discounted_start' => $product->price_discounted_start,
            'price_discounted_end' => $product->price_discounted_end,
            'vendor_id' => Product::getProductVendorId($product->id),
        ];

        $discount_condition = [];

        // $vendor_coupon = Coupon::where([
        //     ['vendor_id', $product->vendor_id],
        // ])->first();

        // if($vendor_coupon)
        // {
        //     if ($vendor_coupon['type'] == '1') {
        //         $discount_condition[] = new CartCondition(array(
        //             'name' => 'Discount',
        //             'type' => 'vendor_coupon',
        //             'value' => $vendor_coupon['discount'],
        //         ));
        //     } else {
        //         $discount_condition[] = new CartCondition(array(
        //             'name' => 'Discount',
        //             'type' => 'vendor_coupon',
        //             'value' => $vendor_coupon['discount'],
        //         ));
        //     }
        // }

        // if($discount > 0)
        // {
        //     $discount_condition[] = new CartCondition(array(
        //         'name' => 'Discount of $'.$discount,
        //         'type' => 'sale',
        //         'value' => '-'.$discount,
        //     ));
        // }

        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $price_info['sale_price'] ? $price_info['sale_price'] : $price_info['price'],
            'quantity' => $qty,
            'bogo_free' => 0,
            'bogod_count' => 0,
            'attributes' => $attribs,
            'conditions' => $discount_condition,
            'selected' => true
        ];
        session()->forget('ses_vendor_shipping_rates_'.$product->vendor_id);
        // print_r($item);
        $this->product_cart->add($item);

        Coupon::AllowCouponInExistingVendorCart($product->vendor_id);

        //self::adjust_bogo();
    }

    public function get_cart_totals()
    {
        $full_cart           = $this->product_cart->getContent();

        $sub_total = 0;
        $bogo_discount = 0;

        $total_price_discount = 0;

        foreach($full_cart as $cart)
        {
            $is_freebie = false;
            $freebie_qty = 0;
            if($cart->attributes->freebie)
            {
                $is_freebie = true;
                $freebie_qty = $cart->attributes->freebie_qty;

                $item_price = 0;
                $total_price = 0;
            }
            else
            {
                $item_price = $cart->getPriceWithConditions();
                $total_price = $cart->getPriceSumWithConditions();
            }

            if($cart->bogo_free)
            {
                $total_price_discount = $cart->bogo_free * $item_price;
                $bogo_discount += $total_price_discount;
                $talal_price_after_bogo = $total_price - $total_price_discount;
            }

            if($cart->bogod_count)
            {
                $discounted_price = ($item_price * $cart->bogod_percent) / 100;
                $total_price_discount = $cart->bogod_count * $discounted_price;
                $bogo_discount += $total_price_discount;
                $talal_price_after_bogo = $total_price - $total_price_discount;
            }

            $sub_total += $total_price;
        }

        if(request()->session()->get('ses_coupon'))
        {
            $coupon = request()->session()->get('ses_coupon');

            if($coupon['type'] == 'amount')
            {
                $discount = $coupon['value'];
            }
            else
            {
                $discount = ($sub_total * $coupon['value']) / 100;
            }

            $total_price_discount = $total_price_discount + $discount;
        }

        if(request()->session()->get('ses_shipping_rate'))
            $shipping_rate = request()->session()->get('ses_shipping_rate');
        else
            $shipping_rate = 0;

        $grand_total = ($sub_total + $shipping_rate) - $total_price_discount;

        return ['sub_total' => $sub_total, 'grand_total' => $grand_total, 'discount' => $total_price_discount, 'shipping_rate' => $shipping_rate];
    }

    public function adjust_bogo()
    {
        // Need to clear bogo conditions as it was giving extra free / 50% discounts
        $cart           = $this->product_cart->getContent();
        $cart_has_freebie = false;
        foreach($cart as $c)
        {
            $id = $c['id'];

            $this->product_cart->update($id, array(
                'bogo_free' => 0,
                'bogod_count' => 0,
                'bogod_percent' => 0
            ));

            if($c->attributes->freebie)
            {
                //$cart_has_freebie = true;
                //if($c->quantity == 1)
                    $this->product_cart->remove($id);
            }
        }
        // End need to clear bogo conditions as it was giving extra free / 50% discounts

        // SPECIAL OFFER
        $bogo = Coupon::getBogo(5);
        $give_freebie = false;

        $min_price_array = [];

        if(isset($bogo) && is_array($bogo) && count($bogo) > 0)
        {
            $cart = $this->product_cart->getContent();

            if($bogo['get_skus'] > 0)
            {
                $give_freebie = true;
            }

            foreach($cart as $prd)
            {
                $sku = strtolower($prd->attributes->sku);
                if(in_array($sku, array_map('strtolower', $bogo['skus'])))
                {
                    for($i = 0 ; $i < $prd->quantity ; $i++)
                    {
                        array_push($min_price_array, ['id' => $prd->id, 'price' => $prd->getPriceWithConditions(), 'sku' => $sku, 'discount_applied' => 0, 'count' => 0]);
                    }
                }
            }

            if($give_freebie)
            {
                if(count($min_price_array) >= $bogo['items_buy'] && !$cart_has_freebie)
                {
                    if(is_array($bogo['get_skus']) && count($bogo['get_skus']) > 0)
                    {
                        $to_get = $bogo['items_get'];//floor(count($min_price_array) / $bogo['items_buy']);

                        $free_sku = $bogo['get_skus'][0];
                        $product = Product::where('sku', $free_sku)->first();
                        if($product)
                        {



                            $price_info = Product::getPriceText($product);
                            $discount = $price_info['discount'];

                            $link = '/'.$product->slug;
                            if($product->type == 'child')
                            {
                                $url = Product::getParentSlug($product->id).'?s='.$product->sku;
                                $link = '/'.$url;
                            }

                            $attribs = [
                                'type' => $product->type,
                                'sku' => $product->sku,
                                'slug' => $product->slug,
                                'image' => $product->image,
                                'weight' => $product->weight,
                                'link' => $link,
                                'discount' => $price_info['discount'],
                                'freebie' => true,
                                'freebie_qty' => $to_get,
                                'price_catalog' => $product->price_catalog,
                                'price_discounted' => $product->price_discounted,
                                'price_discounted_start' => $product->price_discounted_start,
                                'price_discounted_end' => $product->price_discounted_end
                            ];

                            $discount_condition = [];

                            if($discount > 0)
                            {
                                $discount_condition = new CartCondition(array(
                                    'name' => 'Discount of $'.$discount,
                                    'type' => 'sale',
                                    'value' => '-'.$discount,
                                ));
                            }

                            $item = [
                                'id' => $product->id.'-free', // Adding free with it so it can be separate from regular product
                                'name' => $product->name,
                                'price' => $price_info['price'],
                                'quantity' => 1,
                                'bogo_free' => 1,
                                'bogod_count' => 1,
                                'attributes' => $attribs,
                                'conditions' => $discount_condition
                            ];

                            $this->product_cart->add($item);


                        }
                    }
                }
            }
        }

        // END SPECIAL OFFER

        // BOGO FREE
        $has_bogo_items = false;
        $bogo = Coupon::getBogo(3);

        $min_price_array = [];

        if(isset($bogo) && is_array($bogo) && count($bogo) > 0)
        {
            $cart = $this->product_cart->getContent();

            foreach($cart as $prd)
            {
                $sku = strtolower($prd->attributes->sku);
                if(in_array($sku, array_map('strtolower', $bogo['skus'])))
                {
                    for($i = 0 ; $i < $prd->quantity ; $i++)
                    {
                        array_push($min_price_array, ['id' => $prd->id, 'price' => $prd->getPriceWithConditions(), 'sku' => $sku, 'discount_applied' => 0, 'count' => 0]);
                    }
                }
            }
        }

        if(count($min_price_array) > 0)
        {
            $sortArray = array();

            foreach($min_price_array as $product){
                foreach($product as $key=>$value){
                    if(!isset($sortArray[$key])){
                        $sortArray[$key] = array();
                    }
                    $sortArray[$key][] = $value;
                }
            }

            $orderby = 'price';

            array_multisort($sortArray[$orderby],SORT_ASC, $min_price_array);

            $no_of_free_items = floor(count($min_price_array) / 2);

            $free_items = array_slice($min_price_array, 0, $no_of_free_items);

            //$a = array_count_values($free_items);

            $e = [];
            foreach($free_items as $fi)
            {
                $e[] = $fi['id'];
            }

            $bogo_ids = array_count_values($e);

            foreach($bogo_ids as $id => $bogo)
            {
                $this->product_cart->update($id, array(
                    'bogo_free' => $bogo,
                ));

                $has_bogo_items = true;
            }
        }
        // END BOGO FREE

        // BOGO 50%
        $bogo = Coupon::getBogo(4);
        if($bogo)
        {
            $bogod_percent = $bogo['items_get'];

            $min_price_array = [];

            if(isset($bogo) && is_array($bogo) && count($bogo) > 0)
            {
                $cart = $this->product_cart->getContent();

                foreach($cart as $prd)
                {
                    $sku = strtolower($prd->attributes->sku);
                    if(in_array($sku, array_map('strtolower', $bogo['skus'])))
                    {
                        for($i = 0 ; $i < $prd->quantity ; $i++)
                        {
                            array_push($min_price_array, ['id' => $prd->id, 'price' => $prd->getPriceWithConditions(), 'sku' => $sku, 'discount_applied' => 0, 'count' => 0]);
                        }
                    }
                }
            }

            if(count($min_price_array) > 0)
            {
                $sortArray = array();

                foreach($min_price_array as $product){
                    foreach($product as $key=>$value){
                        if(!isset($sortArray[$key])){
                            $sortArray[$key] = array();
                        }
                        $sortArray[$key][] = $value;
                    }
                }

                $orderby = 'price';

                array_multisort($sortArray[$orderby],SORT_ASC, $min_price_array);

                $no_of_free_items = floor(count($min_price_array) / 2);

                $free_items = array_slice($min_price_array, 0, $no_of_free_items);

                //$a = array_count_values($free_items);

                $e = [];
                foreach($free_items as $fi)
                {
                    $e[] = $fi['id'];
                }

                $bogo_ids = array_count_values($e);

                foreach($bogo_ids as $id => $bogo)
                {
                    $this->product_cart->update($id, array(
                        'bogod_count'    => $bogo,
                        'bogod_percent'  => $bogod_percent
                    ));

                    $has_bogo_items = true;
                }
            }
        }

        request()->session()->put('ses_has_bogo_items', $has_bogo_items);
        // END BOGO 50%

        /*$sub_total = $this->product_cart->getSubTotal();

        if($sub_total >= 100)
        {
            $condition = new CartCondition(array(
                'name' => 'Special Discount',
                'type' => 'discount',
                'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
                'value' => '-30',
                'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
            ));

            $this->product_cart->condition($condition);
        }*/

    }

    public function delete($id)
    {
        $ids = str_replace('-rmv', '', $id);
        $cart_item = $this->product_cart->get($ids);
        $this->product_cart->remove($ids);
        Coupon::removeCouponFromCartItem($cart_item);
        //self::adjust_bogo();
        $data['cart']           = $this->product_cart->getContent();
        $totals = self::get_cart_totals();
        $message = 'Item removed from your shopping cart.';
        if($id == $ids."-rmv"){
            return ['status' => 1, 'cart' => $data['cart'], 'sub_total' => number_format($totals['sub_total'], 2), 'total_qty' => $this->product_cart->getTotalQuantity()];
            // return ['id' => $id, 'status' => '1'];
        }else{
            return redirect()->route('frontend.cart.index')->with('flash_success', $message);
        }
    }

    public function recalculate(Request $request)
    {
        if($request->input('update_cart') == 'Update Cart')
        {
            $qtys = $request->input('qty');
            $ids = $request->input('id');

            for($i = 0 ; $i < count($qtys) ; $i++)
            {
                $qty = $qtys[$i];
                $id = $ids[$i];

                $cart_item = $this->product_cart->get($id);

                if(isset($cart_item->attributes->vendor_id))
                {
                    session()->forget('ses_vendor_shipping_rates_' . $cart_item->attributes->vendor_id);
                }

                if($qty == 0)
                {
                    $this->product_cart->remove($id);

                    Coupon::removeCouponFromCartItem($cart_item);
                }
                else
                {
                    $this->product_cart->update($id, array(
                        'quantity' => array(
                            'relative' => false,
                            'value' => $qty
                        ),
                        'bogo_free' => 0,
                        'bogod_count' => 0,
                        'bogod_percent' => 0
                    ));

                    Coupon::AllowCouponInExistingVendorCart($cart_item->attributes->vendor_id);
                }
            }

            $message = 'Shopping cart updated successfully.';
            $flash = 'flash_success';
        }
        else
        {
            $ret = self::apply_coupon($request->input('coupon_code'));
            extract($ret);
        }

        //self::adjust_bogo();

        return back()->with($flash, $message);
    }

    public function apply_coupon($coupon_code, $bypass_checks = false)
    {
        $where['coupon'] = $coupon_code;
        if(!$bypass_checks)
            $where['status'] = 'Y';

        $coupon = Coupon::where($where)->first();

        $free_shipping = false;

        if($coupon)
        {
            $error = false;
            $ts_current = strtotime(date('Y-m-d'));//date('Y-m-d');
            if($bypass_checks || ($coupon->date_from || $coupon->date_to))
            {
                //echo date('Y-m-d') . ' -- ' . $coupon->date_from;
                //die;
                if($coupon->date_from)
                {
                    $ts_from = strtotime($coupon->date_from);
                    if($ts_current < $ts_from)
                        $error = true;
                }
                if($coupon->date_to)
                {
                    $ts_to = strtotime($coupon->date_to);
                    if($ts_current > $ts_to)
                        $error = true;
                }
            }

            $customer = Customer::logged_in();

            if($coupon->group_id)
            {
                if($customer)
                {
                    if($customer->group_id != $coupon->group_id)
                        $error = true;
                }
                else
                {
                    if($coupon->group_id != 1)
                        $error = true;
                }
            }

            if($coupon->uses_per_customer)
            {
                if($customer)
                {
                    $check = CouponUses::where(['coupon_id' => $coupon->id, 'customer_id' => $customer->id])->count();
                    if($check == $coupon->uses_per_customer)
                        $error = true;
                }
            }

            if(!$error)
            {
                if($coupon->type == 1 || $coupon->type == 2)
                {
                    if($coupon->type == 1)
                    {
                        $value = '$'.$coupon->discount;
                        session()->put('ses_coupon', ['type' => 'amount', 'value' => $coupon->discount]);
                    }
                    else
                    {
                        $value = $coupon->discount.'%';
                        session()->put('ses_coupon', ['type' => 'percent', 'value' => $coupon->discount, 'code' => $coupon->coupon, 'id' => $coupon->id]);
                    }

                    $coupon_condition = new CartCondition(array(
                        'name' => 'Coupon Code',
                        'type' => 'discount',
                        'target' => 'subtotal',
                        'value' => '-'.$value,
                        'attributes' => $coupon
                    ));

                    $this->product_cart->condition($coupon_condition);
                }

                if($coupon->free_shipping == 'Y')
                {
                    session()->put('ses_free_shipping_coupon', 'Y');
                    $free_shipping = true;
                }

                session()->get('ses_free_shipping_coupon');

                $message = 'Coupon applied successfully.';
                $flash = 'flash_success';
            }
            else
            {
                $message = 'Sorry the coupon code you entered is not available at this time.';
                $flash = 'flash_danger';
            }
        }
        else
        {
            $message = 'Sorry the coupon code you entered does not exist.';
            $flash = 'flash_danger';
        }

        if($bypass_checks)
            self::adjust_bogo();

        return ['message' => $message, 'flash' => $flash, 'free_shipping' => $free_shipping];
    }

    public function vendor_coupon(Request $request)
    {
        $filter['vendor_id'] = $request->input('vendor_id');
        $filter['coupon'] = $request->input('couponCode');
        $coupon = Coupon::IsActiveCoupon($filter);
        $check = Coupon::checkToAllowCoupon($coupon, $request->input('vendor_id'));
        if($coupon && $check==true)
        {   
            $vendor_coupons = [];
            $current_vendor = session()->get('ses_vendor_coupon');
            if ($current_vendor != null) {
                $vendor_coupons = session()->get('ses_vendor_coupon');
            }

            if ($coupon['type'] == 1) {
                $vendor_coupons[$request->input('vendor_id')] = ['vendor' => $request->input('vendor_id'), 'type' => 'amount', 'value' => $coupon['discount'], 'code' => $coupon['coupon'], 'id' => $coupon['id']];
            } else {
                $vendor_coupons[$request->input('vendor_id')] = ['vendor' => $request->input('vendor_id'), 'type' => 'percent', 'value' => $coupon['discount'], 'code' => $coupon['coupon'], 'id' => $coupon['id']];
            }
            
            session()->put('ses_vendor_coupon', $vendor_coupons);

            $discount = get_vendor_discount('full',$request->input('vendor_id'));
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => $coupon['id'].'-'.$coupon['name'],
                'type' => 'coupon',
                'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
                'value' => '-' . $discount,
                'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
            ));
            $this->product_cart = product_cart(session()->get('rand_num'));
            $this->product_cart->condition($condition);

            return true;
        }elseif($filter['coupon'] == '') {
            session()->flash('flash_danger', 'Please Enter the Coupon Code!');
            return ['error' => 'Please Enter the Coupon Code!'];
        }
        else {
            session()->flash('flash_danger', 'Coupon is not valid!');
            return ['error' => 'Coupon is not valid!'];
        }
    }

    public function sort_cart_by_vendor($selected=false)
    {
        $this->product_cart = product_cart(session()->get('rand_num'));
        $cart_contents = $this->product_cart->getContent();
        $cart_contents = $cart_contents->sort();
        $user_cart = [];
        foreach($cart_contents as $cart)
        {
            if( ($selected==true && $cart->selected==true) || $selected==false )
            {
                $selected_vendor = Product::getProductVendorId($cart->id);
                // if($cart->attributes->vendor_id == 0)
                // {
                //     $product = Product::find($cart->id);
                //     $parent_product = Product::find($product->parent_id);
                //     $selected_vendor = $parent_product->vendor_id;
                // }
                // else
                // {
                //     $selected_vendor = $cart->attributes->vendor_id;
                // }
                $user_cart[$selected_vendor]['list'][] = $cart;
                $user_cart[$selected_vendor]['selected'] = false;
            }
        }
        if(session()->has('ses_shipping_details'))
        {
            $address = session()->get('ses_shipping_details');
            $total_shipping_charges = 0;
            foreach($user_cart as $vendor_id => $uc)
            {
                $weight = 0;
                $subtotal = 0;
                $selected_products_count = 0;
                foreach($uc['list'] as $item_key => $cart)
                {
                    $item_weight = $cart->attributes->weight;
                    if(!$item_weight) $item_weight = 1;
                    $weight += $item_weight * $cart->quantity;
                    $subtotal += $cart->quantity * $cart->price;

                    $user_cart[$vendor_id]['list'][$item_key]['available_for_shipping'] = check_available_shipping_for_product($cart->id);
                    if(@$cart['selected']==true)
                    {
                        // $user_cart[$vendor_id]['selected'] = true;
                        $selected_products_count++;
                    }
                    else
                    {
                        // $user_cart[$vendor_id]['selected'] = false;
                    }
                }
                if(count($user_cart[$vendor_id]['list']) == $selected_products_count)
                {
                    $user_cart[$vendor_id]['selected'] = true;
                }
                else
                {
                    $user_cart[$vendor_id]['selected'] = false;
                }

                $vendor = Vendor::find($vendor_id);
                if(!empty($vendor)){

                    $user_cart[$vendor_id]['tax'] = round((float)$subtotal * (float)$vendor->tax_percentage/100, 2);

                    $address['total_weight'] = $weight;
                    $shipping_rates_list = ShippingUPSHelper::shipping_rates($address, $vendor, true);
                   
                    if(isset($shipping_rates_list['status']) && $shipping_rates_list['status']==0)
                    {
                        redirect()->back()->with('flash_danger', $shipping_rates_list['message']);
                        session()->forget('ses_shipping_available');
                    }
                    else
                    {
                        session()->put('ses_shipping_available', 'Y');
                        $user_cart[$vendor_id]['shipping_charges'] = $shipping_rates_list['rates'][@$shipping_rates_list['lowest_or_selected_rate_index']];
                        
                        $user_cart[$vendor_id]['shipping_charges_list'] = $shipping_rates_list['rates'];

                        $total_shipping_charges += $user_cart[$vendor_id]['shipping_charges']['rate'];
                    }
                }    
            }
            AjaxController::clear_shipping_conditions();

            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'Shipping Charges',
                'type' => 'shipping',
                'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
                'value' => '+'.$total_shipping_charges,
                'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
            ));
            $this->product_cart->condition($condition);

            $data['enc'] = '';
            $data['service'] = 'Shipping Charges';
            $data['rate'] = $total_shipping_charges;
            $data['notes'] = '';

            $data['grand_total'] = '$'.number_format($this->product_cart->getTotal(), 2);
            session()->put('ses_shipping_method', $data);
            session()->put('ses_shipping_rate', $data['rate']);
        }
        return $user_cart;
    }

    public function set_shipping_location(Request $request)
    {
        if(trim($request->input('ship_zipcode')) != null)
        {
            $address['zip'] = $request->input('ship_zipcode');

            $zip_data = ZipCodes::where('zip', $address['zip'])->first();

            if(!$zip_data)
            {
                $message = 'Please enter a valid US zipcode.';
                $flash = 'flash_danger';

                return back()->with($flash, $message);
            }

            $address['state'] = $zip_data->state;
            $address['city'] = $zip_data->primary_city;
            $address['country'] = $zip_data->country;
        }
        else
        {
            $address['country'] = $request->input('ship_country');
        }
        
        $request->session()->put('ses_shipping_details', $address);

        self::sort_cart_by_vendor();

        $message = 'Shipping location changed successfully.';
        $flash = 'flash_success';

        return back()->with($flash, $message);
    }

    public function set_vendor_shipping_service(Request $request)
    {
        $vendor_id = $request->input('vendor_id');
        $enc = $request->input('shipping_enc');
        $shipping_rates_list = session()->get('ses_vendor_shipping_rates_'.$vendor_id);

        $inc = 0;
        foreach($shipping_rates_list['rates'] as $rate)
        {
            if($rate['enc'] == $enc)
            {
                $shipping_rates_list['rates'][$inc]['selected'] = true;
                $shipping_rates_list['lowest_or_selected_rate_index'] = $inc;
            }
            else
            {
                $shipping_rates_list['rates'][$inc]['selected'] = false;
            }
            $inc++;
        }

        session()->put('ses_vendor_shipping_rates_'.$vendor_id, $shipping_rates_list);
        $request->session()->put('ses_vendor_shipping_method_'.$vendor_id, $enc);
        return ['status' => 1];
    }
}