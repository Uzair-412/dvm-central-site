<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\PageRequest;
use App\Models\Groups;
use App\Models\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Vendor;
use Illuminate\Support\Str;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Coupons';
        $data['p_description']  = 'Here is the list of coupons';

        $data['coupons']     = Coupon::paginate(10);

        return view('backend.coupons.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['p_heading']      = 'Create Coupon';
        $data['p_description']  = 'Create a new coupon by filling the form below';

        $data['status']         = 'Y';
        $data['free_shipping']  = 'N';
        $data['showcase']       = 'N';

        $data['display_bogo'] = $data['display_discount'] = 'd-none';

        $data['vendors']         = Vendor::pluck('name', 'id');
        $data['groups']         = Groups::pluck('name', 'id');

        return view('backend.coupons.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $check = Coupon::where('coupon', $data['coupon'])->first();

        if($check)
        {
            return back()->with('flash_danger','Coupon code already exists.');
        }

        if($request->file('image'))
        {
            $path = public_path($this->getStorage());
            $ext = '.'.$request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        Coupon::create($data);

        return redirect()->route('admin.coupons.index')->with('flash_success','Coupon added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $data['coupon']           = $coupon;
        $data['p_heading']      = 'Update Coupon';
        $data['p_description']  = 'Modify coupon by filling the form below';

        $data['display_bogo'] = $data['display_discount'] = 'd-none';

        if($coupon->type == 1 || $coupon->type == 2)
        {
            $data['display_discount'] = '';
        }
        elseif($coupon->type == 3 || $coupon->type == 4)
        {
            $data['display_bogo'] = '';
        }

        $data['vendors']         = Vendor::pluck('name', 'id');
        $data['groups']         = Groups::pluck('name', 'id');

        return view('backend.coupons.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $data = $request->except('_token', 'id');

        $check = Coupon::where('coupon', $data['coupon'])->where('id', '!=', $request->input('id'))->first();

        if($check)
        {
            return back()->with('flash_danger','Coupon code already exists.');
        }

        if($request->file('image'))
        {
            $path = public_path($this->getStorage());

            if($coupon->image != '')
            {
                $file = $path.'/'.$coupon->image;
                if(file_exists($file) && is_file($file))
                {
                    unlink($file);
                }
            }

            $ext = '.'.$request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name']).'-'.time().$ext;
            $data['image'] = $file_name;
            $request->file('image')->move($path, $file_name);
        }

        $coupon->update($data);

        return redirect()->route('admin.coupons.index')->with('flash_success','Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return back()->with('flash_success','Coupon deleted successfully.');
    }

    public function getStorage()
    {
        return 'up_data/coupons';
    }
}
