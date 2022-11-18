<?php

namespace App\Http\Controllers\ApisV2;

use App\Http\Controllers\Controller;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $data['vendors'] = Vendor::where('status', 'Y')->select('id', 'name' , 'logo', 'slug')->paginate(12);
        foreach ($data['vendors'] as $vendor) {
            $vendor->reviews = round($vendor->vendor_rating($vendor->id) , 1);
        }
        return response($data, 200);
    }

    public function searchVendors($search)
    {
        $data['vendors'] = Vendor::where(function($wq) use($search){
            $wq->orWhere('name', 'like', '%'.$search.'%');
            $wq->orWhere('slug', 'like', '%'.$search.'%');
        })->select('id', 'name' , 'logo', 'slug')->paginate(12);
        return response($data, 200);
    }
}