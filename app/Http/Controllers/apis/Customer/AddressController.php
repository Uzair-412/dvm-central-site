<?php

namespace App\Http\Controllers\apis\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index($customer_id)
    {
        $data['Addresses'] = Address::where('customer_id', $customer_id)->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'first_name' => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'last_name' => 'required|min:3|regex:/^[a-zA-Z0-9\s]+$/',
            'address1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'vat' => 'sometimes|numeric',
        ]);

        if($validation->fails())
            return response()->json(['error' => $validation->messages()], 201);

        if($request->default_shipping == 'Y'){
            $id =  request()->customer_id;
            if($id){
                Address::where('customer_id', $id)->update(['default_shipping' => 'N']);
            }
        }

        $data = $request->all();

        $customer =  request()->customer_id;

        $data['customer_id'] = $customer;

        Address::create($data);

        return response()->json(['success' => 'Address added successfully.'], 200);
    }

    public function update(Address $address, Request $request)
    {
        if(request()->customer_id){
            $id =  request()->customer_id;
            if($id && $request->default_shipping=='Y'){
                Address::where([['id' , '!=' , $address->id],['customer_id', $id]])->update(['default_shipping' => 'N']);
            }
        }
        $customer =  Customer::find(request()->customer_id);

        if($address->customer_id != $customer->id)
            return response()->json(['error' => '404']);

        $data = $request->all();

        $address->update($data);

        return response()->json(['success' => 'Address updated successfully.'], 200);
    }

    public function delete($id)
    {
        $address = Address::find($id);
        $address->delete();
        return response()->json(['success' => 'Address deleted successfully.'], 200);
    }
}
