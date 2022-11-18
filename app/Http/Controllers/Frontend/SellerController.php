<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\ContactMail;
use App\Models\Country;
use App\Models\Customer;
use App\Models\State;
use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['breadcrumb']     = true;
        $data['breadcrumbs'][]  = 'Seller';

        $data['banner_header'] = Banner::where('area_id', 26)->where('status', 'Y')->first();
        $data['countries'] = Country::pluck('name' , 'id');
        return view('frontend.vendor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validation = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'name' => 'required |unique:vendors',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'message' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'contact_name' => 'required',
            'logo' => 'max:191 | mimes:jpg,jpeg,bmp,png |dimensions:width=125,height=125',
            'header_image' => 'max:4096 | mimes:jpg,jpeg,bmp,png | dimensions:width=1415,height=280',
        ]);

        if(!$validation)
            return back();

        //store details as a customer but in-active
        $customer = new Customer();
        $customer->name = $request->first_name.' '.$request->last_name;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->type = 'vendor';
        $customer->active = 0;
        $customer->email_verified_at = null;
        $customer->save();

        //store details as a vendor but in-active
        if ($request->file('logo')) {
            $file_name = substr($request->file('logo')->getClientOriginalName(), 0, -4);
            $ext = '.' . $request->file('logo')->getClientOriginalExtension();
            $file_name = Str::slug($request['first_name'] . '-' . time()) . $ext;
            str_replace('vendors/logo/', '', Storage::disk('ds3')->putFileAs('vendors/logo', $request->file('logo'), $file_name));
            $request->logo = $file_name;
        }

        if ($request->file('header_image')) {
            $file_name = substr($request->file('header_image')->getClientOriginalName(), 0, -4);
            $ext = '.' . $request->file('header_image')->getClientOriginalExtension();
            $file_name = Str::slug($request['first_name'] . '-' . time()) . $ext;
            str_replace('vendors/header_image/', '', Storage::disk('ds3')->putFileAs('vendors/header_image', $request->file('header_image'), $file_name));
            $request->header_image = $file_name;
        }
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->user = $customer->id;
        $vendor->slug = $this->slugify($request->name);
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->country_id = $request->country_id;
        $vendor->city = $request->city;
        //get state name
        if(is_numeric($request->state)){
            $state_name =State::where('id', $request->state)->first();
            $vendor->state = $state_name ? $state_name->iso2 : null;
        }else{
            $vendor->state =$request->state;
        }
        $vendor->zip_code = $request->zip_code;
        $vendor->contact_name = $request->contact_name;
        $vendor->logo = $request->logo;
        $vendor->header_image = $request->header_image;
        $vendor->virtual_booth_url = $request->virtual_booth_url ? $request->virtual_booth_url:null;
        $vendor->status = 'N';
        $vendor->business_type = 3;
        $vendor->activated_account = 'N';
        $vendor->save();
        $vendor->slugs()->create(['slug' => $vendor->slug]); //generate slug for slug table
        
        $details = $request->all(); 

        Mail::send(new ContactMail($details ,$request));

        return redirect()->back()->withFlashSuccess('Form Submitted Successfully. Our Team Will Contact You Soon.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}