<?php

namespace App\Http\Controllers\apis\Customer;

use App\Http\Controllers\Controller;
use App\Models\JobWishlist;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index($id)
    {
        $data['products'] = Wishlist::with('product')->where('customer_id',$id)->where('status', '1')->paginate('5');
        $filter['user_id'] = $id;
        $data['jobs'] = JobWishlist::getWishlistJobs($filter);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $customer_id = $request->customer_id;
        $product_id = $request->product_id;

        $info = Wishlist::where(['customer_id' => $customer_id, 'product_id' => $product_id])->first();
        
        if(!$info){
            Wishlist::create(['customer_id' => $customer_id, 'product_id' => $product_id]);
            $total =  Wishlist::where('customer_id',$customer_id)->count();
            return ['success' => 'Add Product in Wishlist.' , 'total' => $total];
        }else{
            $total =  Wishlist::where('customer_id',$customer_id)->count();
            return ['info' => 'Product is already added in Wishlist.', 'total' => $total];
        }
    }

    public function destroy($id, $customer_id)
    {
        $data = Wishlist::where([
            ['customer_id', $customer_id],
            ['product_id',$id]
        ])->first();
        if(!$data)
        {
            return ['error' => 'Wishlist product not exist'];
        }
        $msg = $data->delete();
        // if($msg) dd('Delete');
        if($msg)
            return ['info' => 'Wishlist product deleted successfully.'];
    }
}
