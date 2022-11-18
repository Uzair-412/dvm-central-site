<?php

namespace App\Http\Livewire\Frontend;

use App\Http\Controllers\Frontend\CartController;
use App\Models\Address;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\State;
use \Cart as CartCart;
use Config;
use Illuminate\Http\Request;
use Livewire\Component;

class Cart extends Component
{
    public $rand_num, $isCart, $cartItem, $shipping_rate, $quantity_error , $buttonCLass;
    public $subtotal, $total, $discount, $shipping_cost, $totalQty;
    public $vendor_checked = [];
    public $selectAll = false, $selectedItems = 0;
    public $checkout = false, $countries, $address1, $v_shipping_details, $addNewAddress, $processToPay = false;
    public $shipping_for_products = true;
    public $expiryYears;

    protected $listeners = ['removeCartItem' => 'removeCartItem', 'cartItemUpdateQty' => 'cartItemUpdateQty', 'loadCart' => 'loadCart'];

    public function mount(Request $request)
    {
        if ($request->session()->has('ses_shipping_method')) {
            $shipping = $request->session()->get('ses_shipping_method');
            $rate = '$' . number_format($shipping['rate'], 2);
        } else $rate = null;

        $this->shipping_rate = $rate;
        $this->loadCart();
        $this->checkoutLoad();
        $this->loadCardPage();
    }

    public function render()
    {   
        return view('livewire.frontend.cart');
    }

    public function checkoutLoad()
    {
        $this->countries = Country::orderBy('name', 'asc')->pluck('name', 'id');
        $address = Address::select('*')->where(['customer_id' => @auth()->user()->id])->get();
        if ($address) {
            foreach ($address as $addresses) {
                $this->address1[$addresses['id']] = $addresses['address1'] . ' , ' . $addresses['city'] . ' , ' . $addresses['zip'];
                if (is_numeric($addresses['state']))
                    $this->address1[$addresses['id']] .= ' , ' . State::get_state_name($addresses['state']);
                else
                    $this->address1[$addresses['id']] .= ' , ' . $addresses['state'];

                $this->address1[$addresses['id']] .= ' , ' . Country::get_country_name($addresses['country']);
            }
        }
    }

    public function loadCart()
    {
        $product_cart = product_cart($this->rand_num);
        $this->isCart = $product_cart->isEmpty();
        $cartController = new CartController();
        $this->cartItem = $cartController->sort_cart_by_vendor();
        $this->subtotal = get_selected_cart_total('subtotal');
        $this->discount = get_vendor_discount();
        $this->shipping_cost = get_shipping_rate();
        $this->total = get_selected_cart_total();
        // $this->emit('updateCartCounts', $product_cart->getTotalQuantity());
        $this->emit('updateMiniCart');

        $shipping_for_products = true;
        foreach($this->cartItem as $vendor_id => $cart)
        {
            if(@$cart['selected'])
            {
                // $vendor_checked[$vendor_id] = true;
                foreach($cart['list'] as $item_key => $item)
                {
                    if(session()->has('ses_shipping_details') && !$item->available_for_shipping['success'] && $item->selected == true)
                    {
                        $shipping_for_products = false;
                        break;
                    }
                }
            }
        }
        $this->shipping_for_products = $shipping_for_products;
        $this->selectAllFunc();
    }

    public function cartItemUpdateQty($itemId, $type = 'add')
    {
        $product_cart = product_cart($this->rand_num);
        $cart = $product_cart->get($itemId);

        $this->quantity_error = '';
        $this->buttonCLass = '';
        if ($type == 'add') {
            $product = Product::where('id', $itemId)->first();
            if ($cart->quantity+1 > $product->quantity) {
                $this->quantity_error = 'Quantity is exceeded, Max stock available quantity is ' . $product->quantity;
                $this->buttonCLass = 'disabled';
            }
            else
            {
                $product_cart->update($itemId, array(
                    'quantity' => 1,
                ));
            }
        } elseif ($type == 'sub') {

            if ($cart->quantity == 1) {
                $product_cart->remove($itemId);
            } else {
                $product_cart->update($itemId, array(
                    'quantity' => -1,
                ));
            }
        }
        $this->loadCart();
    }

