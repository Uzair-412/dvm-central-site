<?php

namespace App\Http\Controllers;

use App\Helpers\General\FirstDataHelper;
use App\Helpers\General\ShippingUPSHelper;
use App\Mail\Frontend\App\SendAppOrder;
use App\Mail\Frontend\Order\SendOrder;
use App\Models\Country;
use App\Models\MicroSites;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payment;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class LanguageController.
 */
class ApiController extends Controller
{
    /**
     * @param $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJWZXRlcmluYXJ5IFN1cmdpY2FsIEluc3RydW1lbnQiLCJpYXQiOjE1NzkzMzM2NzUsImV4cCI6MTYxMTM4ODA3NSwiYXVkIjoid3d3LnZldGVyaW5hcnlzdXJnaWNhbGluc3RydW1lbnQuY29tIiwic3ViIjoiaW5mb0B2ZXRlcmluYXJ5c3VyZ2ljYWxpbnN0cnVtZW50LmNvbSJ9.n267Gh4LhBbUYhNohO4QGhstRs1SwHcykj_OhEE86Mg';

    function __construct(Request $request)
    {
        /*if($request->header('token') != $this->token)
        {
            abort(401);
        }*/
    }

    public function search(Request $request)
    {
        if($request->input('term'))
        {
            $term = $request->input('term');
            $filter = ['keywords' => $term, 'app_search' => 'Y'];
        }
        else if($request->input('type'))
        {
            $type = $request->input('type');
            if($type == 'WingedElevators');
            {
                $filter['skus'] = ['GLW50-189','GLW50-190','GLW50-191','GLW50-192','GLW50-193','GLW50-194','GLW-2018-22','GLW-2018-11','GLWT50-6940','GLWT50-6941','GLWT50-6942','GLWT50-6943','GLWT50-6944','GLWT50-6945','GLWT-2020-33','GLWT-2020-11'];
                $filter['limit'] = 1000;
            }
        }

        if(isset($filter))
        {
            $result = Product::getProducts($filter);

            $return = [];

            foreach($result as $product)
            {
                $slug = Product::getProductSlug($product);
                $sale_price = Product::getPriceText($product);
                $ret = ['id' => $product->id,'name' => $product->name, 'sku' => $product->sku, 'url' => url($slug),
                    'image' => [
                        'thumbnail' => url('up_data/products/images/thumbnails/'.$product->image),
                        'medium' => url('up_data/products/images/medium/'.$product->image),
                        'large' => url('up_data/products/images/'.$product->image)
                    ],
                    'short_description' => $product->short_description,
                    'long_description' => $product->full_description,
                    'price' => round($sale_price['price'], 2),
                    'sale_price' => round($sale_price['sale_price'], 2),
                    'discount' => round($sale_price['discount'], 2),
                ];
                array_push($return, $ret);
            }

            return $return;
        }
        else abort(401);
    }

    public function save_order(Request $request)
    {
        /*print_r($request->all());
        die;*/

        $amount = $request->input('grand_total');

        $amount = round($amount, 2);
        $customer_id = 0;
        $email = $request->input('email');

        if ($request->input('charge_card') == 'Y')
        {
            try
            {
                $ref_number = 'GV-'.time();

                $cc_expiry = $request->input('cc_month').$request->input('cc_year');

                $cc_type = strtoupper($request->input('cc_type'));

                $cc_number = str_replace('-','', $request->input('cc_number'));

                $first_data = ['cc_type' => $cc_type, 'cc_number' => $cc_number, 'cc_expiry' => $cc_expiry, 'cc_cvv' => $request->input('cc_cvv'),
                    'cc_name' => $request->input('cc_name'), 'amount' => $amount, 'ref_number' => $ref_number];

                $charge = FirstDataHelper::charge($first_data);
                $card_number = str_replace('#', '', $charge['cc_number']);

                $data['card_number']        = $card_number;
                $data['card_type']          = $charge['credit_card_type'];
                $data['transaction_id']     = $charge['transaction_tag']; // First Data's Transaction Tag
                $data['balance_transaction'] = $charge['authorization_num']; // First Data's Authorization Number
                $data['payment_method']     = $charge['reference_no']; // Our own generated number for cross reference at First Data
                $data['receipt_url']        = $charge['ctr']; // First Data Returns CTR - Response so saving that

                //return redirect()->route('frontend.order-placed', ['order' => base64_encode($order->id)]);
            }
            catch(\Exception $e)
            {
                return ['status' => '0', 'message' => $e->getMessage()];
                //return back()->with(['flash_danger' => $e->getMessage()]);
            }

            $order_status = 1;
        }
        else
        {
            $data['card_number']        = '';
            $data['card_type']          = '';
            $data['transaction_id']     = ''; // First Data's Transaction Tag
            $data['balance_transaction'] = ''; // First Data's Authorization Number
            $data['payment_method']     = ''; // Our own generated number for cross reference at First Data
            $data['receipt_url']        = ''; // First Data Returns CTR - Response so saving that

            $order_status = 10;
        }

        $data['customer_id']        = $customer_id;


        $data['email']              = $email;
        $data['first_name']         = $request->input('first_name');
        $data['last_name']          = $request->input('last_name');
        $data['company']            = '';
        $data['address1']           = $request->input('address1');
        $data['address2']           = $request->input('address2');
        $data['country']            = $request->input('country');
        $data['state']              = $request->input('state');
        $data['city']               = $request->input('city');
        $data['zip_code']           = $request->input('zip');
        $data['phone']              = $request->input('phone');

        $data['sub_total']          = round($request->input('sub_total'),2);
        $data['shipping_fee']       = round($request->input('shipping_rate'), 2);
        $data['discount']           = round($request->input('discount'), 2);
        $data['tax']                = 0;
        $data['grand_total']        = $amount;
        $data['shipping_service']   = $request->input('shipping_service');
        $data['discount_coupon']    = '';
        $data['notes']              = $request->input('notes');

        $data['order_status']       = $order_status;

        $data['utm_code']           = 'APP-ORDER';

        $order                      = Order::create($data);

        $product_ids    = $request->input('product_id');
        $qtys           = $request->input('qty');
        $charge_prices  = $request->input('charge_price');

        for($i = 0 ; $i < count($product_ids) ; $i++)
        {
            $product = Product::find($product_ids[$i]);

            $order_item['order_id'] = $order->id;
            $order_item['customer_id'] = $customer_id;
            $order_item['product_id'] = $product->id;
            $order_item['name'] = $product->name;
            $order_item['sku'] = $product->sku;
            $order_item['slug'] = $product->slug;
            $order_item['price'] = $charge_prices[$i];
            $order_item['price_original'] = $product->price_catalog;
            $order_item['quantity'] = $qtys[$i];
            $order_item['image'] = $product->image;
            $order_item['bogo'] = '';

            $oi = OrderItems::create($order_item);
        }

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

        if ($request->input('charge_card') == 'Y')
        {
            unset($data);

            $data['ref_type']           = 'order';
            $data['ref_id']             = $order->id;
            $data['customer_id']        = $order->customer_id;
            $data['title']              = 'Paid $'.number_format($order->grand_total, 2).' for the purchase of instruments.';
            $data['amount']             = $order->grand_total;
            $data['card_number']        = $order->card_number;
            $data['card_type']          = $order->card_type;
            $data['transaction_id']     = $order->transaction_id; // First Data's Transaction Tag
            $data['balance_transaction'] = $order->balance_transaction; // First Data's Authorization Number
            $data['payment_method']     = $order->payment_method; // Our own generated number for cross reference at First Data
            $data['receipt_url']        = $order->receipt_url; // First Data Returns CTR - Response so saving that

            Payment::create($data);
        }

        $country                = Country::find($order->country);
        $order->country_name    = $country->name;
        if(is_numeric($order->state))
        {
            $state              = State::find($order->state);
            $order->state_name  = $state->name;
        }
        else $order->state_name = $order->state;

        Mail::send(new SendOrder($order));

        return ['status' => '1', 'message' => 'Order saved successfully.'];
    }

    public static function get_shipping_rates(Request $request)
    {
        $total_weight = 0;

        $product_ids    = $request->input('product_id');
        $qtys           = $request->input('qty');

        for($i = 0 ; $i < count($product_ids) ; $i++)
        {
            $product = Product::find($product_ids[$i]);
            $weight = 0;

            if(isset($product->weight))
                $weight = $product->weight;

            if($weight == 0 || $weight == '')
                $weight = 1;

            $total_weight += $weight * $qtys[$i];
        }

        $country = Country::select('iso2')->where('id', $request->input('country'))->first();
        if(is_numeric($request->input('state')))
            $state = State::select('iso2')->where('id', $request->input('state'))->first();
        else
            $state = substr($request->input('state'), 0, 2); // UPS Shipping only excepts 2 letter state

        $address['address1']    = $request->input('address1');
        $address['address2']    = $request->input('address2');

        if($state && isset($state->iso2))
            $address['state']       = $state->iso2;

        $address['city']        = $request->input('city');
        $address['zip']         = $request->input('zip');
        $address['country']     = $country->iso2;
        $address['total_weight']     = $total_weight;

        $rates = ShippingUPSHelper::shipping_rates($address, true);

        if(isset($rates['status']) && $rates['status'] == 0)
        {
            return $rates;
        }
        else
        {
            return ['status' => 1, 'data' => $rates];
        }
    }

    public function payment_intent(Request $request)
    {
        if ($request->input('token') == $this->token)
        {
            $amount = round($request->input('amount'), 2);
            $currency = 'USD';

            $paymentIntent = \Stripe::paymentIntents()->create([
                'amount' => $amount,
                'currency' => $currency
            ]);

            return ['status' => 1, 'payment_intent' => $paymentIntent['id'], 'client_secret' => $paymentIntent['client_secret']];
        }
    }

    public function get_site_products(Request $request)
    {
        $domain = $request->header('domain');

        $site = MicroSites::select('id')->where('domain', $domain)->first();

        if($request->header('token') != $this->token || !isset($site))
        {
            abort(401);
        }

        $filter = [];

        if($request->get('featured') == 'Y')
            $filter['featured'] = 'Y';

        if($request->get('product_id'))
        {
            //$filter['product_id'] = $request->get('product_id');
            $product = Product::find($request->get('product_id'));
            return self::product_info($product);
        }

        if($request->get('term')) // if performing search -- for lister bandage / hi level etc
        {
            $term = $request->input('term');
            $result = Product::getProducts(['keywords' => $term]);

            $return = [];

            foreach($result as $product)
            {
                $ret = self::product_info($product);
                array_push($return, $ret);
            }

            return $return;

            return $result;
        }

        $result = MicroSites::getProducts($site->id, $filter);

        $return = [];

        foreach($result as $product)
        {
            $ret = self::product_info($product);
            array_push($return, $ret);
        }

        return $return;

    }

    public static function product_info($product)
    {
        $slug = Product::getProductSlug($product);
        $url = url($slug);
        $product->url = $url;
        $sale_price = Product::getPriceText($product, 'listing', true, true);

        $na = url('up_data/na.jpg');
        if(trim($product->image) != null)
        {
            $thumbnail = url('up_data/products/images/thumbnails/'.$product->image);
            $medium = url('up_data/products/images/medium/'.$product->image);
            $large = url('up_data/products/images/'.$product->image);
        }
        else
        {
            $thumbnail = $medium = $large = $na;
        }

        $ret = [
            'id' => $product->id,
            'name' => $product->name, 'sku' => $product->sku, 'url' => $url,
            'image' => [
                'thumbnail' => $thumbnail,
                'medium' => $medium,
                'large' => $large
            ],
            'short_description' => $product->short_description,
            'long_description' => $product->full_description,
            'type' => $product->type,
            'weight' => $product->weight,
            'price' => round($sale_price['price'], 2),
            'sale_price' => round($sale_price['sale_price'], 2),
            'discount' => round($sale_price['discount'], 2),
        ];

        if($product->type == 'variation')
        {
            $sub_ret = [];
            //$subs = $product->childProducts()->orderBy('position','asc')->orderBy('name','asc')->get();
            $subs = Product::getChildProducts($product->id);

            foreach($subs as $sub)
            {
                $sub_info = self::product_info($sub);
                array_push($sub_ret, $sub_info);
            }

            $ret['sub_products'] = $sub_ret;
        }

        return $ret;
    }

    public function sync_order(Request $request)
    {
        $domain = $request->header('domain');

        $site = MicroSites::select('id')->where('domain', $domain)->first();

        if($request->header('token') != $this->token || !isset($site))
        {
            abort(401);
        }

        $order = json_decode($request->input('order'));

        $data['email']              = $order->email;
        $data['first_name']         = $order->first_name;
        $data['last_name']          = $order->last_name;
        $data['company']            = $order->company;
        $data['address1']           = $order->address1;
        $data['address2']           = $order->address2;
        $data['country']            = $order->country;
        $data['state']              = $order->state;
        $data['city']               = $order->city;
        $data['zip_code']           = $order->zip_code;
        $data['phone']              = $order->phone;

        $data['sub_total']          = $order->sub_total;
        $data['shipping_fee']       = $order->shipping_fee;
        $data['discount']           = $order->discount;
        $data['tax']                = $order->tax;
        $data['grand_total']        = $order->grand_total;
        $data['shipping_service']   = $order->shipping_service;
        $data['discount_coupon']    = $order->discount_coupon;
        $data['notes']              = $order->notes . ' <br><br> ---- Micro Site Order ID: ' . $order->id;

        $data['order_status']       = $order->order_status;

        $data['card_number']        = $order->card_number;
        $data['card_type']          = $order->card_type;
        $data['transaction_id']     = $order->transaction_id;
        $data['balance_transaction'] = $order->balance_transaction;
        $data['payment_method']     = 'credit-card';
        $data['receipt_url']        = $order->receipt_url;
        //$data['reference_id']       = $order->reference_id;
        //$data['paypal_token']       = $order->paypal_token;
        $data['site_id']            = $site->id;
        $data['hash']               = $order->hash;

        $new_order = Order::create($data);

        foreach($order->order_items as $row)
        {
            $slug = explode('/',$row->slug);
            $slug = $slug[count($slug)-1];
            $image = explode('/', $row->image);
            $image = $image[count($image)-1];

            $order_item['order_id'] = $new_order->id;
            $order_item['customer_id'] = $new_order->customer_id;
            $order_item['product_id'] = $row->product_id;
            $order_item['name'] = $row->name;
            $order_item['sku'] = $row->sku;
            $order_item['slug'] = $slug;
            $order_item['price'] = $row->price;
            $order_item['price_original'] = $row->price_original;
            $order_item['quantity'] = $row->quantity;
            $order_item['image'] = $image;
            $order_item['bogo'] = $row->bogo;

            OrderItems::create($order_item);
        }

        foreach($order->notifications as $row)
        {
            $notification = [
                'type' => 'order',
                'customer_id' => $new_order->customer_id,
                'order_id' => $new_order->id,
                'order_status' => $row->order_status,
                'subject' => $row->subject,
                'message' => $row->message,
                'email_sent' => $row->email_sent
            ];

            Notification::create($notification);
        }

        $p_data['ref_type']           = 'order';
        $p_data['ref_id']             = $new_order->id;
        $p_data['customer_id']        = $new_order->customer_id;
        $p_data['title']              = 'Paid $'.number_format($new_order->grand_total, 2).' for the purchase of instruments.';
        $p_data['amount']             = $new_order->grand_total;
        $p_data['payment_method']     = $new_order->payment_method;
        $p_data['receipt_url']        = $new_order->receipt_url;

        Payment::create($p_data);

        return ['status' => '1'];
    }
}
