<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::with('vendor_user')->whereHas('vendor_user', function($q) {
            $q->where(['type'=> 'vendor', 'active' => 1, 'confirmed'=> 1]);
        })->get();
        return response($vendors, 200);
    }
}