    public function removeCartItem($itemId)
    {
        $product_cart = product_cart($this->rand_num);
        $product_cart->remove($itemId);
        $this->loadCart();
    }

    public function clearCart()
    {
        $product_cart = product_cart($this->rand_num);
        $product_cart->clear();
        $this->loadCart();
    }

    public function selectVendor($vendor_id, $selected)
    {
        $product_cart = product_cart($this->rand_num);
        $cart = $product_cart->getContent();
        $select = !(bool)$selected;
        foreach ($cart as $key => $item) {
            if ($item->attributes->vendor_id == $vendor_id || ($item->attributes->vendor_id == 0 && $item->attributes->parent_vendor_id == $vendor_id)) {
                $product_cart->update($key, array(
                    'selected' => $select
                ));
            }
        }
        $this->loadCart();
    }

    public function selectAllFunc()
    {
        $product_cart = product_cart($this->rand_num);
        $cart = $product_cart->getContent();
        $this->selectAll = true;
        $this->selectedItems = 0;
        foreach ($cart as $item) {
            if ($item->selected == false) {
                $this->selectAll = false;
            } else {
                $this->selectedItems++;
            }
        }
    }

    public function selectItem($itemId, $selected)
    {
        $product_cart = product_cart($this->rand_num);
        $select = !(bool)$selected;
        $product_cart->update($itemId, array(
            'selected' => $select
        ));
        $this->loadCart();
    }

    public function selectAllItems($selected)
    {
        $product_cart = product_cart($this->rand_num);
        $select = !(bool)$selected;
        $cart = $product_cart->getContent();
        foreach ($cart as $key => $item) {
            $product_cart->update($key, array(
                'selected' => $select
            ));
        }
        $this->loadCart();
    }

    public function activeProcessToPay()
    {
        $this->checkout = false;
        $this->processToPay = true;
        $this->loadCart();
    }

    // public function apply_coupon ($vendor_id, $couponCode) {

    //     $filter['vendor_id'] = $vendor_id;
    //     $filter['coupon'] = $couponCode;
    //     $coupon = Coupon::IsActiveCoupon($filter);
    //     $check = Coupon::checkToAllowCoupon($coupon, $vendor_id);
    //     if($coupon && $check==true)
    //     {
    //         $vendor_coupons = [];
    //         $current_vendor = session()->get('ses_vendor_coupon');
    //         if ($current_vendor != null) {
    //             $vendor_coupons = session()->get('ses_vendor_coupon');
    //         }

    //         if ($coupon['type'] == 1) {
    //             $vendor_coupons[$vendor_id] = ['vendor' => $vendor_id, 'type' => 'amount', 'value' => $coupon['discount'], 'code' => $coupon['coupon'], 'id' => $coupon['id']];
    //         } else {
    //             $vendor_coupons[$vendor_id] = ['vendor' => $vendor_id, 'type' => 'percent', 'value' => $coupon['discount'], 'code' => $coupon['coupon'], 'id' => $coupon['id']];
    //         }

    //         session()->put('ses_vendor_coupon', $vendor_coupons);

    //         $discount = get_vendor_discount('full',$vendor_id);
    //         $condition = new \Darryldecode\Cart\CartCondition(array(
    //             'name' => $coupon['id'].'-'.$coupon['name'],
    //             'type' => 'coupon',
    //             'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
    //             'value' => '-' . $discount,
    //             'order' => 1 // the order of calculation of cart base conditions. The bigger the later to be applied.
    //         ));
    //         Cart::condition($condition);

    //         return true;
    //     }
    //     else {
    //         session()->flash('flash_danger', 'Coupon is not valid!');
    //         return ['error' => 'Coupon is not valid!'];
    //     }
    // }

    public function addToWishList($product_id)
    {
    }

    public function loadCardPage(){
        if(\Request::getRequestUri() == '/order/payment-details?payment-details'){
            $this->processToPay = true;
        }else{
            $this->processToPay = false;
        }
    }
}
