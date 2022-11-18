<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AddressRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


/**
 * Class DashboardController.
 */
class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'My Address';

        $id =  Auth::user()->id;

        // dd($id);

        $data['addresses']      = Address::where('customer_id',$id)->orderBy('id', 'desc')->paginate('10');

        $data['page'] = 'addresses';
        $view = 'address';

        return view('frontend.user.addresses.index', compact('data', 'view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'My Address';
        $data['breadcrumbs'][]  = 'Create Address';

        $customer =  Auth::user();

        $data['page'] = 'addresses';

        // $customer_name = $customer->first_name . ' ' . $customer->last_name;

        $data['countries']      = Country::pluck('name', 'id');

        $data['default_shipping'] = 'N';

        return view('frontend.user.addresses.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $validated = $request->validated();

        if(!$validated)
            return back();

        if($request->default_shipping == 'Y'){
            $id =  Auth::user()->id;
            if($id){
                Address::where('customer_id', $id)->update(['default_shipping' => 'N']);
            }
        }
        if($request->checkout_page_address_change == 1){
            $data = $request->except('checkout_page_address_change');
        }

        $data = $request->except('checkout_page');

        $customer =  Auth::user()->id;

        $data['customer_id'] = $customer;

        $address = Address::create($data);

        if($request->checkout_page == 1)
            return redirect()->route('frontend.process-payment');

        return redirect()->route('frontend.user.addresses.index')->with('flash_success','Address added successfully.');
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
    public function edit(Address $address)
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Dashboard';
        $data['breadcrumbs'][]  = 'My Address';
        $data['breadcrumbs'][]  = 'Modify Address';

        $customer =  Auth::user();

        $data['page'] = 'addresses';

        $data['address']         = $address;

        $data['countries']      = Country::pluck('name', 'id');

        $data['states']         = State::where('country_id', $address->country)->orderBy('name', 'asc')->pluck('name','id');

        return view('frontend.user.addresses.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Address $address, AddressRequest $request)
    {
        if(auth()->check()){
            $id =  Auth::user()->id;
            if($id && $request->default_shipping=='Y'){
                Address::where([['id' , '!=' , $address->id],['customer_id', $id]])->update(['default_shipping' => 'N']);
            }
        }
        $customer =  Auth::user();

        if($address->customer_id != $customer->id)
            abort(404);

        $validated = $request->validated();

        if(!$validated)
            return back();

        $data = $request->all();

        $address->update($data);

        return redirect()->route('frontend.user.addresses.index')->with('flash_success','Address updated successfully.');
    }

    public function stores(Request $request){
        $id =  Auth::user()->id;
        if($id){
            Address::where([['id' , '!=' , $request->address1],['customer_id' , $id]])->update(['default_shipping' => 'N']);
        }

        Address::where('id' , $request->address1)->update(['default_shipping' => 'Y']);

        return redirect()->route('frontend.process-payment')->with('flash_success','Shipping Address Changed Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $customer =  Auth::user();

        if($address->customer_id != $customer->id)
            abort(404);

        $address->delete();

        return back()->with('flash_success','Address deleted successfully.');
    }

}
