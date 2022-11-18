<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\InvoiceRequest;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Manage Invoices';

        $data['p_heading']      = 'Manage Invoices';
        $data['p_description']  = 'Here is the list of Invoices';

        $filter = [];

        if(trim($request->input('customer_id')) != null)
            $filter['customer_id'] = $request->input('customer_id');
        if(trim($request->input('status')) != null)
            $filter['status'] = $request->input('status');
        if(trim($request->input('title')) != null)
            $filter['title'] = $request->input('title');
        if(trim($request->input('invoice_number')) != null)
            $filter['invoice_number'] = $request->input('invoice_number');

        $data['invoices']       = Invoice::getInvoices($filter);
        $data['customers']      = Customer::pluckCustomers();

        return view('backend.invoices.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Create Invoice';
        $data['p_heading']      = 'Create Invoice';
        $data['p_description']  = 'Create a new invoice by filling the form below';

        $data['customers']      = Customer::pluckCustomers();

        $data['display_ref_id'] = $data['display_late_fee'] = 'd-none';
        $data['ref_ids'] = [];

        if($request->session()->get('ses_invoice_data'))
        {
            $form = $request->session()->get('ses_invoice_data');
            $request->session()->forget('ses_invoice_data');

            if($form['ref_type'] == 'order')
                $data['display_ref_id'] = '';

            if($form['late_fee_type'] == 'flat' || $form['late_fee_type'] == 'percentage')
                $data['display_late_fee'] = '';

            if(isset($form['customer_id']) && $form['customer_id'] > 0)
            {
                $data['ref_ids'] = Customer::getCustomerOrders(['customer_id' => $form['customer_id']]);
            }
        }

        return view('backend.invoices.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        // die('here');
        $validated = $request->validated();

        if(!$validated)
            return back();


        $data = $request->all();

        // die;

        $data = $request->all();

        $invoice = Invoice::create($data);

        return redirect()->route('admin.invoices.index')->with('flash_success','Invoice added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $data['invoice']          = $invoice;
        $data['p_heading']      = 'Details for Invoice # '. $invoice->id;
        $data['p_description']  = 'Here are the details of invoice number '.$invoice->id;

        $data['notifications']  = Notification::where('order_id', $invoice->id)->where('type', 'invoice')->get();

        return view('backend.invoices.show', compact('data'));
    }

    // public function save_status(Request $request)
    // {
    //     // dd($request->all());

    //     $email_sent = $request->input('email_sent') ? 'Y' : 'N';

    //     $order_status = $request->input('order_status');

    //     $data = [
    //         'type' => 'order',
    //         'customer_id' => $request->input('customer_id'),
    //         'order_id' => $request->input('order_id'),
    //         'order_status' => $order_status,
    //         'subject' => $request->input('subject'),
    //         'message' => $request->input('message'),
    //         'email_sent' => $email_sent
    //     ];

    //     $notification = Notification::create($data);

    //     $order_link = '/dashboard/orders/'.$request->input('order_id');

    //     $subject = 'Your order # <strong>'. $request->input('order_id') .'</strong> is now under <strong>'. Order::$statuses[$order_status] .'</strong> status, <a href="'. $order_link .'">click here to view your order</a>.';

    //     $data = [
    //         'type' => 'alert',
    //         'customer_id' => $request->input('customer_id'),
    //         'order_id' => $request->input('order_id'),
    //         'order_status' => $request->input('order_status'),
    //         'subject' => $subject,
    //         'message' => '',
    //         'alert_type' => Order::$statuses_css[$order_status],
    //         'email_sent' => $email_sent
    //     ];

    //     $notification = Notification::create($data);

    //     if($email_sent == 'Y')
    //     {
    //         // Send email
    //     }

    //     $order_data['order_status'] = $request->input('order_status');
    //     if($request->input('ups_tracking_id'))
    //         $order_data['ups_tracking_id'] = $request->input('ups_tracking_id');

    //     Order::find($request->input('order_id'))->update($order_data);

    //     return back()->with('flash_success','Order status updated successfully.');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Invoice $invoice)
    {
        // dd($invoice);
        $data['invoice']       = $invoice;
        $data['p_heading']      = 'Update Product Invoice';
        $data['p_description']  = 'Modify product invoice by filling the form below';

        $data['customers']      = Customer::pluckCustomers();

        $data['display_ref_id'] = $data['display_late_fee'] = 'd-none';
        $data['ref_ids'] = [];

        if($request->session()->get('ses_invoice_data'))
        {
            $form = $request->session()->get('ses_invoice_data');
            $request->session()->forget('ses_invoice_data');

            if($form['ref_type'] == 'order')
                $data['display_ref_id'] = '';

            if($form['late_fee_type'] == 'flat' || $form['late_fee_type'] == 'percentage')
                $data['display_late_fee'] = '';

            if(isset($form['customer_id']) && $form['customer_id'] > 0)
            {
                $data['ref_ids'] = Customer::getCustomerOrders(['customer_id' => $form['customer_id']]);
            }
        }


        return view('backend.invoices.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $data = $request->all();
        $invoice->update($data);

        return redirect()->route('admin.invoices.index')->with('flash_success','Product invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('admin.invoices.index')->with('flash_success','Product invoice deleted successfully.');
    }
}
