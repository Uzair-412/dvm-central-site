<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\General\FirstDataHelper;
use App\Helpers\General\ShippingUPSHelper;
use App\Http\Requests\Frontend\Checkout\ProcessPaymentRequest;
use App\Mail\Frontend\Order\SendOrder;
use App\Models\Country;
use App\Models\CouponUses;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payment;
use App\Models\Product;
use App\Models\State;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    protected $product_cart;

    public function __construct()
    {
        $this->product_cart = product_cart(session()->get('rand_num'));
    }

    public function index(Request $request)
    {   
        $this->product_cart = product_cart(session()->get('rand_num'));
        if(!$this->product_cart || ($this->product_cart && $this->product_cart->isEmpty()))
        {
            return redirect()->route('frontend.cart.index');
        }

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Checkout';
        $data['cart']           = $this->product_cart->getContent();
        $data['countries']      = Country::pluck('name', 'id');
        $data['customer']       = Customer::logged_in();

        $shipping_address_id = null;

        $address_option = 'new';

        if(isset($data['customer']->addresses) && count($data['customer']->addresses) > 0)
        {
            $default_shipping = $data['customer']->addresses()->select('id')->where('default_shipping', 'Y')->first();
            if($default_shipping)
                $shipping_address_id = $default_shipping->id;

            $address_option = 'existing';
        }

        //dd($data['customer']->addresses()->select('id')->where('default_shipping', 'Y')->first());

        $data['shipping_details'] = $data['v_shipping_details'] = ['email' => '', 'first_name' => '', 'last_name' => '', 'company' => '', 'address1' => '', 'address2' => '',
                'country' => '', 'state' => '', 'city' => '', 'zip' => '', 'phone' => '', 'notes' => ''];

        //$request->session()->forget('ses_shipping_details');

        if($request->session()->has('ses_order_id'))
        {
            $order = Order::find($request->session()->get('ses_order_id'));

            $data['shipping_details'] = ['email' => $order->email, 'first_name' => $order->first_name, 'last_name' => $order->last_name,
                'company' => $order->company, 'address1' => $order->address1, 'address2' => $order->address2,
                'country' => $order->country, 'state' => $order->state, 'city' => $order->city, 'zip' => $order->zip_code, 'phone' => $order->phone, 'notes' => $order->notes];

            // $data['rates'] = $this::get_shipping_rates($data);

            // Hard Coded Data Started Here
            /*$data['rates'] = [
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

            $shipping_address_id = isset($data['shipping_details']['id']) ? $data['shipping_details']['id'] : null;

            if(!$shipping_address_id)
            {
                $data['v_shipping_details'] = $data['shipping_details'];
                $address_option = 'new';
            }

            $shipping = $order->shipping_service;
            $rate = '$'.number_format($order->shipping_fee, 2);

            $data['shipping_details']['notes'] = $order->notes;
        }
        else $rate = null;

        /*if($request->session()->has('ses_shipping_method'))
        {
            $shipping = $request->session()->get('ses_shipping_method');
            $rate = '$'.number_format($shipping['rate'], 2);

            $data['shipping_details']['notes'] = $shipping['notes'];
        }
        else $rate = null;*/

        $data['shipping_rate'] = $rate;
        $data['shipping_address_id'] = $shipping_address_id;

        $step = 1;

        if($request->session()->get('ses_shipping_details'))
            $step = 2;

        if($request->session()->get('ses_shipping_method'))
            $step = 3;

        $data['checkout_step'] = $step;

        $data['address_option'] = $address_option;

        /*echo '<pre>';
        print_r($request->session()->all());
        die;*/
        if($request->session()->has('ses_shipping_method'))
        {
            $shipping = $request->session()->get('ses_shipping_method');
            $rate = '$'.number_format($shipping['rate'], 2);
            $data['v_shipping_details'] = $request->session()->get('ses_shipping_details');
            if(
                isset($data['v_shipping_details']['email']) &&
                trim($data['v_shipping_details']['email']) != null &&
                $request->input('change-shipping') != 1
            )
            {
                return redirect()->route('frontend.payment-details');
            }
            if($data['v_shipping_details'] != null && !is_numeric($data['v_shipping_details']['country']))
            {
                $country = Country::select('id')->where('iso2', $data['v_shipping_details']['country'])->first();
                $data['v_shipping_details']['country'] = $country->id;
            }
            if($data['v_shipping_details']!=null && count($data['v_shipping_details']) > 1)
            {
                $state = State::where(['country_id' => $data['v_shipping_details']['country'], 'iso2' => $data['v_shipping_details']['state']])->first();
                if($state)
                {
                    $data['v_shipping_details']['state'] = $state->id;
                }
            }
        }
        else $rate = null;
        
        $data['shipping_rate'] = $rate;

        if(!auth()->check()){
            session()->put('redirect_to', 'checkout');
            return redirect('login');
        }
        else
        {
            return redirect()->route('frontend.payment-details');
        }
        return view('frontend.checkout.index', compact('data'));
   
    }

    public function save_shipping(Request $request)
    {
        $request->session()->forget('ses_shipping_details');
        $request->session()->put('ses_shipping_details', $request->except('_token'));

        $cart = $this->product_cart->getContent();
        foreach($cart as $c)
        {
            if($c->attributes->vendor_id)
            {
                session()->forget('ses_vendor_shipping_rates_' . $c->attributes->vendor_id);
            }
        }

        return redirect()->route('frontend.payment-details');
    }

    public function save_order(Request $request)
    {
        $amount = $request->session()->get('ses_grand_total');

        /*$charge = Stripe::charges()->create([
            'source' => $request->input('stripeToken'),
            'currency' => 'USD',
            'amount' => round($amount, 2)
        ]);*/

        $amount = round($amount, 2);

        $sd = $request->session()->get('ses_shipping_details');
        $sm = $request->session()->get('ses_shipping_method');

        $customer                   = Customer::logged_in();

        if($customer)
        {
            $customer_id = $customer->id;
            $email = $customer->email;
        }
        else
        {
            $customer_id = 0;
            $email = $sd['email'];
        }


        $data['customer_id']        = $customer_id;

        if(!is_null($sd['first_name']))
        {
            $data['email']              = $email;
            $data['first_name']         = $sd['first_name'];
            $data['last_name']          = $sd['last_name'];
            $data['company']            = $sd['company'];
            $data['address1']           = $sd['address1'];
            $data['address2']           = $sd['address2'];
            $data['country']            = $sd['country'];
            $data['state']              = $sd['state'];
            $data['city']               = $sd['city'];
            $data['zip_code']           = $sd['zip'];
            $data['phone']              = $sd['phone'];
        }

        $data['sub_total']          = $this->product_cart->getSubTotal();
        $data['shipping_fee']       = $sm['rate'];
        $data['discount']           = 0;
        $data['tax']                = 0;
        $data['grand_total']        = $amount;
        $data['shipping_service']   = $sm['service'];
        $data['discount_coupon']    = '';
        $data['notes']              = $sm['notes'];

        $data['order_status']       = '3';

        $data['card_number']        = '';
        $data['card_type']          = '';
        $data['transaction_id']     = ''; // First Data's Transaction Tag
        $data['balance_transaction'] = ''; // First Data's Authorization Number
        $data['payment_method']     = ''; // Our own generated number for cross reference at First Data
        $data['receipt_url']        = ''; // First Data Returns CTR - Response so saving that
        $data['utm_code']           = request()->session()->get('ses_utm'); // Tracking


        if($request->session()->has('ses_order_id'))
        {
            $order_id = $request->session()->get('ses_order_id');
            $order = Order::find($order_id);
            $order->update($data);
            OrderItems::where('order_id', $order_id)->delete();
        }
        else
        {
            $order                      = Order::create($data);
        }

        $items = $this->product_cart->getContent();

        $sub_total = 0;
        $bogo_discount = 0;

        foreach($items as $row)
        {
            $bogo = '';

            $is_freebie = false;
            $freebie_qty = 0;
            if($row->attributes->freebie)
            {
                $is_freebie = true;
                $freebie_qty = $row->attributes->freebie_qty;

                $item_price = 0;
                $total_price = 0;

                $bogo = json_encode( ['is_free' => 'yes', 'free_qty' => $freebie_qty] );

                $product_id = Str::replace('-free', '', $row->id);
            }
            else
            {
                $item_price = $row->getPriceWithConditions();
                $total_price = $row->getPriceSumWithConditions();

                $product_id = $row->id;
            }

            if($row->bogo_free)
            {
                $total_price_discount = $row->bogo_free * $item_price;
                $bogo_discount += $total_price_discount;

                $bogo = json_encode( ['bogo_free' => $row->bogo_free, 'discount_amount' => $total_price_discount] );
            }

            if($row->bogod_count)
            {
                $discounted_price = ($item_price * $row->bogod_percent) / 100;
                $total_price_discount = $row->bogod_count * $discounted_price;
                $bogo_discount += $total_price_discount;

                $bogo = json_encode( ['bogod_count' => $row->bogod_count, 'bogod_percent' => $row->bogod_percent, 'discount_amount' => $total_price_discount] );
            }

            $order_item['order_id'] = $order->id;
            $order_item['customer_id'] = $customer_id;
            $order_item['product_id'] = $product_id;
            $order_item['name'] = $row->name;
            $order_item['sku'] = $row->attributes->sku;
            $order_item['slug'] = $row->attributes->slug;
            $order_item['price'] = $item_price;
            $order_item['price_original'] = $row->price;
            $order_item['quantity'] = $row->quantity;
            $order_item['image'] = $row->attributes->image;
            $order_item['bogo'] = $bogo;

            $sub_total += $total_price;

            $oi = OrderItems::create($order_item);
        }

        $discount = 0;
        $discount_coupon = '';

        if($request->session()->get('ses_coupon'))
        {
            $coupon = request()->session()->get('ses_coupon');

            $discount_coupon = $coupon['code'];

            if($coupon['type'] == 'amount')
            {
                $discount = $coupon['value'];
            }
            else
            {
                $discount = ($sub_total * $coupon['value']) / 100;
            }

            if($customer_id)
            {
                $cu = ['coupon_id' => $coupon['id'], 'coupon' => $coupon['code'], 'customer_id' => $customer_id];
                CouponUses::create($cu);
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

        $order->discount = $discount;
        $order->discount_coupon = $discount_coupon;
        $order->sub_total = $sub_total;

        $order->save();

        $request->session()->put('ses_order_id', $order->id);

        return redirect()->route('frontend.payment-details', [$order]);

    }

    //public function payment_details(Order $order)
    public function payment_details()
    {
        if(!@session()->get('rand_num'))
        {
            return redirect('/shop');
        }
        $this->product_cart = product_cart(session()->get('rand_num'));
        $data['check_shipping_country'] = check_available_shipping_country();
        if ($this->product_cart->isEmpty()) {
            return redirect()->route('frontend.cart.index');
        }
        $data = [];

        if(!auth()->check()) return redirect('login');
        
        $addresses = Address::where(['customer_id' => auth()->user()->id , 'default_shipping' => 'Y'])->limit(1)->first();
        if($addresses){
            $data['v_shipping_details'] = ['id' => $addresses->id,'email' => auth()->user()->email, 'first_name' => $addresses->first_name, 'last_name' => $addresses->last_name, 'company' => $addresses->company, 'address1' => $addresses->address1, 'address2' => $addresses->address2,
            'country' => $addresses->country, 'state' => $addresses->state, 'city' => $addresses->city, 'zip' => $addresses->zip, 'phone' => $addresses->phone, 'same_billing_info' => false, 'terms' => false];
            session()->put('ses_shipping_details', $data['v_shipping_details']);
        }
        // $address = Address::select('*')->where(['customer_id' => auth()->user()->id])->get();
        // if($address){
        //     foreach($address as $addresses){
        //         $data['address1'][$addresses->id] = $addresses->address1.' , '.$addresses->city.' , '.$addresses->zip;
        //         if(is_numeric($addresses->state))
        //             $data['address1'][$addresses->id] .= ' , '.State::get_state_name($addresses->state);
        //         else
        //             $data['address1'][$addresses->id] .= ' , '.$addresses->state;
        //         $data['address1'][$addresses->id] .= ' , '.Country::get_country_name($addresses->country);
        //     }
        // }

        // $data['cart'] = CartController::sort_cart_by_vendor();

        // $data['breadcrumb'] = true;
        // $data['breadcrumbs'][] = 'Checkout';
        // $data['breadcrumbs'][] = 'Payment Details';

        // $data['months'] = [
        //     '01' => '01',
        //     '02' => '02',
        //     '03' => '03',
        //     '04' => '04',
        //     '05' => '05',
        //     '06' => '06',
        //     '07' => '07',
        //     '08' => '08',
        //     '09' => '09',
        //     '10' => '10',
        //     '11' => '11',
        //     '12' => '12'
        // ];

        // $s = date('Y');
        // $e = $s + 10;
        // $years = [];
        // for($i = $s ; $i <= $e ; $i++)
        // {
        //     $end = substr($i, 2);
        //     $years[$end] = $i;
        // }

        // $data['years'] = $years;

        // $data['countries']      = Country::pluck('name', 'id');

        // $data['v_billing_details'] = ['email' => '', 'first_name' => '', 'last_name' => '', 'company' => '', 'address1' => '', 'address2' => '', 'country' => '', 'state' => '', 'city' => '', 'zip' => '', 'phone' => '', 'same_billing_info' => false, 'terms' => false];

        // if(session()->has('ses_billing_details'))
        // {
        //     $data['v_billing_details'] = session()->get('ses_billing_details');
        //     if(!isset($data['v_billing_details']['same_billing_info']))
        //         $data['v_billing_details']['same_billing_info'] = false;
        // }

        // if (session()->has('ses_card_error'))
        // {
        //     $data['card_error'] = session()->get('ses_card_error');
        //     session()->forget('ses_card_error');
        // }

        return view('frontend.checkout.payment-details', compact('data'));
    }

    /*public function process_payment(Order $order, ProcessPaymentRequest $request)
    {
        dd($request);
        $validated = $request->validated();
        $request->session()->put('ses_billing_details', $request->except(['_token', 'cc_number', 'cc_type', 'cc_month', 'cc_year', 'cc_cvv']));
        if(!$validated)
        {
            return back();
        }

        $amount = $order->grand_total;

        try
        {

            $amount = round($amount, 2);

            $ref_number = 'GV-'.time();

            $cc_number = Str::replace('-','', $request->input('cc_number'));
            
            // $cc_expiry = $request->input('cc_month').$request->input('cc_year');

            // $cc_type = strtoupper($request->input('cc_type'));

            // $first_data = ['cc_type' => $cc_type, 'cc_number' => $cc_number, 'cc_expiry' => $cc_expiry, 'cc_cvv' => $request->input('cc_cvv'),
            //     'cc_name' => $request->input('cc_name'), 'amount' => $amount, 'ref_number' => $ref_number];

            $sp_address = session()->get('ses_shipping_details');

            $sp_state_name = State::get_state_name($sp_address['state']);
            $sp_country_name = Country::get_country_name($sp_address['country']);

            $bl_state_name = State::get_state_name($request->input('state'));
            $bl_country_name = Country::get_country_name($request->input('country'));

            $anet = new AnetHelper();
            $data = [
                'cc_number' => $cc_number,
                'amount' => $amount,
                'cc_expiry_month' => $request->input('cc_month'),
                'cc_expiry_year' => $request->input('cc_year'),
                'cc_ccv' => $request->input('cc_cvv'),
                'ref_number' => $ref_number,

                'bl_first_name' => $request->input('first_name'),
                'bl_last_name' => $request->input('last_name'),
                'bl_zip' => $request->input('zip'),
                'bl_address1' => $request->input('address1'),
                'bl_address2' => $request->input('address2'),
                'bl_company' => $request->input('company'),
                'bl_city' => $request->input('city'),
                'bl_state' => $bl_state_name,
                'bl_country' => $bl_country_name,
                'bl_phone' => $request->input('phone'),

                'sp_first_name' => $sp_address['first_name'],
                'sp_last_name' => $sp_address['last_name'],
                'sp_zip' => $sp_address['state'],
                'sp_address1' => $sp_address['address1'],
                'sp_address2' => $sp_address['address2'],
                'sp_company' => $sp_address['company'],
                'sp_city' => $sp_address['city'],
                'sp_state' => $sp_state_name,
                'sp_country' => $sp_country_name,
                'sp_phone' => $sp_address['phone'],

                'email' => $request->input('email'),
            ];

            $charge = FirstDataHelper::charge($first_data);
            $card_number = Str::replace('#', '', $charge['cc_number']);

            //echo '<pre>';
            $customer                   = Customer::logged_in();

            if($customer)
            {
                $customer_id = $customer->id;
                $email = $customer->email;
            }
            else
            {
                $customer_id = 0;
                $email = $order->email;
            }

            $order->order_status        = '1';
            $order->card_number         = $card_number;
            $order->card_type           = $charge['credit_card_type'];
            $order->transaction_id      = $charge['transaction_tag']; // First Data's Transaction Tag
            $order->balance_transaction = $charge['authorization_num']; // First Data's Authorization Number
            $order->payment_method      = $charge['reference_no']; // Our own generated number for cross reference at First Data
            $order->receipt_url         = $charge['ctr']; // First Data Returns CTR - Response so saving that

            $order->bl_first_name       = $request->input('first_name');
            $order->bl_last_name        = $request->input('last_name');
            $order->bl_company          = $request->input('company');
            $order->bl_address1         = $request->input('address1');
            $order->bl_address2         = $request->input('address2');
            $order->bl_country          = $request->input('country');
            $order->bl_state            = $bl_state_name;
            $order->bl_city             = $request->input('city');
            $order->bl_zip_code         = $request->input('zip');
            $order->bl_phone            = $request->input('phone');
            $order->bl_email            = $request->input('email');

            $order->save();

            $notification = [
                'type' => 'order',
                'customer_id' => $customer_id,
                'order_id' => $order->id,
                'order_status' => '1',
                'subject' => 'Thank you for your purchase.',
                'message' => 'Thank you for your purchase, we will process your order once we receive confirmation from payment processor.',
                'email_sent' => 'Y'
            ];

            Notification::create($notification);

            unset($data);

            $data['ref_type']           = 'order';
            $data['ref_id']             = $order->id;
            $data['customer_id']        = $customer_id;
            $data['title']              = 'Paid $'.number_format($order->grand_total, 2).' for the purchase of instruments.';
            $data['amount']             = $order->grand_total;
            $data['card_number']        = $card_number;
            $data['card_type']          = $charge['credit_card_type'];
            $data['transaction_id']     = $charge['transaction_tag']; // First Data's Transaction Tag
            $data['balance_transaction'] = $charge['authorization_num']; // First Data's Authorization Number
            $data['payment_method']     = $charge['reference_no']; // Our own generated number for cross reference at First Data
            $data['receipt_url']        = $charge['ctr']; // First Data Returns CTR - Response so saving that

            Payment::create($data);

            $country                = Country::find($order->country);
            $order->country_name    = $country->name;
            if(is_numeric($order->state))
            {
                $state              = State::find($order->state);
                $order->state_name  = $state->name;
            }
            else $order->state_name = $order->state;

            Mail::send(new SendOrder($order));

            $request->session()->forget('ses_order_id');

            Cart::clear();

            $request->session()->forget('ses_shipping_method');
            $request->session()->forget('ses_shipping_details');
            $request->session()->forget('ses_coupon');
            $request->session()->forget('ses_free_shipping_coupon');
            $request->session()->forget('ses_grand_total');
            $request->session()->forget('ses_shipping_rate');
            $request->session()->forget('ses_total_engraving_charges');
            $request->session()->forget('ses_billing_details');

            return redirect()->route('frontend.order-placed', ['order' => base64_encode($order->id)]);
        }
        catch(\Exception $e)
        {
            return back()->with(['flash_danger' => $e->getMessage()]);
        }
    }*/

    public function process_payment(Request $request)
    {
        $this->product_cart = product_cart(session()->get('rand_num'));
        $amount = get_selected_cart_total();
        $cartController = new CartController();
        $vendors_cart = $cartController->sort_cart_by_vendor(true);
        $total_tax = 0;
        foreach($vendors_cart as $vendor_cart)
        {
            if($vendor_cart['selected'])
            {
                $total_tax += (float)$vendor_cart['tax'];
            }
        }
        $amount = round($amount+$total_tax, 2);
        $error_message = '';
        try
        {
            Stripe::setApiKey(config('app.STRIPE_SECRET'));
            $token = Stripe::tokens()->create([
                'card' => [
                    'number'    => $request->input('cardnumber'),
                    'exp_month' => $request->input('month'),
                    'cvc'       => $request->input('cvc'),
                    'exp_year'  => $request->input('year'),
                ],
            ]);
            $charge = Stripe::charges()->create([
                'source' => $token['id'],
                'currency' => 'USD',
                'amount' => round($amount, 2),
                'metadata' => [
                    'name' => $request->input('bl_name'),
                    'email' => $request->input('bl_email'),
                    'phone' => $request->input('bl_phone')
                ]
            ]);

            if($charge['status'] == 'succeeded')
            {
                $sd = $request->session()->get('ses_shipping_details');
                $sm = $request->session()->get('ses_shipping_method');
                $customer                   = Customer::logged_in();
                if($customer)
                {
                    $customer_id = $customer->id;
                    $email = $customer->email;
                }
                else
                {
                    $customer_id = 0;
                    $email = $sd['email'];
                }
                $data['customer_id']        = $customer_id;
                $shipping_fee = get_shipping_rate();
                $data['email']              = $email;
                $data['first_name']         = $sd['first_name'];
                $data['last_name']          = $sd['last_name'];
                $data['company']            = $sd['company'];
                $data['address1']           = $sd['address1'];
                $data['address2']           = $sd['address2'];
                $data['country']            = $sd['country'];
                $data['state']              = $sd['state'];
                $data['city']               = $sd['city'];
                $data['zip_code']           = $sd['zip'];
                $data['phone']              = $sd['phone'];
    
                $data['sub_total']          = get_selected_cart_total('subtotal');
                $data['shipping_fee']       = $shipping_fee;
                $data['discount']           = 0;
                $data['tax']                = $total_tax;
                $data['grand_total']        = $amount;
                $data['shipping_service']   = $sm['service'];
                $data['discount_coupon']    = '';
                $data['notes']              = $sm['notes'];
    
                $data['order_status']       = '1';
    
                $data['card_number']        = $charge['source']['last4'];
                $data['card_type']          = $charge['source']['brand'];
                $data['transaction_id']     = $charge['id']; // First Data's Transaction Tag
                $data['balance_transaction'] = $charge['balance_transaction']; // First Data's Authorization Number
                $data['payment_method']     = $charge['payment_method']; // Our own generated number for cross reference at First Data
                $data['receipt_url']        = $charge['receipt_url']; // First Data Returns CTR - Response so saving that

                // Mail::send(new SendOrder($order));

                // Send Customer's Order Mail to Vendors
                if(is_array($vendors_cart) && count($vendors_cart) > 0)
                {
                    foreach ($vendors_cart as $vendor_id => $vendor_cart) {
                        // foreach ($vendor_cart['list'] as $item_id => $item) {
                        //     if ($item->attributes->vendor_id == $vendor_id) {
                        //         $product = Product::find($item_id);
                        //         dd($product);
                        //         $vendor_items[$item_id] = $item;
                        //         $vendor_items[$item_id]['sku'] = @$product['sku'];
                        //         $vendor_items[$item_id]['price_org'] = @$product['price_org'];
                        //     }
                        // }

                        $vendor = Vendor::find($vendor_id);
                        $vendor_user = User::find($vendor->user);

                        $customer = $request->session()->get('ses_shipping_details');
                        $customer += $request->session()->get('ses_shipping_method');
                        $subject = '';
                        if (count($vendor_cart['list']) == 1) {
                            $subject = 'Your Item Ordered at ' . appName();
                        } else if (count($vendor_cart['list']) > 1) {
                            $subject = 'Your ' . count($vendor_cart['list']) . ' Items Ordered at ' . appName();
                        }
                        $to_name = $vendor_user->first_name . ' ' . $vendor_user->last_name;
                        Mail::send('frontend.mail.vendor_order', ['vendor_user' => $vendor_user, 'vendor_items' => $vendor_cart['list'], 'customer' => $customer], function ($message) use ($vendor_user, $subject, $to_name) {
                            $message->to($vendor_user->email, $to_name)
                                ->cc('orders@dvmcentral.com')
                                ->subject($subject)
                                ->from(config('mail.from.address'), appName())
                                ->replyTo('no-reply@dvmcentral.com', 'No-Reply');
                        });

                        // // Store vendors order here
                        // unset($data['card_number'], $data['card_type'], $data['transaction_id'], $data['balance_transaction'], $data['payment_method'], $data['receipt_url']);
                        $data['shipping_fee'] = $vendor_cart['shipping_charges']['rate'];
                        $data['shipping_service'] = $vendor_cart['shipping_charges']['service'];
                        // $data['parent_id'] = $order->id;
                        $data['vendor_id'] = $vendor_id;
                        $data['discount'] = get_vendor_discount('full',$vendor_id);
                        $data['discount_coupon']    = isset(session()->get('ses_vendor_coupon')[$vendor_id]) ? session()->get('ses_vendor_coupon')[$vendor_id]['code'] : '';
                        $data['tax'] = (float)$vendor_cart['tax'];
                        $order = Order::create($data);
                        $order->parent_id = $order->id;
                        $items = get_selected_cart_items();
                            // Send Order Mail to Customer
                            Mail::send('frontend.mail.new_order', ['order' => $order, 'customer' => $customer, 'items'=> $items, 'amount' => $amount], function ($message) use ($order, $customer, $request) {
                                $message->to($request->bl_email, $order->first_name.' '. $order->last_name)
                            ->cc('orders@dvmcentral.com')
                                ->subject('You Ordered items at ' . appName())
                                ->from(config('mail.from.address'), appName())
                                ->replyTo('no-reply@dvmcentral.com',
                                    'No-Reply'
                            );
                        });
                        $bogo_discount = 0;
                        foreach($vendor_cart['list'] as $row)
                        {
                            if($row->attributes->discount == 0)
                            {
                                $item_price = $row->attributes->price_catalog;
                            }
                            else
                            {
                                $item_price = $row->attributes->price_discounted;
                            }

                            $bogo = '';
                            if($row->bogo_free)
                            {
                                $total_price_discount = $row->bogo_free * $item_price;
                                $bogo_discount += $total_price_discount;

                                $bogo = json_encode( ['bogo_free' => $row->bogo_free, 'discount_amount' => $total_price_discount] );
                            }

                            if($row->bogod_count)
                            {
                                $discounted_price = ($item_price * $row->bogod_percent) / 100;
                                $total_price_discount = $row->bogod_count * $discounted_price;
                                $bogo_discount += $total_price_discount;

                                $bogo = json_encode( ['bogod_count' => $row->bogod_count, 'bogod_percent' => $row->bogod_percent, 'discount_amount' => $total_price_discount] );
                            }

                            $order_item['order_id'] = $order->id;
                            $order_item['vendor_order_id'] = $order->id;
                            $order_item['vendor_id'] = $vendor_id;
                            $order_item['customer_id'] = $customer_id;
                            $order_item['product_id'] = $row->id;
                            $order_item['name'] = $row->name;
                            $order_item['sku'] = $row->attributes->sku;
                            $order_item['slug'] = $row->attributes->slug;
                            $order_item['price'] = $item_price;
                            $order_item['price_original'] = $row->price;
                            $order_item['quantity'] = $row->quantity;
                            $order_item['image'] = $row->attributes->image;
                            $order_item['bogo'] = $bogo;

                            $productUpdate = Product::find($row->id);
                            $productUpdate->quantity = (int)$productUpdate->quantity - (int)$row->quantity;
                            $productUpdate->save();

                            $oi = OrderItems::create($order_item);

                        }

                        $order->sub_total = get_selected_cart_total('subtotal', $vendor_id);
                        $order->grand_total = get_selected_cart_total('total', $vendor_id) + $data['tax'];

                        $order->save();

                        $request->session()->forget('ses_vendor_shipping_rates_'.$vendor_id);
                        $request->session()->forget('ses_vendor_shipping_method_'.$vendor_id);

                    }

                    $discount = get_vendor_discount();
                    $discount_coupon = '';
        
                    // if($request->session()->get('ses_coupon'))
                    // {
                    //     $coupon = request()->session()->get('ses_coupon');
        
                    //     $discount_coupon = $coupon['code'];
        
                    //     if($coupon['type'] == 'amount')
                    //     {
                    //         $discount = $coupon['value'];
                    //     }
                    //     else
                    //     {
                    //         $discount = ($sub_total * $coupon['value']) / 100;
                    //     }
        
                    //     if($customer_id)
                    //     {
                    //         $cu = ['coupon_id' => $coupon['id'], 'coupon' => $coupon['code'], 'customer_id' => $customer_id];
                    //         CouponUses::create($cu);
                    //     }
                    // }
        
                    if(isset($bogo_discount))
                    {
                        $discount += (float)$bogo_discount;
                    }
        
                    $order->discount = $discount;
                    $order->discount_coupon = $discount_coupon;
                    //$order->sub_total = $sub_total;
        
                    $order->save();
        
                    $notification = [
                        'type' => 'order',
                        'customer_id' => $customer_id,
                        'order_id' => $order->id,
                        'order_status' => '1',
                        'subject' => 'Thank you for your purchase.',
                        'message' => 'Thank you for your purchase, we will process your order once we receive confirmation from payment processor.',
                        'email_sent' => 'Y'
                    ];
        
                    Notification::create($notification);
                    
                    // Clear selected cart items
                    clear_selected_cart_items();
                    $this->product_cart->clearCartConditions();
                    unset($data);
        
                    $data['ref_type']           = 'order';
                    $data['ref_id']             = $order->id;
                    $data['customer_id']        = $customer_id;
                    $data['title']              = 'Paid $'.number_format($order->grand_total, 2).' for the purchase of instruments.';
                    $data['amount']             = $order->grand_total;
                    $data['card_number']        = $charge['source']['last4'];
                    $data['card_type']          = $charge['source']['brand'];
                    $data['transaction_id']     = $charge['id']; // First Data's Transaction Tag
                    $data['balance_transaction'] = $charge['balance_transaction']; // First Data's Authorization Number
                    $data['payment_method']     = $charge['payment_method']; // Our own generated number for cross reference at First Data
                    $data['receipt_url']        = $charge['receipt_url']; // First Data Returns CTR - Response so saving that
                    Payment::create($data);
        
        
                    $country                = Country::find($order->country);
                    $order->country_name    = $country->name;
                    if(is_numeric($order->state))
                    {
                        $state              = State::find($order->state);
                        $order->state_name  = $state->name;
                    }
                    else $order->state_name = $order->state;
        
                    //Mail::send(new SendOrder($order));
                    $request->session()->forget('ses_shipping_method');
                    $request->session()->forget('ses_shipping_details');
                    $request->session()->forget('ses_vendor_coupon');
                    $request->session()->forget('ses_coupon');
                    $request->session()->forget('ses_free_shipping_coupon');
                    $request->session()->forget('ses_grand_total');
                    $request->session()->forget('ses_shipping_rate');
                    $request->session()->forget('ses_vendor_shipping_rates_90');
                    return redirect()->route('frontend.order-placed', ['order' => base64_encode($order->id)]);
                }
                else
                {
                    // $request->session()->forget('ses_shipping_method');
                    // $request->session()->forget('ses_shipping_details');
                    // $request->session()->forget('ses_coupon');
                    // $request->session()->forget('ses_free_shipping_coupon');
                    // $request->session()->forget('ses_grand_total');
                    // $request->session()->forget('ses_shipping_rate');
                    // $request->session()->forget('ses_vendor_shipping_rates_90');
                    return redirect('/cart');
                }
            }
        }
        catch(\Exception $e)
        {
            $error_message = $e->getMessage();
            // .' ////'. $e->getLine().' ////'. $e->getFile();
        }
        catch(\Cartalyst\Stripe\Exception\CardErrorException $e) 
        {
            $error_message = $e->getMessage();
            // .' ////'. $e->getLine().' ////'. $e->getFile();
        }
        catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) 
        {
            $error_message = $e->getMessage();
            // .' ////'. $e->getLine().' ////'. $e->getFile();
        }
        $request->session()->put('ses_card_error', $error_message);
        $redirect ='payment-details';
        return redirect()->route('frontend.payment-details' , $redirect)->with('flash_danger', $error_message);
    }

    public function order_placed(Request $request)
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Checkout';
        $data['breadcrumbs'][]  = 'Order Placed';
        $data['customer']       = Customer::logged_in();

        $data['order']          = Order::find(base64_decode($request->input('order')));
        $country                = Country::find($data['order']->country);
        $data['country']        = $country->name;
        if(is_numeric($data['order']->state))
        {
            $state              = State::find($data['order']->state);
            $data['state']      = $state->name;
        }
        else $data['state']     = $data['order']->state;

        //Mail::send(new SendOrder($data['order']));
        $data['same_products'] = Product::where(['vendor_id' => $data['order']->vendor_id, 'status' => 'Y'])->inRandomOrder()->get()->take(3);
        return view('frontend.checkout.order-placed', compact('data'));
    }

    public function get_shipping_rates($data)
    {
        $total_weight = 0;

        $cart = $this->product_cart->getContent();
        foreach($cart as $c)
        {
            $weight = 0;

            if(isset($c->attributes->weight))
                $weight = $c->attributes->weight;

            if($weight == 0 || $weight == '')
                $weight = 1;

            $total_weight += $weight * $c->quantity;
        }

        $country = Country::select('iso2')->where('id', $data['shipping_details']['country'])->first();
        if(is_numeric($data['shipping_details']['state']))
            $state = State::select('iso2')->where('id', $data['shipping_details']['state'])->first();
        else
            $state = substr($data['shipping_details']['state'], 0, 2); // UPS Shipping only excepts 2 letter state

        $address['address1']    = $data['shipping_details']['address1'];
        $address['address2']    = $data['shipping_details']['address2'];

        if($state && isset($state->iso2))
            $address['state']       = $state->iso2;

        $address['city']        = $data['shipping_details']['city'];
        $address['zip']         = $data['shipping_details']['zip'];
        $address['country']     = $country->iso2;
        $address['total_weight']     = $total_weight;

        return ShippingUPSHelper::shipping_rates($address);
    }

    public static function repopulate_cart($order)
    {
        $cartController = new CartController();
        foreach($order->items as $item)
        {
            $data = ['product_id' => $item->product_id, 'qty' => $item->quantity];
            $cartController->addToCart($data);
        }

        if(request()->input('coupon') != '')
        {
            $coupon_resp = $cartController->apply_coupon(request()->input('coupon'), true);
        }
        elseif($order->discount_coupon != '')
        {
            $coupon_resp = $cartController->apply_coupon($order->discount_coupon, true);
        }

        if(isset($coupon_resp) && is_array($coupon_resp) && count($coupon_resp) > 0)
        {

            if($coupon_resp['free_shipping'] && ($order->country == 233 || $order->country == 39))
            {
                $order->shipping_service = 'Free Ground Shipping';
                $order->shipping_fee = 0;
            }

            $sub_total = $order->sub_total;
            $ses_coupon = session()->get('ses_coupon');

            if($ses_coupon['type'] == 'amount')
            {
                $discount = $ses_coupon['value'];
            }
            else
            {
                $discount = ($sub_total * $ses_coupon['value']) / 100;
            }

            $order->discount = $discount;
            $order->grand_total = ($order->sub_total - $order->discount) + $order->shipping_fee;

            $order->save();
        }

        session()->put('ses_grand_total', $order->grand_total);

        $shipping = [
                        'email'         => $order->email,
                        'first_name'    => $order->first_name,
                        'last_name'     => $order->last_name,
                        'company'       => $order->company,
                        'address1'      => $order->address1,
                        'address2'      => $order->address2,
                        'country'       => $order->country,
                        'state'         => $order->state,
                        'city'          => $order->city,
                        'zip'           => $order->zip_code,
                        'phone'         => $order->phone,
                    ];

        session()->put('ses_shipping_details', $shipping);

        session()->put('ses_shipping_rate', $order->shipping_fee);

        session()->put('ses_total_without_shipping', $order->sub_total - $order->discount);

        $enc = base64_encode($order->shipping_service.'__'.$order->shipping_fee);

        AjaxController::set_order_shipping($enc, $order->notes);

        session()->put('ses_order_id', $order->id);
    }
}
