<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AddressRequest;
use App\Http\Requests\Backend\CustomerRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Groups;
use App\Models\State;
use App\Models\Traits\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use PHPUnit\Framework\Constraint\Count;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $customer_name = $customer->first_name . ' ' . $customer->last_name;

        $data['p_heading']      = 'Manage Addresses of '.$customer_name;
        $data['p_description']  = 'Here is the list of customer addresses';

        $data['customer']       = $customer;
        $data['addresses']      = $customer->addresses()->paginate(10);

        return view('backend.customers.addresses.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        $customer_name = $customer->first_name . ' ' . $customer->last_name;

        $data['p_heading']      = 'Create Address for '.$customer_name;
        $data['p_description']  = 'Create a new customer address by filling the form below';

        $data['customer']       = $customer;
        $data['countries']      = Country::pluck('name', 'id');

        $data['default_billing'] = $data['default_shipping'] = 'N';

        return view('backend.customers.addresses.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Customer $customer, AddressRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $data['customer_id'] = $customer->id;

        $address = Address::create($data);

        return redirect()->route('admin.customers.addresses.index', $customer->id)->with('flash_success','Customer address added successfully.');
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
    public function edit(Customer $customer, Address $address)
    {
        $data['customer']       = $customer;
        $data['p_heading']      = 'Update Customer Address';
        $data['p_description']  = 'Modify customer address by filling the form below';
        $data['address']         = $address;

        $data['countries']      = Country::pluck('name', 'id');

        $data['states']         = State::where('country_id', $address->country)->orderBy('name', 'asc')->pluck('name','id');

        return view('backend.customers.addresses.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Customer $customer, Address $address, AddressRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $address->update($data);

        return redirect()->route('admin.customers.addresses.index', $customer->id)->with('flash_success','Customer address updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Address $address)
    {
        $address->delete();

        return back()->with('flash_success','Customer address deleted successfully.');
    }
}
