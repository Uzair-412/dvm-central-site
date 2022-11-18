<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CustomerRequest;
use App\Mail\Backend\Customer\SendWelcome;
use App\Models\Customer;
use App\Models\Groups;
use App\Models\Traits\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Vendor;
use DB;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Users';
        $data['p_description']  = 'Here is the list of customers';

        $data['customers']      = Customer::getCustomers();

        return view('backend.customers.index', compact('data'));
    }

    public function show(Customer $customer)
    {
        $data['customer'] = $customer;

        return view('backend.customers.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create User';
        $data['p_description']  = 'Create a new customer by filling the form below';

        $data['groups']         = Groups::pluck('name', 'id');

        $type         = new Customer;
        $data['type']         = $type->types;
        $data['level']         = Level::select(DB::raw('CONCAT(name," - ",description) AS name'), 'id')->pluck('name', 'id');
        $data['confirmed'] = $data['active'] = '1';

        return view('backend.customers.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {   
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->except(['password_confirmation', 'send_welcome_email', 'send_confirmation_email']);

        $data['uuid'] = \Str::uuid();
        $data['password'] = \Hash::make($data['password']);
        $data['remember_token'] = md5(uniqid(mt_rand(), true));

        if($request->name == null)
            $data['name'] = $request->first_name.' '.$request->last_name;
        else
            $data['name'] = $request->name;

        if($request->input('send_confirmation_email'))
        {
            $data['confirmation_code'] = \Str::random(32);
            $data['confirmed'] = 0;
        }
        
        $customer = Customer::create($data);

        if($request->input('send_welcome_email'))
        {
            (new Customer())->welcome_email($customer);
        }

        if($request->input('send_confirmation_email'))
        {
            (new Customer())->confirmation_email($customer);
        }

        //return redirect()->route('admin.customers.index')->with('flash_success','Customer added successfully.');
        return redirect()->route('admin.customers.edit', $customer->id)->with('flash_success', $request->type.' added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    /*public function show(Category $category)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $data['customer']       = $customer;
        $data['p_heading']      = 'Update User';
        $data['p_description']  = 'Modify customer review by filling the form below';

        $data['groups']         = Groups::pluck('name', 'id');
        $data['level']         = Level::select(DB::raw('CONCAT(name," - ",description) AS name'), 'id')->pluck('name', 'id');
        $type                   = new Customer; 
        $data['type']           = $type->types;
        return view('backend.customers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->except(['password_confirmation', 'send_welcome_email', 'send_confirmation_email']);

        if(trim($data['password']) != null)
        {
            $data['password'] = \Hash::make($data['password']);
        }
        else
        {
            unset($data['password']);
        }

        if($request->input('send_confirmation_email'))
        {
            $data['confirmation_code'] = \Str::random(32);
            $data['confirmed'] = 0;
        }

        $customer->update($data);

        if($request->input('send_welcome_email'))
        {
            (new Customer())->welcome_email($customer);
        }

        if($request->input('send_confirmation_email'))
        {
            (new Customer())->confirmation_email($customer);
        }

        return redirect()->route('admin.customers.index')->with('flash_success',$request->type. ' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {   
        if($customer->vendor){
            if($customer->type == 'vendor' && count($customer->vendor->products) > 0 && count($customer->vendor->get_vendor_orders) > 0 ){

                return back()->with('flash_danger',$customer->type.' with products and orders cannot be deleted until it\'s products and orders get deleted.');
                
            }elseif($customer->type == 'vendor' && count($customer->vendor->products) > 0 ){

                return back()->with('flash_danger',$customer->type.' with products cannot be deleted until it\'s products get deleted.');
            }
        }
        $customer->addresses->each->delete();
        Vendor::where('user', $customer->id)->delete();
        $customer->delete();
        
        return back()->with('flash_success',$customer->type.' deleted successfully.');
    }
}
