<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\JobWishlist;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
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
        $data['breadcrumbs'][]  = 'Wishlist';

        $data['page'] = 'wishlist';

        $id = Auth::user()->id;

        $data['info'] = Wishlist::where('customer_id',$id)->where('status', '1')->paginate('5');
        $view = 'wishlist';
        return view('frontend.user.wishlist', compact('data', 'view'));
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
        if(Auth::user()->email_verified_at==null)
        {
            return ['status' => 0, 'message' => 'Please verify your email before continuing shopping!'];
        }
        $data['customer_id'] = Auth::user()->id;
        $data['product_id'] = $request->product_id;

        $info = Wishlist::where('customer_id',$data['customer_id'])->where('product_id',$data['product_id'])->first();
        
        if(!$info){
            Wishlist::create($data);
            $total =  Wishlist::where('customer_id',$data['customer_id'])->count();
            return ['status' => '1', 'message' => 'Add Product in Wishlist.' , 'total' => $total];
        }else{
            $total =  Wishlist::where('customer_id',$data['customer_id'])->count();
            return ['status' => '2', 'message' => 'Product is Already Added on Wishlist.', 'total' => $total];
        }

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
    public function destroy($ids)
    {
        $wishlist_array = explode(',', $ids); 
        for($i = 0 ; $i < count($wishlist_array) ; $i++){
            $wishlist = Wishlist::find($wishlist_array[$i]);
            if(isset($wishlist)){
                $wishlist->delete();
            }
        }
        return ['status' => '1', 'message' => 'Product Wishlist Deleted Successfully.'];
    }

    public function remove_all_jobs($ids)
    {   
        $wishlist_array = explode(',', $ids); 
        for($i = 0 ; $i < count($wishlist_array) ; $i++){
            $wishlist = JobWishlist::find($wishlist_array[$i]);
            if(isset($wishlist)){
                $wishlist->delete();
            }
        }
        return ['status' => '1', 'message' => 'Job Wishlist Deleted Successfully.'];
    }

}
