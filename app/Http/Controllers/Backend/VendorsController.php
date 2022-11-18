<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\VendorRequest;
use App\Models\Vendor;
use App\Models\Redirect;
use App\Models\Slug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessType;
use App\Domains\Auth\Models\User;
use App\Models\Country;
use App\Models\Customer;
use App\Models\DocumentQuestion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['p_heading']      = 'Manage Vendor';
        $data['p_description']  = 'Here is the list of Vendor';

        $data['vendor']     = Vendor::paginate(10);

        return view('backend.vendors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        $data['p_heading']      = 'Create Vendor ' . $customer->name;
        $data['p_description']  = 'Create a new Vendor by filling the form below';
        // $data['business-type']     = BusinessType::get();
        $data['countries'] = Country::pluck('name','id');
        $data['users'] = User::select('id', 'name')->where('type', 'vendor')->get();
        $data['customer'] = $customer;
        $data['cmd'] = 'create';

        return view('backend.vendors.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        if ($request['activated_account'] == 'on') {
            $request['activated_account'] = 'Y';
        } else {
            $request['activated_account'] = 'N';
        }
        if ($request['blocked_account'] == 'on') {
            $request['blocked_account'] = 'Y';
        } else {
            $request['blocked_account'] = 'N';
        }
        $validated = $request->validated();

        if (!$validated)
            return back();

        $data = $request->all();

        $slug = $data['slug'];

        $check = (new Slug())->checkIfExists($slug);

        if ($check) {
            return back()->with('flash_danger', 'The slug is not unique.');
        }

        if ($request->file('logo')) {
            $file_name = substr($request->file('logo')->getClientOriginalName(), 0, -4);
            $ext = '.' . $request->file('logo')->getClientOriginalExtension();
            $file_name = Str::slug($data['name'] . '-' . time()) . $ext;
            $data['logo'] = str_replace('vendors/logo/', '', Storage::disk('ds3')->putFileAs('vendors/logo', $request->file('logo'), $file_name));
        }

        if ($request->file('header_image')) {
            $file_name = substr($request->file('header_image')->getClientOriginalName(), 0, -4);
            $ext = '.' . $request->file('header_image')->getClientOriginalExtension();
            $file_name = Str::slug($data['name'] . '-' . time()) . $ext;
            $data['header_image'] = str_replace('vendors/header_image/', '', Storage::disk('ds3')->putFileAs('vendors/header_image', $request->file('header_image'), $file_name));
        }

        $vendor = Vendor::create($data);

        //saving customer email as vendor
        $getEmail = Customer::find($request->user);
        $vendor->email = $getEmail->email;
        $vendor->slugs()->create(['slug' => $slug]);
        $vendor->save();

        return redirect()->route('admin.customers.vendor.edit', [$request->input('id'), $vendor->id])->with('flash_success', 'Vendor added successfully.');
    }


    /**
     * show
     *
     * @param  mixed $vendor
     * @return void
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Vendor $vendor)
    {
        $data['vendors']           = $vendor;
        $data['customer']           = $customer;
        $data['p_heading']      = 'Update Vendor ' . $customer->name;
        $data['p_description']  = 'Modify Vendor by filling the form below';
        $data['business-type']     = BusinessType::get();
        $data['countries'] = Country::pluck('name','id');
        $data['users'] = User::select('id', 'name')->where('type', 'vendor')->get();

        $data['cmd'] = 'edit';

        return view('backend.vendors.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request, Vendor $vendor)
    {
        if ($request['activated_account'] == 'on') {
            $request['activated_account'] = 'Y';
        } else {
            $request['activated_account'] = 'N';
        }
        if ($request['blocked_account'] == 'on') {
            $request['blocked_account'] = 'Y';
        } else {
            $request['blocked_account'] = 'N';
        }
        $validated = $request->validated();

        if (!$validated)
            return back();

        $data = $request->all();

        $check = false;

        if (isset($data['save_slug'])) {
            $slug = $data['slug'];
            $full_slug = (new Slug())->fullSlug($slug, 'vendor', $data['business_type']);
            $check = (new Slug())->checkIfExists($full_slug, $vendor->id, 'App\Models\Vendor');

            if (isset($data['create_redirect'])) {
                $redirect['request_url'] = $vendor->slug;
                $redirect['target_url'] = $slug;
                $redirect['type'] = 'vendor';
                $redirect['type_id'] = $vendor->id;
                Redirect::create($redirect);
            }
        }

        if ($check) {
            return back()->with('flash_danger', 'The slug is not unique.');
        }

        if ($request->file('logo')) {
            if ($vendor->logo != '') {
                $image = 'vendors/logo/' . $vendor->logo;

                if (Storage::disk('ds3')->exists($image)) {
                    Storage::disk('ds3')->delete($image);
                }
            }

            $file_name = substr($request->file('logo')->getClientOriginalName(), 0, -4);
            $ext = '.' . $request->file('logo')->getClientOriginalExtension();

            $file_name = Str::slug($data['name'] . '-' . time()) . $ext;
            $data['logo'] = str_replace('vendors/logo/', '', Storage::disk('ds3')->putFileAs('vendors/logo', $request->file('logo'), $file_name));
        }

        if ($request->file('header_image')) {

            if ($vendor->header_image != '') {
                $image = 'vendors/header_image/' . $vendor->header_image;

                if (Storage::disk('ds3')->exists($image)) {
                    Storage::disk('ds3')->delete($image);
                }
            }

            $file_name = substr($request->file('header_image')->getClientOriginalName(), 0, -4);
            $ext = '.' . $request->file('header_image')->getClientOriginalExtension();

            $file_name = Str::slug($data['name'] . '-' . time()) . $ext;
            $data['header_image'] = str_replace('vendors/header_image/', '', Storage::disk('ds3')->putFileAs('vendors/header_image', $request->file('header_image'), $file_name));
        }
        $vendor->update($data);

        if (isset($data['save_slug'])) {
            $check_slug = Slug::where('sluggable_type', 'App\Models\Vendor')->where('sluggable_id', $vendor['id'])->first();
            if($check_slug){
                 $vendor->slugs()->update(['slug' => $slug]);
            }else{
                 $vendor->slugs()->create(['slug' => $slug]);
            }
        }

        return redirect()->route('admin.customers.vendor.edit', [$request->input('customer_id'), $vendor->id])->with('flash_success', 'Vendor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        if ($vendor->logo != '') {
            $image = 'vendors/logo/' . $vendor->logo;
            if (Storage::disk('ds3')->exists($image))
                Storage::disk('ds3')->delete($image);
        }

        if ($vendor->header_image != '') {
            $image = 'vendors/header_image/' . $vendor->header_image;
            if (Storage::disk('ds3')->exists($image))
                Storage::disk('ds3')->delete($image);
        }

        $vendor->delete();
        return back()->with('flash_success', 'Vendor deleted successfully.');
    }

    public function add_details($vendor_id)
    {
        $data['p_heading']      = 'Add Vendor Documents';
        $data['p_description']  = 'Add required vendor documents by filling the form below';
        $data['vendor_id'] = $vendor_id;
        $data['uploaded_questions'] = DocumentQuestion::where('vendor_id', $vendor_id)->get();
        return view('backend.vendors.add-details', $data);
    }

    public function update_details(Request $request, $vendor_id)
    {
        // dd($request->questions);
        foreach ($request->questions as $question)
            DocumentQuestion::create([
                'vendor_id' => $vendor_id,
                'question' => $question
            ]);
        return back()->with('flash_success', 'Question(s) added successfully.');
    }

    public function delete_details($question_id)
    {
        $question = DocumentQuestion::find($question_id);
        $question->delete();
        return back()->with('flash_success', 'Question deleted successfully');
    }
}
