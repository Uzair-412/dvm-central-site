<?php

namespace App\Http\Controllers;

use App\Domains\Auth\Models\User;
use App\Models\Customer;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $search = request()->search;
        $data['vendors'] = Vendor::whereHas('vendor_user', function($q) {
            $q->where(['type'=> 'vendor', 'active' => 1, 'confirmed'=> 1]);
        })->where(function($wq) use($search){
            $wq->orWhere('name', 'like', '%'.$search.'%');
            $wq->orWhere('contact_name', 'like', '%'.$search.'%');
            $wq->orWhere('address', 'like', '%'.$search.'%');
            $wq->orWhere('city', 'like', '%'.$search.'%');
            $wq->orWhere('state', 'like', '%'.$search.'%');
        })->paginate(12);
        return view('frontend.vendors', $data);
    }
}
