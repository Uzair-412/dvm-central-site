<?php

namespace App\Http\Controllers\apis;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Vendor;
use App\Models\ZipCodes;
use App\Helpers\General\ShippingUPSHelper;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function vendor_coupon(Request $request)
    {
        $filter['vendor_id'] = $request->input('vendor_id');
        $filter['coupon'] = $request->input('couponCode');
        $coupon = Coupon::IsActiveCoupon($filter); 
        $check = Coupon::checkToAllowCoupon($coupon, $request->input('vendor_id'));
        if($coupon && $check==true)
        {
            $vendor_coupons = [];
            if ($coupon['type'] == 1) {
                $vendor_coupons[$request->input('vendor_id')] = ['vendor' => $request->input('vendor_id'), 'type' => 'amount', 'value' => $coupon['discount'], 'code' => $coupon['coupon'], 'id' => $coupon['id']];
            } else {
                $vendor_coupons[$request->input('vendor_id')] = ['vendor' => $request->input('vendor_id'), 'type' => 'percent', 'value' => $coupon['discount'], 'code' => $coupon['coupon'], 'id' => $coupon['id']];
            }
            return response()->json($vendor_coupons, 200);
        }
        else {
            return response()->json(['error' => 'Coupon is not valid!'],200);
        }
    }

    public function shipping_location(Request $request)
    {
        if(trim($request->input('ship_zipcode')) != null)
        {
            $address['zip'] = $request->input('ship_zipcode');

            $zip_data = ZipCodes::where('zip', $address['zip'])->first();

            if(!$zip_data)
            {
                $data['error'] = 'Please enter a valid US zipcode.';
                return response()->json($data,200);
            }

            $address['state'] = $zip_data->state;
            $address['city'] = $zip_data->primary_city;
            $address['country'] = $zip_data->country;
        }
        else
        {
            $address['country'] = $request->input('ship_country');
        }
        
        $data['shipping_details'] =$address;
        $data['success'] = 'Shipping location changed successfully.';

        return response()->json($data,200);
    }

    public static function calculate_shipping(Request $request)
    {
        $request_data = $request->all();
        if($request_data['shipping_details'])
        {
            $address = $request_data['shipping_details'];
            $total_shipping_charges = 0;

            foreach($request_data['vendors'] as $key => $vendor)
            {
                $vendor_id = $vendor['id'];
                $weight = 0;
                foreach($vendor['cart'] as $cart)
                {
                    $item_weight = $cart['attributes']['weight'];
                    if(!$item_weight) $item_weight = 1;
                    $weight += $item_weight * $cart['quantity'];
                }

                $vendor = Vendor::find($vendor_id);

                $address['total_weight'] = $weight;
                $shipping_rates_list = ShippingUPSHelper::shipping_rates_api($address, $vendor, true);
                if(isset($shipping_rates_list['status']) && $shipping_rates_list['status']==0)
                {
                    return response()->json(['error' => $shipping_rates_list]);
                }
                else
                {
                    $request_data['vendors'][$key]['shipping_charges'] = $shipping_rates_list['rates'][@$shipping_rates_list['lowest_or_selected_rate_index']];
                    
                    $request_data['vendors'][$key]['shipping_charges_list'] = $shipping_rates_list['rates'];

                    $total_shipping_charges += $request_data['vendors'][$key]['shipping_charges']['rate'];
                }
                $data['vendors'][$key]['shipping_rates_list'] = $shipping_rates_list;
            }

            $data['shipping_method']['enc'] = '';
            $data['shipping_method']['service'] = 'Shipping Charges';
            $data['shipping_method']['rate'] = $total_shipping_charges;
            $data['shipping_method']['notes'] = '';
        }
        return response()->json($data,200);
    }
}