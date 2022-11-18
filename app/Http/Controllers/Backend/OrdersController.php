<?php

namespace App\Http\Controllers\Backend;

use App\Console\Commands\AbandonCartEmails;
use App\Mail\Frontend\Order\SendOrderStatus;
use App\Models\Customer;
use App\Models\Messages;
use App\Models\Notification;
use App\Models\Order;
use App\Models\UTMCodes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Models\OrderItems;
use App\Models\Review;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['p_heading']      = 'Manage Orders';
        $data['p_description']  = 'Here is the list of orders';

        $filter = [];

        if(trim($request->input('name')) != null)
            $filter['name'] = $request->input('name');
        if(trim($request->input('email')) != null)
            $filter['email'] = $request->input('email');
        if(trim($request->input('address')) != null)
            $filter['address'] = $request->input('address');
        if(trim($request->input('ups_tracking_id')) != null)
            $filter['ups_tracking_id'] = $request->input('ups_tracking_id');
        if(trim($request->input('transaction_id')) != null)
            $filter['transaction_id'] = $request->input('transaction_id');
        if(trim($request->input('order_status')) != null)
            $filter['order_status'] = $request->input('order_status');

        $data['orders']     = Order::getOrders($filter);

        return view('backend.orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        $data['p_heading']      = 'Create Customer Group';
        $data['p_description']  = 'Create a new customer group by filling the form below';

        return view('backend.groups.create', compact('data'));
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $data = $request->all();

        $group = Groups::create($data);

        return redirect()->route('admin.groups.index')->with('flash_success','Customer group added successfully.');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $data['product_list'] = [];

        for($i=0; $i <= count($order->items)-1; $i++)
        {
            $data['product_list'][$order->items[$i]->vendor_id][] = $order->items[$i];
        }

        $data['order']          = $order;
        $data['utm']            = UTMCodes::select('description')->where('code', $order->utm_code)->first();
        $data['p_heading']      = 'Details for Order # '. $order->id;
        $data['p_description']  = 'Here are the details of order number '.$order->id;

        $data['notifications']  = Notification::where('order_id', $order->id)->where('type', 'order')->get();

        $data['messages']       = Messages::where('order_id', $order->id)->get();

        return view('backend.orders.show', compact('data'));
    }

    public function save_status(Request $request)
    {
        // dd($request->all());

        $email_sent = $request->input('email_sent') ? 'Y' : 'N';

        $order_status = $request->input('order_status');

        $data = [
            'type' => 'order',
            'customer_id' => $request->input('customer_id'),
            'order_id' => $request->input('order_id'),
            'order_status' => $order_status,
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'email_sent' => $email_sent
        ];

        $order_update = Notification::create($data);

        $order_link = '/dashboard/orders/'.$request->input('order_id');

        $subject = 'Your order # <strong>'. $request->input('order_id') .'</strong> is now under <strong>'. Order::$statuses[$order_status] .'</strong> status, <a href="'. $order_link .'">click here to view your order</a>.';

        $data = [
            'type' => 'alert',
            'customer_id' => $request->input('customer_id'),
            'order_id' => $request->input('order_id'),
            'order_status' => $request->input('order_status'),
            'subject' => $subject,
            'message' => '',
            'alert_type' => Order::$statuses_css[$order_status],
            'email_sent' => $email_sent
        ];

        $notification = Notification::create($data);

        if($email_sent == 'Y')
        {
            $order = Order::find($request->input('order_id'));
            $order_update->name = $order->first_name . ' ' . $order->last_name;
            $order_update->email = $order->email;
            $order_update->ups_tracking_id = $order->ups_tracking_id;
            if($request->input('ups_tracking_id'))
                $order_update->ups_tracking_id = $request->input('ups_tracking_id');
            $order_update->order_id = $order->id;
            Mail::send(new SendOrderStatus($order_update));
        }

        $order_data['order_status'] = $request->input('order_status');
        if($request->input('ups_tracking_id'))
            $order_data['ups_tracking_id'] = $request->input('ups_tracking_id');

        Order::find($request->input('order_id'))->update($order_data);

        return back()->with('flash_success','Order status updated successfully.');
    }

    public function send_followup_email(Request $request)
    {
        $order = Order::find($request->input('order_id'));
        $ac_status = $request->input('ac_message');
        AbandonCartEmails::send_ac_email($order, $ac_status, false);
        return back()->with('flash_success','Follow up email sent successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $data['review']       = $review;
        $data['p_heading']      = 'Update Product Review';
        $data['p_description']  = 'Modify product review by filling the form below';

        return view('backend.reviews.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $data = $request->all();
        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('flash_success','Product review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return back()->with('flash_success','Product review deleted successfully.');
    }
}
