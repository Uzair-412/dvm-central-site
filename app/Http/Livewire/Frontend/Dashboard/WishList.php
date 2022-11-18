<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\JobWishlist;
use App\Models\VendorJob;
use App\Models\Wishlist as ModelsWishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishList extends Component
{   
    protected $listeners = ['loadWishlist'];

    public function render()
    {
        $id = Auth::user()->id;
        $data['info'] = ModelsWishlist::where('customer_id',$id)->where('status', '1')->paginate('5');
        $data['jobs'] = JobWishlist::where('user_id',$id)->paginate('5');
        // $data['jobs_wishlist'] = JobWishlist::where('user_id',$id)->get();
        // foreach($data['jobs_wishlist'] as $wishlist)
        // $data['jobs'] .= VendorJob::where('id',$wishlist->job_id)->paginate('5');
        return view('livewire.frontend.dashboard.wish-list', $data);
    }

    public function loadWishlist(){
        $id = Auth::user()->id;
        $data['info'] = ModelsWishlist::where('customer_id',$id)->where('status', '1')->paginate('5');
    }
    public function delete_wishlist_job($job_id)
    {   
        
        if(auth()->user()) {
         // getting wishlist record against active user
            $wishlist_record = JobWishlist::where('user_id', auth()->user()->id)
                ->where('job_id', $job_id)
                ->first();
                
            if ($wishlist_record) {
                
                $wishlist_record->delete();
            }

        } else{

            return redirect()->back()->with('flash_success', 'Please Login first.');;
        }
    }
}
