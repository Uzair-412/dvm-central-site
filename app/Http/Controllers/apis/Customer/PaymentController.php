<?php

namespace App\Http\Controllers\apis\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Auth\User;
use App\Models\Country;
use App\Models\Notification;
use App\Models\OrderItems;
use App\Models\Payment;
use App\Models\State;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Mail;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $amount = $request->input('amount');
        $amount = round($amount, 2);
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
                $sd = $request->shipping_details;
                $sm = $request->shipping_method;
                $customer = Customer::find($request->input('customer_id'));
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
    
                $data['sub_total']          = $request->input('subtotal');
                $data['shipping_fee']       = $sm['rate'];
                $data['discount']           = 0;
                $data['tax']                = 0;
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
    
                $order = Order::create($data);

                $items = $request->input('vendor_cart');

                // Send Order Mail to Customer
                Mail::send('frontend.mail.new_order_api', ['order' => $order, 'customer' => $customer, 'items'=> $items], function ($message) use ($order, $customer) {
                    $message->to($order->email, $order->first_name.' '. $order->last_name)
                    ->cc('orders@dvmcentral.com')
                        ->subject('You Ordered items at ' . appName())
                        ->from(config('mail.from.address'), appName())
                        ->replyTo('no-reply@dvmcentral.com',
                            'No-Reply'
                        );
                });

                // Send Customer's Order Mail to Vendors
                $vendors_cart = $request->input('vendor_cart');
                
                foreach ($vendors_cart as $vendor_cart) {

                    $vendor_id = $vendor_cart['vendor_id'];
                    $vendor = Vendor::find($vendor_id);
                    $vendor_user = User::find($vendor->user);

                    $customer = $request->shipping_details;
                    $customer += $request->shipping_method;
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
                }
    
                //$items = Cart::getContent();
                $cart_contents = $request->input('vendor_cart');
                if(is_array($cart_contents) && count($cart_contents) > 0)
                {
                    $vendor_orders = [];
                    foreach($cart_contents as $key => $vendor_cart)
                    {
                        unset($data['card_number'], $data['card_type'], $data['transaction_id'], $data['balance_transaction'], $data['payment_method'], $data['receipt_url']);
                        $vendor_id = $vendor_cart['vendor_id'];
                        $data['shipping_fee'] = $vendor_cart['shipping_charges']['rate'];
                        $data['shipping_service'] = $vendor_cart['shipping_charges']['service'];
                        $data['parent_id'] = $order->id;
                        $data['vendor_id'] = $vendor_id;
                        $data['discount'] = $vendor_cart['discount'];
                        $data['discount_coupon']    = $vendor_cart['coupon_code'];
                        $vendor_data = $data;

                        $vendor_order = Order::create($vendor_data);

                        $sub_total = 0;
                        $bogo_discount = 0;

                        foreach($vendor_cart['list'] as $row)
                        {
                            // if(!is_object($row)) continue;

                            // $item_price = $row->getPriceWithConditions();
                            if($row['attributes']['discount'] == 0)
                            {
                                $item_price = $row['attributes']['price_catalog'];
                            }
                            else
                            {
                                $item_price = $row['attributes']['price_discounted'];
                            }
                            // $total_price = $row->getPriceSumWithConditions();

                            $bogo = '';
                            if(@$row['bogo_free'])
                            {
                                $total_price_discount = $row['bogo_free'] * $item_price;
                                $bogo_discount += $total_price_discount;

                                $bogo = json_encode( ['bogo_free' => $row['bogo_free'], 'discount_amount' => $total_price_discount] );
                            }

                            if(@$row['bogod_count'])
                            {
                                $discounted_price = ($item_price * $row['bogod_percent']) / 100;
                                $total_price_discount = $row['bogod_count'] * $discounted_price;
                                $bogo_discount += $total_price_discount;

                                $bogo = json_encode( ['bogod_count' => $row['bogod_count'], 'bogod_percent' => $row['bogod_percent'], 'discount_amount' => $total_price_discount] );
                            }

                            $order_item['order_id'] = $order->id;
                            $order_item['vendor_order_id'] = $vendor_order->id;
                            $order_item['vendor_id'] = $vendor_id;
                            $order_item['customer_id'] = $customer_id;
                            $order_item['product_id'] = $row['id'];
                            $order_item['name'] = $row['name'];
                            $order_item['sku'] = $row['attributes']['sku'];
                            $order_item['slug'] = $row['attributes']['slug'];
                            $order_item['price'] = $item_price;
                            $order_item['price_original'] = $row['price'];
                            $order_item['quantity'] = $row['quantity'];
                            $order_item['image'] = $row['attributes']['image'];
                            $order_item['bogo'] = $bogo;
                            if($row['attributes']['discount'] == 0)
                            {
                                $sub_total += $row['price'] * $row['quantity'];
                            }
                            else
                            {
                                $sub_total += $row['attributes']['price_discounted'] * $row['quantity'];
                            }
                            OrderItems::create($order_item);
                        }

                        $grand_total = $sub_total + $vendor_cart['shipping_charges']['rate'];

                        $vendor_order->sub_total = $sub_total;
                        $vendor_order->grand_total = $grand_total;

                        $vendor_order->save();
                        $vendor_orders['order'] = $vendor_order;
                        $vendor_orders['order_items'][] = OrderItems::where('vendor_order_id', $vendor_order->id)->get();
                    }
        
                    $order->discount = 0;
                    $order->discount_coupon = 0;
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
                    else {
                        $order->state_name = $order->state;
                    }
        
                    return response()->json(['success' => 'Order placed successfully', 'order' => $order, 'vendor_orders' => $vendor_orders],200);
                }
                else
                {
                    return response()->json(['redirect_to' => 'cart'],301);
                }
            }
        }
        catch(\Exception $e)
        {
            $error_message = $e->getMessage().' ////'. $e->getLine().' ////'. $e->getFile();
        }
        catch(\Cartalyst\Stripe\Exception\CardErrorException $e) 
        {
            $error_message = $e->getMessage().' ////'. $e->getLine().' ////'. $e->getFile();
        }
        catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) 
        {
            $error_message = $e->getMessage().' ////'. $e->getLine().' ////'. $e->getFile();
        }
        return response()->json(['error' => $error_message],200);
    }
}
