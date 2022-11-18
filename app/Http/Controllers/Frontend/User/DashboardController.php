<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests\UserDocumentsRequest;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Order;
use App\Models\PushNotificationByUser;
use App\Models\UserDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $filter['customer_id'] = Auth::user()->id;
        $filter['limit'] = 5;
        // $data['orders'] = Order::where('parent_id', 0)->where('vendor_id', NULL)->where('customer_id', $filter['customer_id'])->paginate('10');
        // $data['notifications'] = Notification::where(['type' => 'alert', 'dismissed' => 'N', 'customer_id' => Auth::user()->id])->where('viewed', '<', 3)->get();
        $data['page'] = 'Dashboard';
        $view = "home";
        return view('frontend.user.dashboard', compact('data', 'view'));
    }

    public function orders()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'Orders';
        $view = "orders";
        return view('frontend.user.orders', compact('data', 'view'));
    }

    public function order_detail(Order $order)
    {
        $customer =  Auth::user();
        if ($customer->id != $order->customer_id)
            abort(404);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'Orders';
        $data['breadcrumbs'][]  = 'Detail of Order # ' . $order->id;
        // $data['order'] = $order;

        // $data['notifications']  = Notification::where('order_id', $order->id)->where('type', 'order')->get();

        // $data['product_list'] = [];
        // for($i=0; $i <= count($order->items)-1; $i++){
        //     $data['product_list'][$order->items[$i]->vendor_id][] = $order->items[$i];
        // }


        // $data['orderitems'] = OrderItems::where('customer_id', $data['order']['customer_id'])->where('order_id', $data['order']['id'])->get();

        $data['page'] = 'orders';
        $data['orderId'] = $order->id;
        $view = "orders";
        return view('frontend.user.order_detail', compact('data', 'view'));
    }   

    public function payment_history()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'Payment History';

        $customer =  Customer::logged_in();

        $data['payments'] = [];

        if(!empty($customer)){

            $payments = $customer->payments()->orderBy('id', 'desc')->paginate('10');

            if(!empty($payments)){
                $data['payments']   =  $payments;
            }    

        } else{
            return redirect('/login');
        }

        $data['page'] = 'payment-history';
        $view = "payment_history";
        return view('frontend.user.payments', compact('data', 'view'));
    }

    public function payment_detail($id)
    {
        $payment = Payment::find($id);
        $customer =  Auth::user();

        if ($payment->customer_id != $customer->id)
            abort(404);

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'Payment History';
        $data['breadcrumbs'][]  = 'Payment Detail';

        $data['page'] = 'payment-history';

        $data['payment']      = $payment;

        $link = '';
        if ($payment->ref_type == 'order') {
            $link = '/dashboard/orders/' . $payment->ref_id;
        }

        $data['link'] = $link;
        $view = "payment_history_detail";
        return view('frontend.user.payments_detail', compact('data', 'view'));
    }

    public function user_level()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'User Level';
        $view = "user-level";
        return view('frontend.user.user-level', compact('data', 'view'));
    }

    public function notifications()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'Notifications';
        $view = "notifications";
        return view('frontend.user.notifications', compact('data', 'view'));
    }

    public function notification_details($id)
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'Notifications';
        $data['user_notification'] =  PushNotificationByUser::find($id);
        $view = "notification_details";
        return view('frontend.user.notification_details', compact('data' , 'view'));
    }

    public function document_upload(Request $request){
        
        $validation = Validator::make($request->all(),[
            'file' => 'required|mimes:pdf,docx,doc,zip|max:8192'
        ]);

        if($validation->fails()){
            return back()->with('flash_danger','You\'ve uploaded Unsupported Document. Supported Format: pdf, doc, docx and zip file');
        }
        if($request->file('file'))
        {
            $file_name = substr($request->file('file')->getClientOriginalName(),0,-4);
            $ext = '.'.$request->file('file')->getClientOriginalExtension();
            $file_name = $file_name.'-'.time().$ext;
            $data['file'] = str_replace('users/','',Storage::disk('ds3')->putFileAs('users', $request->file('file'), $file_name));
        }
            $user_documents = new UserDocument;
            $user_documents->user_id = auth()->user()->id;
            $user_documents->name = $file_name;
            $user_documents->status = 'pending';
            $user_documents->level = auth()->user()->level +1;
            $user_documents->save();

            return redirect()->back()->with('flash_success', 'Document uploaded successfully');
    }

    public function document_delete($id){

        $user_document = UserDocument::find($id);
        $user_document->delete();

        //deleting the document from directory
        $user_document = 'up_data/users/'.$user_document->name;
        if(file_exists($user_document)) {
            unlink($user_document);
        }
        return redirect()->back()->with('flash_success', 'Document Deleted successfully');
    }
}